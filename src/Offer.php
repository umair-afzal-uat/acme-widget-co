<?php

class Offer
{
    private string $productCode;
    private float $discountAmount;

    /**
     * @param string $productCode
     * @param float $discountAmount
     */
    public function __construct(string $productCode, float $discountAmount)
    {
        $this->productCode = $productCode;
        $this->discountAmount = $discountAmount;
    }

    /**
     * @param Basket $basket
     * @return float
     */
    public function apply(Basket $basket): float
    {
        $redWidgetCount = 0;
        foreach ($basket->getProducts() as $product) {
            if ($product->code === $this->productCode) {
                $redWidgetCount++;
            }
        }

        // Return the discount amount if more than 1 widget; otherwise, return 0.0
        if ($redWidgetCount > 1) {
            return $this->discountAmount;
        }
        return 0.0;
    }
}
