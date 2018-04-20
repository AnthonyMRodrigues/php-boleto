<?php

namespace Mero\BankSlip\Integration\BancoDoBrasil;

class AuthorizationToken
{
    /**
     * @var string Access token
     */
    protected $accessToken;

    /**
     * @var string Token type
     */
    protected $tokenType;

    /**
     * @var \DateTime Token validity
     */
    protected $expiresIn;

    /**
     * AuthorizationToken constructor.
     *
     * @param string $accessToken
     * @param string $tokenType
     * @param int $expiresIn Token validity in seconds after now
     *
     * @throws \Exception Fail to convert token validity to date object
     */
    public function __construct(string $accessToken, string $tokenType, int $expiresIn)
    {
        $this->accessToken = $accessToken;
        $this->tokenType = $tokenType;
        $this->expiresIn = $this->convertValidityToDateTime($expiresIn);
    }

    /**
     * Convert validity seconds to date object.
     *
     * @param int $validityInSeconds Token validity in seconds
     * @return \DateTime Token validity
     *
     * @throws \Exception Fail to convert token validity to date object
     */
    protected function convertValidityToDateTime($validityInSeconds): \DateTime
    {
        $expiresInDate = new \DateTime();
        $expiresInDate->add(new \DateInterval("PT{$validityInSeconds}S"));

        return $expiresInDate;
    }

    /**
     * Return the access token.
     *
     * @return string Access token
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Return the token type.
     *
     * @return string Token type
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * Return the token validity.
     *
     * @return \DateTime Token validity
     */
    public function getExpiresIn(): \DateTime
    {
        return $this->expiresIn;
    }
}
