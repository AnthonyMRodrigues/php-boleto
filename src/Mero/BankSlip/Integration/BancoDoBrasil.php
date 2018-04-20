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
        $http = new Client([
            'base_uri' => ($this->environment == Environment::HML)
                ? 'https://oauth.hm.bb.com.br'
                : 'https://oauth.bb.com.br'
        ]);

        $response = $http->post('/oauth/token', [
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

        return $bankSlip;
    }
}
