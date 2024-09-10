<?php
class Offer
{
    private $productCode;
    private $discountAmount;

    public function __construct($productCode, $discountAmount)
    {
        $this->productCode = $productCode;
        $this->discountAmount = $discountAmount;
    }

    public function apply($basket)
    {
        $redWidgetCount = 0;
        foreach ($basket->getProducts() as $product) {
            if ($product->code === $this->productCode) {
                $redWidgetCount++;
            }
        }
        // Return the discount amount as a float
        if ($redWidgetCount > 1) {
            return (float)$this->discountAmount; // Ensure this is a float
        }
        return 0.0; // Return 0.0 as a float
    }
}
