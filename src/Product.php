<?php

class Product
{
    public string $code;
    public float $price;

    /**
     * @param string $code
     * @param float $price
     */
    public function __construct(string $code, float $price)
    {
        $this->code = $code;
        $this->price = $price;
    }
}
