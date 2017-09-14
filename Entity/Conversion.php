<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

class Conversion
{
    /**
     * @var string
     */
    protected $currency;

    /**
     * @var float
     */
    protected $rate;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var static
     */
    protected $inverse;

    public function __construct($currency = null, $rate = null, \DateTime $date = null)
    {
        $this->currency = $currency;
        $this->rate = $rate;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        if ($this->currency != $currency) {
            $this->currency = $currency;
            $this->getInverse()->setCurrency($currency);
        }
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate($rate)
    {
        if ($this->rate != $rate) {
            $this->rate = $rate;
            $this->getInverse()->setRate(isset($this->rate) && $this->rate != 0 ? 1 / $this->rate : 0);
        }
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date = null)
    {
        if ($this->date != $date) {
            $this->date = $date;
            $this->getInverse()->setDate($date);
        }
    }

    /**
     * @return static
     */
    public function getInverse()
    {
        if (!isset($this->inverse)) {
            $this->setInverse(new static($this->currency, isset($this->rate) && $this->rate != 0 ? 1 / $this->rate : 0, $this->date));
        }

        return $this->inverse;
    }

    /**
     * @param static $inverse
     */
    public function setInverse(self $inverse)
    {
        if ($this->inverse != $inverse) {
            $this->inverse = $inverse;
            $this->inverse->setInverse($this);
        }
    }
}
