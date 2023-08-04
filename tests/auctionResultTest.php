<?php

use PHPUnit\Framework\TestCase;
use Auction\auctionParticipant;
use Auction\auctionObject;
use Auction\auctionAlgorithm;
use Auction\auctionResult;

class auctionResultTest extends TestCase
{
    public function testProposed()
    {
        $object = new auctionObject(100);
        $algorithm = new auctionAlgorithm();

        //Proposed test. We expect E to win with a price of 130.
        $participantA = new auctionParticipant("A", array(110, 130));
        $participantB = new auctionParticipant("B");
        $participantC = new auctionParticipant("C", array(125));
        $participantD = new auctionParticipant("D", array(105, 115, 90));
        $participantE = new auctionParticipant("E", array(132, 135, 140));
        $participantsArray = array($participantA, $participantB, $participantC, $participantD, $participantE);
        $expectedResult = new auctionResult("E", 130);
        $proposedTestResult = $algorithm->decideResult($object, $participantsArray);

        $this->assertEquals($expectedResult, $proposedTestResult);

    }
    public function testOneBidderAboveReserve()
    {
        $object = new auctionObject(100);
        $algorithm = new auctionAlgorithm();

        //Only one bidder with the above reserve price. We expect A to win with reserve price payment.
        $participantA = new auctionParticipant("A", array(130));
        $participantB = new auctionParticipant("B", array(15, 28));
        $participantC = new auctionParticipant("C", array(25));
        $participantD = new auctionParticipant("D", array(15, 11, 90));
        $participantE = new auctionParticipant("E", array(12, 35, 40));
        $participantsArray = array($participantA, $participantB, $participantC, $participantD, $participantE);
        $expectedResult = new auctionResult("A", 100);
        $proposedTestResult = $algorithm->decideResult($object, $participantsArray);
        $this->assertEquals($expectedResult, $proposedTestResult);

    }
    public function testNoBids()
    {
        $object = new auctionObject(100);
        $algorithm = new auctionAlgorithm();

        //No bids. We expect to have a null result as there is no winner.
        $participantA = new auctionParticipant("A");
        $participantB = new auctionParticipant("B");
        $participantC = new auctionParticipant("C");
        $participantD = new auctionParticipant("D");
        $participantE = new auctionParticipant("E");
        $participantsArray = array($participantA, $participantB, $participantC, $participantD, $participantE);
        $expectedResult = new auctionResult();
        $proposedTestResult = $algorithm->decideResult($object, $participantsArray);

        $this->assertEquals($expectedResult, $proposedTestResult);

    }
    public function testOneBidder()
    {
        $object = new auctionObject(100);
        $algorithm = new auctionAlgorithm();

        //Only one person actually bidding. We expect that person to win with the reserve price. It will be C.
        $participantA = new auctionParticipant("A");
        $participantB = new auctionParticipant("B");
        $participantC = new auctionParticipant("C", array(125));
        $participantD = new auctionParticipant("D");
        $participantE = new auctionParticipant("E");
        $participantsArray = array($participantA, $participantB, $participantC, $participantD, $participantE);
        $expectedResult = new auctionResult("C", 100);
        $proposedTestResult = $algorithm->decideResult($object, $participantsArray);

        $this->assertEquals($expectedResult, $proposedTestResult);

    }
}