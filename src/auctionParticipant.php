<?php
class auctionReuslt
{
    private $name;
    private $bids;

    public function __construct($name = null, $bids = null)
    {
        $this->setName($name);
        $this->setBids($bids);
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getBids()
    {
        return $this->bids;
    }

    public function setBids($bids)
    {
        $this->bids = $bids;
    }
    public function addBid($bids)
    {
        $this->bids[] = $bids;
    }

}