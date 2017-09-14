<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

abstract class Conversions implements LegalEntityInterface
{
    use LegalEntityTrait;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
        $this->date = $date;
        $this->synchronize();
    }

    /**
     * @return string
     */
    abstract public function getBaseCurrency();

    /**
     * @param string $baseCurrency
     */
    abstract public function setBaseCurrency($baseCurrency);

    /**
     * @return \Xe\Xecd\Component\Rates\Core\Entity\Conversion[][]
     */
    abstract public function getConversions();

    /**
     * @param \Xe\Xecd\Component\Rates\Core\Entity\Conversion[][] $conversions
     */
    abstract public function setConversions(array $conversions);

    /**
     * Synchronize sub-entities.
     */
    protected function synchronize()
    {
        $conversions = $this->getConversions();
        if (!empty($conversions)) {
            foreach ($conversions as $currency => $currencyConversions) {
                // Map keys to date and synchronize other properties.
                $currencyConversions = array_reduce($currencyConversions, function ($currencyRates, Conversion $conversion) use ($currency) {
                    $conversion->setCurrency($currency);
                    $conversion->setDate($this->getDate() ?: $conversion->getDate());

                    // Sometimes this method is called before a date has been injected via the serializer.
                    // Index sequentially until we have dates loaded to index on.
                    if (!empty($conversion->getDate())) {
                        $currencyRates[$conversion->getDate()->format(\DateTime::ISO8601)] = $conversion;
                    } else {
                        $currencyRates[] = $conversion;
                    }

                    return $currencyRates;
                }, []);

                $conversions[$currency] = $currencyConversions;
            }

            $this->setConversions($conversions);
        }
    }
}
