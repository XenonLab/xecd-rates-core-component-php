<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

class ManyToOneConversions extends Conversions
{
    /**
     * @var \Xe\Xecd\Component\Rates\Core\Entity\Conversion[][]
     */
    protected $from;

    /**
     * @var string
     */
    protected $to;

    /**
     * @return \Xe\Xecd\Component\Rates\Core\Entity\Conversion[][]
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param \Xe\Xecd\Component\Rates\Core\Entity\Conversion[][] $from
     */
    public function setFrom(array $from)
    {
        $this->from = $from;
        $this->synchronize();
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseCurrency()
    {
        return $this->to;
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseCurrency($baseCurrency)
    {
        $this->to = $baseCurrency;
    }

    /**
     * {@inheritdoc}
     */
    public function getConversions()
    {
        return $this->from;
    }

    /**
     * {@inheritdoc}
     */
    public function setConversions(array $conversions)
    {
        $this->from = $conversions;
    }
}
