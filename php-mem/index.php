<?php
header("Content-Type: text/plain");
$mi = @file_get_contents("/proc/meminfo");
preg_match('/MemTotal:\s+(\d+)/', (string)$mi, $m);
$cg2 = @trim((string)@file_get_contents("/sys/fs/cgroup/memory.max"));
$cg1 = @trim((string)@file_get_contents("/sys/fs/cgroup/memory/memory.limit_in_bytes"));
$cg  = $cg2 !== "" ? "v2:$cg2" : ($cg1 !== "" ? "v1:$cg1" : "n/a");
echo "php=", PHP_VERSION, "\n";
echo "memory_limit=", ini_get("memory_limit"), "\n";
echo "WEB_CONCURRENCY=", getenv("WEB_CONCURRENCY") ?: "unset", "\n";
echo "WEB_CONCURRENCY_SET_BY=", getenv("WEB_CONCURRENCY_SET_BY") ?: "unset", "\n";
echo "MemTotal_MB=", isset($m[1]) ? intdiv((int)$m[1], 1024) : "n/a", "\n";
echo "cgroup_limit=", $cg, "\n";
echo "cpus=", (int)@shell_exec("nproc 2>/dev/null"), "\n";
