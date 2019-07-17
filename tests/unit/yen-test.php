<?php
declare(strict_types=1);

namespace J\Imap\Tests;

use J\Money\Yen;
use PHPUnit\Framework\TestCase;

class YenTest extends TestCase
{

    public function setUp(): void
    {

    }
    public function test_must_not_initialize_with_empty_code()
    {
        $code = '';
        $symbol = '$';
        $shortName = 'pak';
        $fullName = 'Pakistan';
        $decimalPlaces = 12;
        $this->expectExceptionCode(1001);
        $this->expectExceptionMessage("Currency code should be string and not empty");
        $yen = new Yen($code,$symbol,$shortName,$fullName,$decimalPlaces);
        $yen->setCode($code);
    }
    public function test_must_not_initialize_with_amount_contain_decimal_places()
    {
        $code = 'pkr';
        $symbol = '$';
        $shortName = 'pak';
        $fullName = 'Pakistan';
        $decimalPlaces = 12.34;
        $this->expectExceptionCode(1004);
        $this->expectExceptionMessage("yen should not contain decimal places!");
        $yen = new Yen($code,$symbol,$shortName,$fullName,$decimalPlaces);
        $yen->yenShouldNotConatainDecimalPlaces($decimalPlaces);
    }
    public function test_can_initialize_with_valid_values()
    {
        $code = 'pkr';
        $symbol = '$';
        $shortName = 'pak';
        $fullName = 'Pakistan';
        $decimalPlaces = 12;
        $yen = new Yen($code,$symbol,$shortName,$fullName,$decimalPlaces);
        $this->assertInstanceOf('J\Money\Yen', $yen);
        $this->assertEquals('J\Money\Yen', get_class($yen));
        $this->assertEquals($yen->getFullName(), $fullName, 'Both must get the same value');
    }


    public function tearDown(): void
    {
        parent::tearDown();
    }
}
