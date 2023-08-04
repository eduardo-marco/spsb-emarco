<?php
namespace Auction;

class auctionObject
{
    private $reservePrice;


    public function __construct($reservePrice = null)
    {
        $this->setReservePrice($reservePrice);
    }
    public function getReservePrice()
    {
        return $this->reservePrice;
    }

    public function setReservePrice($reservePrice)
    {
        $this->reservePrice = $reservePrice;
    }

}