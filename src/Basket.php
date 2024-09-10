<?php

class Basket
{
    private array $products = [];
    private array $catalogue = [];
    private array $deliveryRules = [];
    private array $offers = [];

    /**
     * @param Product[] $catalogue
     * @param array $deliveryRules
     * @param Offer[] $offers
     */
    public function __construct(array $catalogue, array $deliveryRules, array $offers)
    {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    /**
     * @param string $productCode
     */
    public function add(string $productCode): void
    {
        if (isset($this->catalogue[$productCode])) {
            $this->products[] = $this->catalogue[$productCode];
        }
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return float
     */
    public function total(): float
    {
        $subtotal = 0.0;

        foreach ($this->products as $product) {
            $subtotal += $product->price;
        }

        foreach ($this->offers as $offer) {
            $subtotal -= $offer->apply($this);
        }

        $deliveryCost = $this->calculateDeliveryCost($subtotal);

        return $subtotal + $deliveryCost;
    }

    /**
     * @param float $subtotal
     * @return float
     */
    private function calculateDeliveryCost(float $subtotal): float
    {
        foreach ($this->deliveryRules as $rule) {
            if ($subtotal < $rule['threshold']) {
                return $rule['cost'];
            }
        }
        return 0.0; // Free delivery for $90 and above
    }
}
