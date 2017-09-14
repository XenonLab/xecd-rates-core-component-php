<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

class MonthlyAverageConversion extends Conversion
{
    /**
     * @var int
     */
    protected $month;

    /**
     * @var int
     */
    protected $days;

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param int $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param int $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }
}
