<?php
declare(strict_types=1);

namespace App;

class Debugger
{
    public static function debug(object $toDebug)
    {
        if (method_exists($toDebug, '__debugInfo')) {
            try {
                $toDebug->__debugInfo();
            } catch (\Exception $e) {
                // Do something
            }
        }
    }
}