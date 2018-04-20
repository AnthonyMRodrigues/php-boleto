<?php

namespace Mero\BankSlip\Model;

class Address
{
    /**
     * @var string Street
     */
    protected $street;

    /**
     * @var string Number
     */
    protected $number;

    /**
     * @var string Complement
     */
    protected $complement;

    /**
     * @var string ZIP code
     */
    protected $zipCode;

    /**
     * @var string City
     */
    protected $city;

    /**
     * @var string District
     */
    protected $district;

    /**
     * @var string State code
     */
    protected $stateCode;

    /**
     * Address constructor.
     * @param string $street Street
     * @param string $number Number
     * @param string $complement Complement
     * @param string $zipCode ZIP code
     * @param string $city City
     * @param string $district District
     * @param string $stateCode State code
     */
    public function __construct(string $street, string $number, string $complement, string $zipCode, string $city, string $district, string $stateCode)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->district = $district;
        $this->stateCode = $stateCode;
    }

    /**
     * Return the street of address.
     *
     * @return string Street
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * Return the number of address.
     *
     * @return string Number
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Return the complement of address.
     *
     * @return string Complement
     */
    public function getComplement(): string
    {
        return $this->complement;
    }

    /**
     * Return the ZIP code of address.
     *
     * @return string ZIP code
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * Return the city of address.
     *
     * @return string City
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Return the district of address.
     *
     * @return string District
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * Return state code of address.
     *
     * @return string State code
     */
    public function getStateCode(): string
    {
        return $this->stateCode;
    }
}
