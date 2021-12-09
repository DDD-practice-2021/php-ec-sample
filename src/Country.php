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
        if($this->country == 'US')
            return 0.1;
        if($this->country == 'FR')
            return 0.5;
    }
}