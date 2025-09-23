<?php 

namespace Test\Unit;

use PHPUnit\Event\Code\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ClientControllerTest extends TestCase{
    #[Test]
     #[TestDox('Assert True is true')]
    public function testAssertTrue(){
        $this->assertTrue(true);
    }

}