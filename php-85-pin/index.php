<?php
header("Content-Type: text/plain");
echo "php-85-pin php=", PHP_VERSION, " memory_limit=", ini_get("memory_limit"), " WEB_CONCURRENCY=", getenv("WEB_CONCURRENCY") ?: "unset", "\n";
