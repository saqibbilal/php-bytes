# 01. Two Sum - Analysis & Notes

## 🧠 Approach: One-Pass Hash Map

The most efficient way to solve this is by using a Hash Map (Associative Array in PHP) to store the values 
we have already seen. As we iterate through the array, we check if the "complement" (the value needed to reach 
the target) already exists in our map.

### Why this is the "Senior" choice:
- **Brute Force ($O(n^2)$):** Checking every pair with nested loops is inefficient for large datasets ($10^4$ length).
- **Two-Pass ($O(n)$):** Adding everything to the map first, then iterating again, is fine but unnecessary.
- **One-Pass ($O(n)$):** We look up and insert in a single traversal, making it highly performant.

---

## 📈 Complexity Analysis

| Metric | Complexity | Description |
| :--- | :--- | :--- |
| **Time** | $O(n)$ | We traverse the list of $n$ elements exactly once. Each lookup in the hash map is $O(1)$. |
| **Space** | $O(n)$ | In the worst case, we store $n-1$ elements in the hash map before finding the match. |

---

## 🐘 PHP Implementation Details

In PHP, associative arrays are implemented as **Ordered Hash Tables**. This gives us the following advantages for 
this problem:

1. **`isset()` Efficiency:** Checking `isset($map[$complement])` is an average $O(1)$ operation.
2. **Memory Management:** PHP 8.x handles small-to-medium arrays very efficiently, but for massive datasets, we should be mindful of the overhead of associative array pointers.
3. **Strict Typing:** Using `declare(strict_types=1);` and proper type-hinting `array $nums, int $target` ensures the engine doesn't waste cycles on implicit type conversion.

---

## 🛠️ Refactor/Optimization Notes
- **Early Exit:** The function returns as soon as the complement is found, preventing unnecessary iterations.
- **No Solution Case:** While the problem guarantees exactly one solution, returning an empty `[]` or throwing a `RuntimeException` is good practice for production-grade code.