<?php
declare(strict_types=1);

namespace App;

class ThrowsDebugInfo
{
    public function __debugInfo()
    {
        throw new \Exception('from __debugInfo');
    }
}
