<?php

namespace FintechSystems\Payfast\Tests;

use Orchestra\Testbench\TestCase;
use FintechSystems\Payfast\Facades\Payfast;
use FintechSystems\Payfast\PayfastServiceProvider;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            PayfastServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Payfast' => Payfast::class,
        ];
    }

    /** @test */
    public function dependency_injection_works()
    {        
        $result = Payfast::ping();        

        $this->assertTrue($result);
    }
    
}