<?php
class auctionResult
{
    private $winnerName;
    private $winningPrice;

    public function __construct($winnerName = null, $winningPrice = null)
    {
        $this->setWinnerName($winnerName);
        $this->setWinningPrice($winningPrice);
    }
    public function getWinnerName()
    {
        return $this->winnerName;
    }

    public function setWinnerName($winnerName)
    {
        $this->winnerName = $winnerName;
    }
    public function getWinningPrice()
    {
        return $this->winningPrice;
    }

    public function setWinningPrice($winningPrice)
    {
        $this->winningPrice = $winningPrice;
    }

}