<?php

namespace Auction;

use Auction\auctionResult;

class auctionAlgorithm
{
    function decideResult($auctionObject, $auctionParticipant)
    {
        $reservePrice = $auctionObject->getReservePrice();
        $auctionResult = new auctionResult();
        $highestBids = array();

        foreach ($auctionParticipant as $participant) {
            $maximumParticipantBid = $participant->getBids() ? max($participant->getBids()) : null;
            $highestBids[$participant->getName()] = $maximumParticipantBid;
        }
        $arrayLength = count($highestBids);
        if (!max($highestBids) > 0 || $arrayLength < 1) {
            return $auctionResult;
        }

        arsort($highestBids);
        $arrayKeys = array_keys($highestBids);
        $auctionResult->setWinnerName($arrayKeys[0]);
        $auctionResult->setWinningPrice(($arrayLength > 1 && $highestBids[$arrayKeys[1]] >= $reservePrice) ? $highestBids[$arrayKeys[1]] : $reservePrice);


        return $auctionResult;
    }
}