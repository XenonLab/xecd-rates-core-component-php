<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

class Currency
{
    /**
     * @var string
     */
    protected $iso;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $obsolete;

    /**
     * @var static
     */
    protected $successor;

    public function __construct($iso = null)
    {
        $this->iso = $iso;
    }

    /**
     * Factory method.
     *
     * @return static
     */
    public static function wildcard()
    {
        return new static('*');
    }

    /**
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * @param string $iso
     */
    public function setIso($iso)
    {
        $this->iso = $iso;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isObsolete()
    {
        return $this->obsolete;
    }

    /**
     * @param bool $obsolete
     */
    public function setObsolete($obsolete)
    {
        $this->obsolete = $obsolete;
    }

    /**
     * @return static
     */
    public function getSuccessor()
    {
        return $this->successor;
    }

    /**
     * @param static $successor
     */
    public function setSuccessor(self $successor)
    {
        $this->successor = $successor;
    }
}
