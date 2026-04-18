<?php
declare(strict_types=1);
namespace Tests\Unit\LeetCode;

use Saqib\PhpBytes\LeetCode\TwoSum\Solution;

test('two sum finds indices correctly', function () {
    $solver = new Solution();
    expect($solver->solve([2, 7, 11, 15], 9))->toBe([0, 1]);
});