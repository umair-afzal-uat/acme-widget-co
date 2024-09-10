<?php
require_once 'vendor/autoload.php';
require_once 'src/Product.php';
require_once 'src/Offer.php';
require_once 'src/Basket.php';

// Initialize the product catalogue
$catalogue = [
    'R01' => new Product('R01', 32.95),
    'G01' => new Product('G01', 24.95),
    'B01' => new Product('B01', 7.95)
];

// Initialize the delivery rules
$deliveryRules = [
    ['threshold' => 50, 'cost' => 4.95],
    ['threshold' => 90, 'cost' => 2.95]
];

// Initialize the offers
$offers = [
    new Offer('R01', 16.48) // Buy one red widget, get the second half price
];

// Create a new basket
$basket = new Basket($catalogue, $deliveryRules, $offers);

// Example usage: Adding products to the basket
$basket->add('B01');
$basket->add('G01');
echo "Total for B01 and G01: $" . number_format($basket->total(), 2) . "\n"; // Expected: $37.85

$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('R01');
$basket->add('R01');
echo "Total for R01 and R01: $" . number_format($basket->total(), 2) . "\n"; // Expected: $54.37

$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('R01');
$basket->add('G01');
echo "Total for R01 and G01: $" . number_format($basket->total(), 2) . "\n"; // Expected: $60.85

$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');
echo "Total for B01, B01, R01, R01, R01: $" . number_format($basket->total(), 2) . "\n"; // Expected: $98.27