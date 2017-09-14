<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

class MonthlyAverageConversions extends OneToManyConversions
{
    /**
     * @var \Xe\Xecd\Component\Rates\Core\Entity\MonthlyAverageConversion[][]
     */
    protected $to;

    /**
     * @return \Xe\Xecd\Component\Rates\Core\Entity\MonthlyAverageConversion[][]
     */
    public function getTo()
    {
        return parent::getTo();
    }

    /**
     * @param \Xe\Xecd\Component\Rates\Core\Entity\MonthlyAverageConversion[][] $to
     */
    public function setTo(array $to)
    {
        parent::setTo($to);
    }

    /**
     * Synchronize sub-entities.
     */
    protected function synchronize()
    {
        $conversions = $this->getConversions();
        if (!empty($conversions)) {
            foreach ($conversions as $currency => $monthlyAverageConversions) {
                // Map keys to month number and modify dates to be month specific.
                $monthlyAverageConversions = array_reduce($monthlyAverageConversions, function ($monthlyAverageConversions, MonthlyAverageConversion $monthlyAverageConversion) use ($currency) {
                    $monthlyAverageConversion->setCurrency($currency);
                    $monthlyAverageConversion->setDate($this->getDate() ?: $monthlyAverageConversion->getDate());

                    // Sometimes this method is called before a date has been injected via the serializer.
                    // Modify the date to be month specific once it has been injected.
                    if (!empty($monthlyAverageConversion->getDate())) {
                        $date = clone $monthlyAverageConversion->getDate();
                        $date->setDate($date->format('Y'), $monthlyAverageConversion->getMonth(), $date->format('d'));
                        $monthlyAverageConversion->setDate($date);
                    }

                    $monthlyAverageConversions[$monthlyAverageConversion->getMonth()] = $monthlyAverageConversion;

                    return $monthlyAverageConversions;
                }, []);

                $conversions[$currency] = $monthlyAverageConversions;
            }

            $this->setConversions($conversions);
        }
    }
}
