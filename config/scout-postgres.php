<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Text Search Configuration
    |--------------------------------------------------------------------------
    |
    | Postgres regconfig used for both indexing (generated column) and querying
    | (websearch_to_tsquery). The package migration creates "simple_unaccent"
    | by default — a copy of "simple" mapped through the unaccent dictionary.
    */
    'text_search_config' => env('SCOUT_POSTGRES_CONFIG', 'simple_unaccent'),

    /*
    |--------------------------------------------------------------------------
    | Score Weights
    |--------------------------------------------------------------------------
    |
    | Final score = ts_rank * fts_weight + similarity * trigram_weight.
    */
    'fts_weight' => (float) env('SCOUT_POSTGRES_FTS_WEIGHT', 2.0),
    'trigram_weight' => (float) env('SCOUT_POSTGRES_TRIGRAM_WEIGHT', 1.0),

    /*
    |--------------------------------------------------------------------------
    | Trigram Similarity Threshold
    |--------------------------------------------------------------------------
    |
    | Applied per-transaction via SET LOCAL pg_trgm.<fn>_threshold (the
    | threshold variable name follows the chosen `trigram_function`).
    | Lower = more recall, more noise. Higher = stricter fuzzy matching.
    |
    | The default 0.3 is tuned for typical mixed-length corpora (titles,
    | authors, short descriptions). On long-text corpora (multi-paragraph
    | summaries, full articles), a lower threshold (e.g. 0.15) explodes the
    | trigram-bitmap candidate set and pushes p95 latency into the seconds.
    | Tune per model via `scoutPostgresConfig()` if your text is long.
    */
    'trigram_threshold' => (float) env('SCOUT_POSTGRES_TRIGRAM_THRESHOLD', 0.3),

    /*
    |--------------------------------------------------------------------------
    | Trigram Function
    |--------------------------------------------------------------------------
    |
    | Selects the pg_trgm function and operator used for fuzzy matching:
    |
    |   "similarity"             — operator `%`,  whole-string overlap
    |   "word_similarity"        — operator `<%`, considers only words near
    |                              the query
    |   "strict_word_similarity" — operator `<<%`, requires extent boundaries
    |                              to align (most selective)
    |
    | Default is `similarity` because it has the most predictable performance
    | profile when paired with the default `trigram_threshold = 0.3`. The
    | `<%` and `<<%` operators have different threshold semantics (default
    | GUC 0.6) and produce larger candidate bitmaps at the same numerical
    | threshold; switch only after measuring on your corpus and tuning the
    | threshold accordingly.
    */
    'trigram_function' => env('SCOUT_POSTGRES_TRIGRAM_FUNCTION', 'similarity'),

    /*
    |--------------------------------------------------------------------------
    | Ranking Function
    |--------------------------------------------------------------------------
    |
    | "ts_rank" — frequency-based. "ts_rank_cd" — cover density.
    */
    'rank_function' => env('SCOUT_POSTGRES_RANK_FUNCTION', 'ts_rank'),

    /*
    |--------------------------------------------------------------------------
    | Weight Multipliers (D, C, B, A)
    |--------------------------------------------------------------------------
    */
    'rank_weights' => [0.1, 0.2, 0.4, 1.0],

    /*
    |--------------------------------------------------------------------------
    | Normalization Bitmask
    |--------------------------------------------------------------------------
    |
    | See Postgres docs: https://www.postgresql.org/docs/current/textsearch-controls.html
    */
    'rank_normalization' => (int) env('SCOUT_POSTGRES_RANK_NORMALIZATION', 32),

    /*
    |--------------------------------------------------------------------------
    | Query Strategy
    |--------------------------------------------------------------------------
    |
    | "adaptive" — run an FTS-only query first, fall back to the hybrid
    |              FTS+trigram query only when FTS recall is insufficient.
    |              Cheapest on common queries; same recall as "hybrid" on
    |              typo / fuzzy queries via fallback.
    | "hybrid"   — always run the FTS+trigram query in a single pass.
    |              Higher floor latency, no two-query fallback overhead.
    | "fts_only" — never use trigram. Loses typo tolerance but cuts the
    |              trigram-bitmap candidate-set cost on every query.
    */
    'query_strategy' => env('SCOUT_POSTGRES_QUERY_STRATEGY', 'adaptive'),

    /*
    |--------------------------------------------------------------------------
    | Short-Prefix Fast Path
    |--------------------------------------------------------------------------
    |
    | Single short tokens like "phil" or "nurb" produce huge candidate sets
    | when run through the full hybrid query (broad prefix expansion plus
    | trigram bitmap). When enabled, queries that are a single token shorter
    | than `prefix_fast_path_max_length` skip websearch_to_tsquery and the
    | trigram pass entirely; only `to_tsquery(:prefix:*)` is used.
    |
    | Trigram tolerance is intentionally disabled on this path — short
    | prefixes are unlikely to be typo'd in a way the prefix expansion does
    | not already cover.
    */
    'prefix_fast_path' => filter_var(env('SCOUT_POSTGRES_PREFIX_FAST_PATH', true), FILTER_VALIDATE_BOOLEAN),
    'prefix_fast_path_max_length' => (int) env('SCOUT_POSTGRES_PREFIX_FAST_PATH_MAX_LENGTH', 6),

    /*
    |--------------------------------------------------------------------------
    | Total Count (COUNT(*) OVER())
    |--------------------------------------------------------------------------
    |
    | When true, every search query computes `COUNT(*) OVER()` so paginators
    | can show the size of the full match set. The window aggregate forces
    | Postgres to materialise every matching row before applying LIMIT, so
    | latency scales with match-set size rather than page size — on broad
    | queries this dominates p95.
    |
    | Default is `false`: the page total reflects the size of the current
    | page only. Opt back in per-query when an exact total is required:
    |
    |   Book::search('foo')
    |       ->options(['scout_postgres' => ['total_count' => true]])
    |       ->paginate(20);
    */
    'total_count' => filter_var(env('SCOUT_POSTGRES_TOTAL_COUNT', false), FILTER_VALIDATE_BOOLEAN),

    /*
    |--------------------------------------------------------------------------
    | Disable JIT per query
    |--------------------------------------------------------------------------
    |
    | Postgres' JIT compile cost frequently exceeds savings on FTS queries —
    | the planner over-estimates row counts on GIN-indexed predicates and
    | enables JIT, then spends 10–30 ms compiling for a query that runs in
    | single-digit ms. We disable JIT per transaction (`SET LOCAL jit = off`).
    | Set to false on hardware where JIT actually pays for itself.
    */
    'disable_jit' => filter_var(env('SCOUT_POSTGRES_DISABLE_JIT', true), FILTER_VALIDATE_BOOLEAN),
];
