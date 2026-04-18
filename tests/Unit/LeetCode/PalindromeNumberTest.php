<?php

use Saqib\PhpBytes\LeetCode\PalindromeNumber\Solution;

beforeEach(fn () => $this->solver = new Solution());

test('it identifies a simple palindrome', function () {
    expect($this->solver->solve(121))->toBeTrue();
});

test('it identifies negative numbers as non-palindromes', function () {
    // Explanation: -121 reads as 121- from right to left
    expect($this->solver->solve(-121))->toBeFalse();
});

test('it identifies numbers ending in zero as non-palindromes', function () {
    // Except for 0 itself, trailing zeros are never palindromic
    expect($this->solver->solve(10))->toBeFalse();
    expect($this->solver->solve(0))->toBeTrue();
});

test('it handles even-length palindromes', function () {
    expect($this->solver->solve(1221))->toBeTrue();
});

test('it handles non-palindromic positive integers', function () {
    expect($this->solver->solve(123))->toBeFalse();
});