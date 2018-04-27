<?php

namespace Mero\BankSlip\Integration;

use GuzzleHttp\Client;
use Mero\BankSlip\Integration\BancoDoBrasil\AuthorizationToken;
use Mero\BankSlip\Integration\BancoDoBrasil\Environment;
use Mero\BankSlip\Integration\Exception\AuthorizationTokenExpiredException;
use Mero\BankSlip\Integration\Exception\AuthorizationTokenNotFoundException;
use Mero\BankSlip\Model\BankSlip;

class BancoDoBrasil implements IntegrationInterface
{
    /**
     * @var AuthorizationToken Authorization token
     */
    protected $authorizationToken;

    /**
     * @var int Environment identifier
     */
    protected $environment;

    public function __construct(int $environment = Environment::HML)
    {
        $this->environment = $environment;
    }

    /**
     * Send a login request to BB API for get access token needed on bank slip webservice.
     *
     * @param string $username Username
     * @param string $password Password
     *
     * @throws \Exception When login failed
     */
    public function login(string $username, string $password)
    {
        $client = new Client([
            'base_uri' => ($this->environment == Environment::HML)
                ? 'https://oauth.hm.bb.com.br'
                : 'https://oauth.bb.com.br'
        ]);

        $response = $client->post('/oauth/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic '.base64_encode("{$username}:{$password}"),
            ],
            'form_params' => [
                'grant_type' => 'client_credentials',
                'scope' => 'cobranca.registro-boletos',
            ]
        ]);

        $responseContent = json_decode($response->getBody()->getContents(), true);

        $this->authorizationToken = new AuthorizationToken(
            $responseContent['access_token'],
            $responseContent['token_type'],
            $responseContent['expires_in']
        );
    }

    /**
     * @inheritDoc
     *
     * @throws AuthorizationTokenNotFoundException When authorization token is not found
     * @throws AuthorizationTokenExpiredException When authorization token is expired
     */
    public function register(BankSlip $bankSlip): BankSlip
    {
        if (!$this->authorizationToken instanceof AuthorizationToken) {
            throw new AuthorizationTokenNotFoundException();
        }
        if ($this->authorizationToken < (new \DateTime())) {
            throw new AuthorizationTokenExpiredException();
        }

        $client = new \SoapClient(
            ($this->environment == Environment::HML)
                ? 'https://cobranca.homologa.bb.com.br:7101/Processos/Ws/RegistroCobrancaService.serviceagent?wsdl'
                : 'https://cobranca.bb.com.br:7101/Processos/Ws/RegistroCobrancaService.serviceagent?wsdl',
            [
                'soap_version' => SOAP_1_1,
                'stream_context' => stream_context_create([
                    'http' => [
                        'header' => implode("\r\n", [
                            'SOAPACTION: registrarBoleto',
                            sprintf('Authorization: Bearer %s', $this->authorizationToken->getAccessToken()),
                            'Content-Type: text/xml; charset=uft-8'
                        ])
                    ],
                ]),
            ]
        );

        $response = $client->__soapCall('requisicao', [
            'numeroConvenio' => $bankSlip->getAgreement()->getAgreementNumber(),
            'numeroCarteira' => $bankSlip->getAgreement()->getWallet(),
            'numeroVariacaoCarteira' => $bankSlip->getAgreement()->getWalletVariation(),
            'codigoModalidadeTITULO' => 1,
            'dataEmissaoTITULO' => (new \DateTime())->format('d.M.y'),
            'dataVencimentoTITULO' => $bankSlip->getTitle()->getExpireDate()->format('d.M.y'),
            'valorOriginalTITULO' => $bankSlip->getTitle()->getAmount(),
            'codigoTipoDesconto' => 0,
            'codigoTipoJuroMora' => 0,
            'codigoTipoMulta' => 0,
            'codigoAceiteTITULO' => 'N',
            'codigoTipoTITULO' => 19,
            'textoDescricaoTipoTITULO' => '',
            'indicadorPermissaoRecebimentoParcial' => 'N',
            'textoNumeroTITULOBeneficiario' => '',
            'textoNumeroTituloCliente' => sprintf(
                '%s%s',
                str_pad((string) $bankSlip->getAgreement()->getAgreementNumber(), 10, "0", STR_PAD_LEFT),
                str_pad((string) $bankSlip->getTitle()->getOurNumber(), 10, "0", STR_PAD_LEFT)
            ),
            'textoMensagemBloquetoOcorrencia' => 'Pagamento disponível até a data de vencimento',
            'codigoTipoInscricaoPagador' => $bankSlip->getBuyer()->getDocument()->getFormattedNumber(),
            'numeroInscricaoPagador' => substr($bankSlip->getBuyer()->getDocument()->getNumber(), 0, 15),
            'nomePagador' => substr($bankSlip->getBuyer()->getName(), 0, 60),
            'textoEnderecoPagador' => substr($bankSlip->getBuyer()->getAddress()->getStreet(), 0, 60),
            'numeroCepPagador' => $bankSlip->getBuyer()->getAddress()->getZipCode(),
            'nomeMunicipioPagador' => substr($bankSlip->getBuyer()->getAddress()->getCity(), 0, 20),
            'nomeBairroPagador' => substr($bankSlip->getBuyer()->getAddress()->getDistrict(), 0, 20),
            'siglaUfPagador' => substr($bankSlip->getBuyer()->getAddress()->getStateCode(), 0, 2),
            'codigoChaveUsuario' => 1,
            'codigoTipoCanalSolicitacao' => 5,
        ]);

        return $bankSlip;
    }
}
