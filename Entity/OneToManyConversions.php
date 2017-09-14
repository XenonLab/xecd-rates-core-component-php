<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

class OneToManyConversions extends Conversions
{
    /**
     * @var string
     */
    protected $from;

    /**
     * @var \Xe\Xecd\Component\Rates\Core\Entity\Conversion[][]
     */
    protected $to;

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return \Xe\Xecd\Component\Rates\Core\Entity\Conversion[][]
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param \Xe\Xecd\Component\Rates\Core\Entity\Conversion[][] $to
     */
    public function setTo(array $to)
    {
        $this->to = $to;
        $this->synchronize();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseCurrency()
    {
        return $this->from;
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseCurrency($baseCurrency)
    {
        $this->from = $baseCurrency;
    }

    /**
     * {@inheritdoc}
     */
    public function getConversions()
    {
        return $this->to;
    }

    /**
     * {@inheritdoc}
     */
    public function setConversions(array $conversions)
    {
        $this->to = $conversions;
    }
}
