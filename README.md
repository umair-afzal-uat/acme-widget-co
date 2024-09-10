# Acme Widget Co. Sales System

This project implements a simple sales system for Acme Widget Co. It includes a basket system that calculates totals based on products, delivery charges, and special offers.

## Classes

- **Product**: Represents a product with a code and price.
- **Offer**: Represents special offers applied to the basket.
- **Basket**: Manages the products in the basket, calculates totals, applies offers, and determines delivery charges.

## Usage

1. Create products and offers.
2. Initialize the `Basket` with products and offers.
3. Add products to the basket using the `add` method.
4. Calculate the total using the `total` method.

## Testing

Run tests using PHPUnit:

```bash
vendor/bin/phpunit tests/BasketTest.php