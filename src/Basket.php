<?php

class Basket
{
    private $products = [];
    private $catalogue = [];
    private $deliveryRules = [];
    private $offers = [];

    public function __construct($catalogue, $deliveryRules, $offers)
    {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add($productCode)
    {
        if (isset($this->catalogue[$productCode])) {
            $this->products[] = $this->catalogue[$productCode];
        }
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function total()
    {
        $subtotal = 0.0; // Initialize as float

        foreach ($this->products as $product) {
            $subtotal += $product->price;
        }

        // Apply offers
        foreach ($this->offers as $offer) {
            $subtotal -= $offer->apply($this);
        }

        // Calculate delivery cost
        $deliveryCost = $this->calculateDeliveryCost($subtotal);

        return $subtotal + $deliveryCost;
    }

    private function calculateDeliveryCost($subtotal)
    {
        foreach ($this->deliveryRules as $rule) {
            if ($subtotal < $rule['threshold']) {
                return $rule['cost'];
            }
        }
        return 0; // Free delivery for $90 and above
    }
}
