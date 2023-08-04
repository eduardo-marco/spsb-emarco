As a summary for the CORE-TEST-V2, I have done and/or assumed the following:

- There can be no same bids on different buyers, causing the process to need to decide which participant is supposed to win in the case of a tie.
- The vendor folder hasn't been added on a .gitignore as the guidelines said to not need to install anything, so that the project includes PHPUnit and necessary things by default.

To execute the PHPUnit tests you should run the following on the conosle: .\vendor\bin\phpunit

I have sliced the code in smaller methods in order to make it easier to develop further testing if needed, or, in the case in which we could guarantee 100% that we are never going to receive participants that don't bid, for example, removing the pruneNoBidders method.

Solution explanation:

For the last test, there are 2 warnings showns since $arrayKeys[1] doesn't exist, so I added an alternate commented code that would not trigger those, but I don't think it's necessary unless we want to have a 100% warning free code, as for how PHP works internally, it won't fail checking the conditions.

As for the resolution of the problem, since it doesn't say we need to store any data and it just asks us to resolve who's the winner and how much he is paying, I resorted to doing it on a more simple way, just keeping the highest bid of each participant, putting it on a descendant order. This will always guarantee that the first one in the list is the winner, and that the price will either be the second bidder or the reserve price, depending on which one is higher.

Lastly, in the few cases where we can have no winner, I just returned an empty auctionResult object, which would simbolize that there is no winner in that scenario.