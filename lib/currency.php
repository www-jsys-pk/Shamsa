<?php
declare(strict_types=1);

namespace J\Money;

interface Currency
{
    public function sign(): string;

    public function code(): string;

    public function name(): string;

    public function fullName(): string;
}