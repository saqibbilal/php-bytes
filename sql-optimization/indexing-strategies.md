# SQL Optimization: Indexing Strategies

### B-Tree (Default)
- **Best for:** Equality (`=`) and range queries (`<`, `>`, `BETWEEN`).
- **Use case:** Standard lookups on `user_id` or `created_at`.

### GIN (Generalized Inverted Index)
- **Best for:** Composite types, Arrays, and Full-Text Search.
- **Use case:** Searching tags or JSONB columns in PostgreSQL.

### BRIN (Block Range INdexes)
- **Best for:** Extremely large tables (billions of rows) naturally ordered by time.
- **Use case:** Logging or time-series data where B-Tree would be too large.

