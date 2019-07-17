<?php
declare(strict_types=1);

namespace J\Money;
abstract class AnyCurrency implements Currency
{
    protected $symbol;
    protected $isoCode;
    protected $shortName;
    protected $fullName;
    protected $decimalPlaces;

    public function __construct(string $symbol, string $shortName, string $fullName, float $decimalPlaces)
    {
        $this->symbol = $symbol;
        $this->shortName = $shortName;
        $this->fullName = $fullName;
        $this->decimalPlaces = $decimalPlaces;

    }

    public function setCode($code)
    {
        if (empty($code)) {
            throw new \InvalidArgumentException('Currency code should be string and not empty', 1001);
        }

        $this->isoCode = $code;

    }

    public function sign(): string
    {
        return $this->sign();
    }

    public function code(): string
    {
        return $this->code();
    }

    public function name(): string
    {
        return $this->name();
    }

    public function fullName(): string
    {
        return $this->fullName();

    }
}