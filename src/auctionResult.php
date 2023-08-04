<?php
namespace Auction;

class auctionResult
{
    private $winnerName;
    private $winningPrice;

    public function __construct(string $winnerName = null, int $winningPrice = null)
    {
        $this->setWinnerName($winnerName);
        $this->setWinningPrice($winningPrice);
    }
    public function getWinnerName() : ?string
    {
        return $this->winnerName;
    }

    public function setWinnerName(?string $winnerName)
    {
        $this->winnerName = $winnerName;
    }
    public function getWinningPrice() : ?int
    {
        return $this->winningPrice;
    }

    public function setWinningPrice(?int $winningPrice)
    {
        $this->winningPrice = $winningPrice;
    }

}