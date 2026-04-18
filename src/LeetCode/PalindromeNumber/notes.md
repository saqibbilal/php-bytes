# Engineering Notes: Palindrome Number

## 🧠 Architectural Overview
There are two primary ways to approach this. While string conversion is intuitive, the mathematical approach demonstrates a deeper understanding of memory management and numerical logic.

### 1. The String Approach (Readable)
Convert the integer to a string and use a Two-Pointer check or `strrev()`.
- **Pros:** Fast development, highly readable.
- **Cons:** Uses $O(n)$ space due to string allocation.

### 2. The Mathematical Approach (Optimized)
Reverse only the second half of the number using modulo (`%`) and division (`/`).
- **Pros:** $O(1)$ Space Complexity; no extra memory allocation.
- **Cons:** Slightly more complex logic to handle odd/even digit lengths.

---

## 📊 Complexity Analysis

| Approach | Time Complexity | Space Complexity |
| :--- | :--- | :--- |
| String Reversal | $O(n)$ | $O(n)$ |
| **Half-Number Reversal** | **$O(\log_{10} n)$** | **$O(1)$** |

> **Senior Insight:** In PHP, primitive types like integers are passed by value. Mutating the local copy of `$x` within the `solve` method is memory-efficient and safe from side effects in the parent scope.

---

## 🛠️ Implementation Details
- **Negative Numbers:** Immediately return `false` as the negative sign prevents symmetry.
- **Trailing Zeros:** Any number ending in `0` (except `0` itself) cannot be a palindrome.
- **Comparison:** For odd-length numbers, we remove the middle digit from the reverted number via `(int)($revertedNumber / 10)` before comparing.