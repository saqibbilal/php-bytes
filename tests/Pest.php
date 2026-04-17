<?php

use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case Configuration
|--------------------------------------------------------------------------
*/

// This ensures Tests\TestCase is available in both Feature and Unit folders.
// It also allows you to use Laravel-specific features if you ever add them.
pest()->extend(TestCase::class)->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations & Helpers
|--------------------------------------------------------------------------
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/**
 * Example helper function for the Arena.
 */
function runBenchmark(callable $callback)
{
    $start = microtime(true);
    $callback();
    return microtime(true) - $start;
}