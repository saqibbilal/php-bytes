<?php

declare(strict_types=1);

namespace Saqib\PhpBytes\LeetCode\PalindromeNumber;

class Solution
{
    /**
     * Mathematical solution avoiding string conversion.
     * Time Complexity: O(log10(n))
     * Space Complexity: O(1)
     */
    public function solve(int $x): bool
    {
        // Negative numbers and non-zero numbers ending in 0 are never palindromes
        if ($x < 0 || ($x % 10 === 0 && $x !== 0)) {
            return false;
        }

        $revertedNumber = 0;

        // Process half of the number to avoid overflow and save time
        while ($x > $revertedNumber) {
            $revertedNumber = ($revertedNumber * 10) + ($x % 10);
            $x = (int)($x / 10);
        }

        // Even length: x === revertedNumber (e.g., 1221 -> 12 === 12)
        // Odd length: x === (int)(revertedNumber / 10) (e.g., 121 -> 1 === 12/10)
        return $x === $revertedNumber || $x === (int)($revertedNumber / 10);
    }
}