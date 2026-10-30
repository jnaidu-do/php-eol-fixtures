<?php
header("Content-Type: text/plain");
echo "php-unpinned php=", PHP_VERSION, " memory_limit=", ini_get("memory_limit"), " WEB_CONCURRENCY=", getenv("WEB_CONCURRENCY") ?: "unset", "\n";
