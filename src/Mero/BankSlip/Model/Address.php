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
     * Define the street of address.
     *
     * @param string $street Street
     *
     * @return Address
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;

        return $this;
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
     * Define the number of address.
     *
     * @param string $number Number
     *
     * @return Address
     */
    public function setNumber(string $number): Address
    {
        $this->number = $number;

        return $this;
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
     * Define the complement of address.
     *
     * @param string $complement Complement
     *
     * @return Address
     */
    public function setComplement(string $complement): Address
    {
        $this->complement = $complement;
        return $this;
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
     * Define the ZIP code of address.
     *
     * @param string $zipCode ZIP code
     *
     * @return Address
     */
    public function setZipCode(string $zipCode): Address
    {
        $this->zipCode = $zipCode;

        return $this;
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
     * Define the city of address.
     *
     * @param string $city City
     *
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;

        return $this;
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
     * Define the district of address.
     *
     * @param string $district District
     *
     * @return Address
     */
    public function setDistrict(string $district): Address
    {
        $this->district = $district;

        return $this;
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

    /**
     * Define state code of address.
     *
     * @param string $stateCode State code
     *
     * @return Address
     */
    public function setStateCode(string $stateCode): Address
    {
        $this->stateCode = $stateCode;

        return $this;
    }
}
