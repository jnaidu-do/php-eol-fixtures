# PHP EOL test fixtures
Push these folders to one repo (e.g. php-eol-fixtures); create one App Platform app per folder
using spec-template.yaml (source_dir = folder name). Each app prints its PHP version.

| folder        | composer constraint | resolves to | NEW app (after cutoff) | OLD app (before cutoff) |
|---------------|---------------------|-------------|------------------------|-------------------------|
| php-unpinned  | ext-json only       | 8.5.x       | builds                 | builds                  |
| php-85        | ^8.2                | 8.5.x       | builds                 | builds                  |
| php-82        | 8.2.*               | 8.2.x       | builds (== floor)      | builds                  |
| php-caret-80  | ^8.0                | 8.5.x       | builds (names 8.0!)    | builds                  |
| php-81        | 8.1.*               | 8.1.34      | **BLOCKED php_version_eol** | builds             |
| php-80        | 8.0.*               | n/a         | fails (no 8.0 on heroku-22), NOT an EOL message | same |
