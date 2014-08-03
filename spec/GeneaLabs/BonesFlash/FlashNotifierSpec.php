<?php

namespace spec\GeneaLabs\BonesFlash;

use Illuminate\Session\Store;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FlashNotifierSpec extends ObjectBehavior
{
	function let(Store $sessionStore)
	{
		$this->beConstructedWith($sessionStore);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('GeneaLabs\BonesFlash\FlashNotifier');
    }
}
