# 🐘 PHP & Backend Engineering Cheat Sheet

This document is a living record of high-level engineering principles, 
performance optimizations, and database strategies synthesized during the 
`PHP-bytes` project.

---

## 🏛️ Fundamental Concepts

### **Algorithmic Complexity**
* **Time Complexity ($O$):** Measures how execution time grows relative to input size ($n$). 
    * **Goal:** Aim for $O(1)$ or $O(n)$. 
    * **Avoid:** $O(n^2)$ for backend APIs as they do not scale.
* **Space Complexity ($S$):** Measures additional memory required. 
    * **The Senior Trade-off:** We often "trade space for time." For example, using a Hash Map ($O(n)$ space) to turn an $O(n^2)$ search into $O(n)$ time.

---

## ⚡ PHP-Specific Performance

### **Search Operations**
* **Linear Search (`array_search`, `in_array`):**
    * **Complexity:** $O(n)$.
    * **Under the Hood:** PHP scans every element from index 0 until a match is found.
* **Hash Table Lookup (`isset`, `array_key_exists`):**
    * **Complexity:** $O(1)$ on average.
    * **Under the Hood:** PHP uses an internal hash table to jump directly to the memory address of the key.
    * **Takeaway:** Always map search-heavy data to associative array **keys**.

### **Array Internals**
* PHP arrays are **Ordered Hash Tables**. While powerful, they have significant memory overhead per element. 
* **Optimization:** For massive, fixed-size numerical datasets, use `SplFixedArray` to drastically reduce memory usage.

---

## 🛠️ Senior Engineering Standards

### **1. Data Immutability**
* **The Principle:** Never mutate input parameters (e.g., setting `$nums[$i] = null`).
* **The "Why":** In complex backend systems, the same data object might be used by multiple services. "Side effects" in one function can cause silent, hard-to-trace crashes in another. Treat input as **Read Only**.

### **2. Strict Typing & Quality**
* **Strict Types:** Always include `declare(strict_types=1);` at the top of files. It prevents "Type Juggling" (implicit conversion), which saves CPU cycles and catches bugs before they hit production.
* **Return Early:** Avoid deep `if/else` nesting. Exit the function immediately once the result is determined. This keeps the code "flat" and reduces cognitive load.

---

## 🔍 SQL & Database Optimization

### **The N+1 Query Problem**
* **Definition:** Running one query to fetch a list of $N$ rows, then running $N$ additional queries to fetch related data for each row.
* **The Fix:** Use **Eager Loading** via `JOIN` queries or specialized ORM methods (like Laravel's `with()`).

### **Indexing Strategies**
* **B-Tree:** The default index type. Best for equality (`=`) and range (`<`, `>`) queries.
* **GIN/GiST:** Specialized indexes for Full-Text Search, Arrays, and complex types like **JSONB** or **Vectors** (`pgvector`).
* **Covering Index:** An index that includes all columns required for a query, allowing the DB engine to skip the "table heap" lookup entirely for maximum speed.