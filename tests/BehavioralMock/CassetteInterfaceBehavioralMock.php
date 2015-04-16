<?php

namespace My\App\BehavioralMock;

class CassetteInterfaceBehavioralMock extends \PHPUnit_Framework_TestCase
{
    const MOCKED_CLASSNAME = 'My\App\CassetteInterface';

    private $counter;
    private $mock;

    public function willNotBeOver()
    {
        $this->getMockObject()->expects($this->at($this->counter++))
            ->method('isOver')
            ->willReturn(false);
    }

    public function willBeRead()
    {
        $this->getMockObject()->expects($this->at($this->counter++))
            ->method('read');
    }

    public function willBeOver()
    {
        $this->getMockObject()->expects($this->at($this->counter++))
            ->method('isOver')
            ->willReturn(true);
    }

    public function willBeRewinded()
    {
        $this->getMockObject()->expects($this->at($this->counter++))
            ->method('rewind');
    }

    public function getMockObject()
    {
        if ($this->mock === null) {
            $this->mock = $this->getMock(self::MOCKED_CLASSNAME);
        }

        return $this->mock;
    }
}