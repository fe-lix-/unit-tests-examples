<?php

namespace My\App\BehavioralMock;

use My\App\CassettePlayer;

class CassettePlayerBehavioralTest extends \PHPUnit_Framework_TestCase
{
    public function testPlayAndRewind()
    {
        $cassette = new CassetteInterfaceBehavioralMock();

        $cassette->willNotBeOver();
        $cassette->willBeRead();
        $cassette->willBeOver();
        $cassette->willBeRewinded();

        $player = new CassettePlayer($cassette->getMockObject());

        $player->playAndRewind();
    }
}