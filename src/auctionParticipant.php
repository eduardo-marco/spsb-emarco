<?php
namespace Auction;

class auctionParticipant
{
    private $name;
    private $bids;

    public function __construct($name = null, $bids = null)
    {
        $this->setName($name);
        $this->setBids($bids);
    }
    public function getName() : ?string
    {
        return $this->name;
    }

    public function setName(?string $name) 
    {
        $this->name = $name;
    }
    public function getBids() : ?array
    {
        return $this->bids;
    }

    public function setBids(?array $bids)
    {
        $this->bids = $bids;
    }
    public function addBid(?int $bid)
    {
        $this->bids[] = $bid;
    }

}