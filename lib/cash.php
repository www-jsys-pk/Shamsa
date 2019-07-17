<?php
declare(strict_types=1);

namespace J\Money;

class Cash
{
    private $amount;
    private $yen;

    public function __construct(Amount $amount, Yen $yen)
    {
        $this->amount = $amount->getAmount();
        $this->yen = $yen;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
    /**
     * @return Yen
     */
    public function getYen(): Yen
    {
        return $this->yen;
    }
}