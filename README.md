# 🐘 PHP-Bytes

![PHP](https://img.shields.io/badge/PHP-8.x-8892BF?style=for-the-badge&logo=php)
![Tests](https://img.shields.io/badge/Tests-Pest-22C55E?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-black?style=for-the-badge)

A high-performance algorithmic laboratory for mastering LeetCode challenges  
using modern **PHP 8.x**, **Pest testing**, and **O(n)** engineering principles.

---

## 📚 Table of Contents

- [✨ Features](#-features)
- [🏛️ Architecture](#️-architecture)
- [🚀 Getting Started](#-getting-started)
- [🚀 The "First Byte" Workflow](#-the-first-byte-workflow)
- [🖥️ Dashboard](#️-dashboard)
- [🧪 Testing](#-testing)
- [📊 Engineering Principles](#-engineering-principles)
- [📄 License](#-license)

---

## ✨ Features

- Modular LeetCode challenge structure  
- Pest-powered testing  
- Live browser playground  
- Auto-discovery architecture  
- PSR-4 compliant codebase  

---

## 🏛️ Architecture

```text
├── public/              # Dashboard UI & File Viewer
├── src/
│   └── LeetCode/
│       └── [Challenge]/
│           ├── Solution.php
│           ├── Playground.php
│           ├── Problem.md
│           └── notes.md
├── tests/
└── config.php
```

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/php-bytes.git
cd php-bytes
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Run Locally (Laravel Herd)

```
http://php-bytes.test
```

---

## 🚀 The "First Byte" Workflow

To maintain high code quality and test coverage in this arena, follow this standardized workflow for every new challenge:

---

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

---

### 2. Configure the Playground

- **File:** `src/LeetCode/TwoSum/Playground.php`

```php
<?php

return function ($solver) {
    $nums = [2, 7, 11, 15];
    $target = 9;

    return [
        'input'  => "nums = " . json_encode($nums) . ", target = $target",
        'result' => $solver->solve($nums, $target),
    ];
};
```

---

### 3. Write the Test

Create a corresponding test file in the `tests/` directory using Pest.

- **File:** `tests/Unit/LeetCode/TwoSumTest.php`

```php
<?php

use Saqib\PhpBytes\LeetCode\TwoSum\Solution;

test('it solves the challenge correctly', function () {
    $solver = new Solution();

    expect($solver->solve([2, 7, 11, 15], 9))
        ->toBe([0, 1]);
});
```

---

### 4. Verify & Document

Run the test suite and document your findings.

- Run Tests:
```bash
composer test
```

- Analyze:
  - Update `notes.md`
  - Add time/space complexity
  - Document trade-offs  

- Commit:
```bash
git add . && git commit -m "feat: solve two sum"
```

---

## 🖥️ Dashboard

### `public/index.php`

- Scans `src/LeetCode`
- Builds challenge list dynamically

### `public/view.php`

- Renders Markdown problems  
- Executes PHP solutions  
- Displays results in real time  

---

## 🧪 Testing

Run all tests:

```bash
composer test
```

---

## 📊 Engineering Principles

### O(1) Lookups
Prefer hash maps over nested loops.

### Data Immutability
Avoid mutating input parameters.

### Strict Typing
Use `declare(strict_types=1);` consistently.

### Constraint Awareness
Balance performance, memory, and readability.

---

## 📄 License

MIT License