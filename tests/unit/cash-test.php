<?php
declare(strict_types=1);

namespace J\Imap\Tests;

use J\Money\Amount;
use J\Money\Cash;
use J\Money\Yen;
use PHPUnit\Framework\TestCase;

class CashTest extends TestCase
{

    public function setUp(): void
    {

    }
    public function test_must_not_initialize_with__invalid_amount()
    {
        $code = 'pkr';
        $symbol = '$';
        $shortName = 'jap';
        $fullName = 'Japan';
        $decimalPlaces = .00;
        $amount = 12.24352;
        $this->expectExceptionCode(1001);
        $this->expectExceptionMessage("Decimal Part Should Not Be Greater Than Two!");
        $amountClass = new Amount($amount);
        $yen = new Cash($amountClass,new Yen($code,$symbol,$shortName,$fullName,$decimalPlaces) );
        $amountClass->amountShouldBeTwoDecimalDigits();
    }
    public function test_must_not_initialize_with_invalid_currency_code()
    {
       $code = '';
        $symbol = '$';
        $shortName = 'jap';
        $fullName = 'Japan';
        $decimalPlaces = .00;
        $amount = 12.24;
        $this->expectExceptionCode(1001);
        $this->expectExceptionMessage("Currency code should be string and not empty");
        $amountClass = new Amount($amount);
        $yenClass = new Yen($code,$symbol,$shortName,$fullName,$decimalPlaces);
        $yen = new Cash($amountClass,$yenClass );
        $yenClass->setCode($code);
    }
    public function test_can_initialize_with_valid_values()
    {
        $code = '';
        $symbol = '$';
        $shortName = 'jap';
        $fullName = 'Japan';
        $decimalPlaces = .00;
        $amount = 12.24;
        $amountClass = new Amount($amount);
        $yenClass = new Yen($code,$symbol,$shortName,$fullName,$decimalPlaces);
        $cash = new Cash($amountClass,$yenClass );
        $this->assertInstanceOf('J\Money\Cash', $cash);
        $this->assertEquals('J\Money\Cash', get_class($cash));
        $this->assertEquals($cash->getAmount(), $amount, 'Both must get the same value');
    }


    public function tearDown(): void
    {
        parent::tearDown();
    }
}
