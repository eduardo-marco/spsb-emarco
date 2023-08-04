<?php
namespace Auction;

class auctionObject
{
    private $reservePrice;


    public function __construct($reservePrice = null)
    {
        $this->setReservePrice($reservePrice);
    }
    public function getReservePrice() : ?int
    {
        return $this->reservePrice;
    }

    public function setReservePrice(?int $reservePrice)
    {
        $this->reservePrice = $reservePrice;
    }

}