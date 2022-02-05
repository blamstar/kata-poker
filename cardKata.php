<?php

class Card {
    public string $suit;
    public int $value;

    public function __construct($suit, $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }
}

function splitWords(string $text) {
    return explode(' ', $text);
}

function parseCard(string $card) {
    if (strlen($card) == 2)  {
        $value = intval($card[0]);
        $suit = $card[1];
    } else if (strlen($card) == 3) {
        $valueAsText = substr($card, 0, 2);
        $value = intval($valueAsText);
        $suit = $card[2];
    } else {
        throw new Exception('incorrect card name');
    }

    return new Card($suit, $value);
}

$card = new Card('S', 10);

function testCardCreation() {
    if ((new Card("D", 2))->value != 2) {
        throw new Exception("card value doesn't match");
    }

    if ((new Card("D", 2))->suit != "D") {
        throw new Exception("card suit doesn't match");
    }

    print "Creation Test Passed\n";
}

testCardCreation();

function testSplitWords() {
    if (splitWords("4K 2D 5S") != ["4K", "2D", "5S"]) {
        throw new Exception("split is incorrect");
    }

    print "Split Test Passed\n";
}

testSplitWords();

function testParseCard()
{
    if(parseCard("2D") != new Card("D", 2)) {
        throw new Exception('Parsing Failed');
    }

    print "parsing test passed\n";
}

testParseCard();

