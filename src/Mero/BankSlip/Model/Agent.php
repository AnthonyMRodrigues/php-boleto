<?php

namespace Mero\BankSlip\Model;

use Mero\BankSlip\Model\Document\AbstractDocument;

class Agent
{
    /**
     * @var string Name of agent
     */
    protected $name;

    /**
     * @var AbstractDocument Document of agent
     */
    protected $document;

    /**
     * @var Address Address of agent
     */
    protected $address;

    /**
     * AbstractAgent constructor.
     *
     * @param string $name Name of agent
     * @param AbstractDocument $document Document of agent
     * @param Address $address Address of agent
     */
    public function __construct(string $name, AbstractDocument $document, Address $address)
    {
        $this->name = $name;
        $this->document = $document;
        $this->address = $address;
    }

    /**
     * Return the name of agent.
     *
     * @return string Name of agent
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Define the name of agent.
     *
     * @param string $name Name of agent
     *
     * @return Agent
     */
    public function setName(string $name): Agent
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Return the document of agent.
     *
     * @return AbstractDocument Document of agent
     */
    public function getDocument(): AbstractDocument
    {
        return $this->document;
    }

    /**
     * Define the document of agent.
     *
     * @param AbstractDocument $document Document of agent
     *
     * @return Agent
     */
    public function setDocument(AbstractDocument $document): Agent
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Return the address of agent.
     *
     * @return Address Address of agent
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * Define the address of agent.
     *
     * @param Address $address Address of agent
     *
     * @return Agent
     */
    public function setAddress(Address $address): Agent
    {
        $this->address = $address;

        return $this;
    }
}
