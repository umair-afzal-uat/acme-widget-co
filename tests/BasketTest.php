<?php

use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';
require_once 'src/Product.php';
require_once 'src/Offer.php';
require_once 'src/Basket.php';

class BasketTest extends TestCase
{
    private $catalogue;
    private $deliveryRules;
    private $offers;

    protected function setUp(): void
    {
        // Initialize the product catalogue
        $this->catalogue = [
            'R01' => new Product('R01', 32.95),
            'G01' => new Product('G01', 24.95),
            'B01' => new Product('B01', 7.95)
        ];

        // Initialize the delivery rules
        $this->deliveryRules = [
            ['threshold' => 50, 'cost' => 4.95],
            ['threshold' => 90, 'cost' => 2.95]
        ];

        // Initialize the offers
        $this->offers = [
            new Offer('R01', 16.48) // Buy one red widget, get the second half price
        ];
    }

    public function testTotalForB01AndG01()
    {
        $basket = new Basket($this->catalogue, $this->deliveryRules, $this->offers);
        $basket->add('B01');
        $basket->add('G01');
        $this->assertEquals(37.85, round($basket->total(), 2));
    }

    public function testTotalForR01AndR01()
    {
        $basket = new Basket($this->catalogue, $this->deliveryRules, $this->offers);
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals(54.37, round($basket->total(), 2));
    }

    public function testTotalForR01AndG01()
    {
        $basket = new Basket($this->catalogue, $this->deliveryRules, $this->offers);
        $basket->add('R01');
        $basket->add('G01');
        $this->assertEquals(60.85, round($basket->total(), 2));
    }

    public function testTotalForB01B01R01R01R01()
    {
        $basket = new Basket($this->catalogue, $this->deliveryRules, $this->offers);
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals(98.27, round($basket->total(), 2));
    }
}
