<?php
declare(strict_types=1);

namespace J\Money;

class Amount
{
    private $amount;

    public function __construct(float $amount)
    {

        $this->amount = $amount;
    }

    public function amountShouldBeTwoDecimalDigits()
    {
        $str = (string)$this->amount;
        $amountStrLength = explode(".", $str);
        if (strlen($amountStrLength[1]) > 2) {
            throw new \InvalidArgumentException("Decimal Part Should Not Be Greater Than Two!", 1001);

        }
    }

    public function addAmount(float $total)
    {
        $this->amount = $this->amount + $total;
        return $this->amount;

    }
    public function subtractAmount(float $total)
    {
        $this->amount = $this->amount - $total;
        return $this->amount;

    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

}