<?php

namespace Auction;

use Auction\auctionResult;

final class auctionAlgorithm
{
    public function __invoke(?auctionObject $auctionObject, ?array $auctionParticipant): auctionResult
    {
        $auctionParticipant = $this->pruneNoBidders($auctionParticipant);
        if (empty($auctionParticipant)) {
            return $this->noWinner();
        }
        $highestBids = $this->getHighestBids($auctionParticipant);

        if ($this->checkThereAreBids($highestBids)) {
            return $this->decideResult($auctionObject, $highestBids);
        } else {
            return $this->noWinner();
        }
    }

    private function pruneNoBidders(?array $auctionParticipant): ?array
    {
        $realBidders = array();
        foreach ($auctionParticipant as $participant) {
            if (is_null($participant->getBids())) {
                continue;
            }
            array_push($realBidders, $participant);
        }
        return $realBidders;
    }
    private function getHighestBids(?array $auctionParticipant): ?array
    {
        $highestBids = array();
        foreach ($auctionParticipant as $participant) {
            $maximumParticipantBid = max($participant->getBids());
            if ($maximumParticipantBid > 0) {
                $highestBids[$participant->getName()] = $maximumParticipantBid;
            }
        }
        arsort($highestBids);
        return $highestBids;
    }

    private function checkThereAreBids(?array $highestBids)
    {
        $arrayLength = count($highestBids);
        if ($arrayLength < 1) {
            return new auctionResult();
        } else {
            return true;
        }
    }

    private function decideResult(?auctionObject $auctionObject, ?array $highestBids): auctionResult
    {
        $reservePrice = $auctionObject->getReservePrice();
        $auctionResult = new auctionResult();

        $arrayKeys = array_keys($highestBids);
        $auctionResult->setWinnerName($arrayKeys[0]);

        $auctionResult->setWinningPrice($highestBids[$arrayKeys[1]] >= $reservePrice ? $highestBids[$arrayKeys[1]] : $reservePrice);
        /*Alternative for the only one bidder test to not show warnings
      
        if (count($arrayKeys) > 1 && $highestBids[$arrayKeys[1]] >= $reservePrice) {
            $auctionResult->setWinningPrice($highestBids[$arrayKeys[1]]);
            return $auctionResult;
        }
        $auctionResult->setWinningPrice($reservePrice);
           */
        return $auctionResult;
    }

    private function noWinner(): auctionResult
    {
        return new auctionResult();
    }
}