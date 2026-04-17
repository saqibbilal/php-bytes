<?php

declare(strict_types=1);

namespace Saqib\PhpBytes\LeetCode\TwoSum;

class Solution
{
    /**
     * @param int[] $nums
     * @param int $target
     * @return int[]
     */
    public function twoSum(array $nums, int $target): array
    {
        $map = [];
        foreach ($nums as $index => $num) {
            $complement = $target - $num;
            if (isset($map[$complement])) {
                return [$map[$complement], $index];
            }
            $map[$num] = $index;
        }
        return [];
    }
}