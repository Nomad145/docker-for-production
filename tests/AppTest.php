<?php

namespace Test;

use DockerForProduction\App;
use PHPUnit\Framework\TestCase;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class AppTest extends TestCase
{
    public function testMain()
    {
        $this->expectOutputString("Welcome to Dallas PHP!");

        App::main();
    }
}
