## 🚀 The "First Byte" Workflow

To maintain high code quality and test coverage in this arena, follow this standardized workflow for every new challenge:

### 1. Initialize the Challenge
Create a new directory under `src/` for your challenge and add your logic.
- **File:** `src/LeetCode/TwoSum/Solution.php`
- **Namespace:** `Saqib\PhpBytes\LeetCode\TwoSum`

```php
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
    public function solve(array $nums, int $target): array
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
```

### 2. Write the Test
Create a corresponding test file in the `tests/` directory using Pest.
- **File:** `tests/Unit/LeetCode/TwoSumTest.php`

```php
<?php
use Saqib\PhpBytes\LeetCode\TwoSum\Solution;

test('it solves the challenge correctly', function () {
    $solver = new Solution();
    expect($solver->solve(...))->toBe(...);
});
```

### 3. Verify & Document
Run the test suite and document your findings.
- Run Tests: `composer test` 
- Analyze: Update the `notes.md` in the challenge folder with O(n) time/space complexity
- Commit: `git add . && git commit -m "feat: solve [Challenge Name]`"
