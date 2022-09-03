<?php

namespace Tests;

use Debugger;
use Exception;
use PHPUnit\Framework\TestCase;
use ThrowsDebugInfo;

class XdebugTest extends TestCase 
{
    // This works fine with xdebug enabled
    public function testXdebugThrowExceptionInDebugInfo(): void
    {
        $obj = new \App\ThrowsDebugInfo();
        try {
            $obj->__debugInfo();
        } catch (\Exception $e) {
            // Do something
        }
        $this->assertTrue(true);
    }

    // This breaks with xdebug enabled
    public function testXdebugThrowExceptionInDebugInfoViaVariableReference(): void
    {
        $obj = new \App\ThrowsDebugInfo();
        \App\Debugger::debug($obj);
        $this->assertTrue(true);
    }
}