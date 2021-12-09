<?php

namespace App;

class Country
{
    /**
     * @var string
     */
    private $country;

    /**
     * @param string $country
     */
    public function __construct(string $country)
    {
        $this->country = $country;

        return $this;
    }

    public function getTax()
    {
        $cty = array(
            'US' => 0.1,
            'FR' => 0.5
        );

        return $cty[$this->country];
    }
}