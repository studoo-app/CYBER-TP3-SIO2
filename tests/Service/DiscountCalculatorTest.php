<?php

namespace App\Tests\Service;

use App\Service\DiscountCalculator;
use PHPUnit\Framework\TestCase;

class DiscountCalculatorTest extends TestCase
{
    public function testCalculateDiscount(): void
    {
        $calculator = new DiscountCalculator();
        $result = $calculator->calculate(200, 20); // 20% de réduction

        $this->assertEquals(160, $result);
    }

    public function testCalculateDiscountWithInvalidInput(): void
    {
        $calculator = new DiscountCalculator();

        $this->expectException(\InvalidArgumentException::class);
        $calculator->calculate(-100, 20); // Prix invalide
    }
}
