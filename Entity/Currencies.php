<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

class Currencies implements LegalEntityInterface
{
    use LegalEntityTrait;

    /**
     * @var \Xe\Xecd\Component\Rates\Core\Entity\Currency[]
     */
    protected $currencies;

    public function __construct(array $currencies = [])
    {
        $this->currencies = $currencies;
        $this->synchronize();
    }

    /**
     * Factory method.
     *
     * @return self
     */
    public static function wildcard()
    {
        return new self([Currency::wildcard()]);
    }

    /**
     * Factory method.
     *
     * @param array $currencies ISO 4217 currency codes
     *
     * @return self
     */
    public static function fromArray(array $currencies)
    {
        foreach ($currencies as $key => $iso) {
            $currencies[$key] = new Currency($iso);
        }

        return new self($currencies);
    }

    /**
     * @return \Xe\Xecd\Component\Rates\Core\Entity\Currency[]
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @param \Xe\Xecd\Component\Rates\Core\Entity\Currency[] $currencies
     */
    public function setCurrencies(array $currencies)
    {
        $this->currencies = $currencies;
        $this->synchronize();
    }

    /**
     * Synchronize sub-entities.
     */
    protected function synchronize()
    {
        if (!empty($this->currencies)) {
            // Map keys to currency code.
            $this->currencies = array_reduce($this->currencies, function ($currencies, Currency $currency) {
                $currencies[$currency->getIso()] = $currency;

                return $currencies;
            }, []);
        }
    }
}
