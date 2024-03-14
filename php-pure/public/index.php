<?php

declare(strict_types=1);

xhprof_enable(XHPROF_FLAGS_MEMORY + XHPROF_FLAGS_CPU);

echo "hello, world!";

file_put_contents('/profiles/'.time().'.application.xhprof', serialize(xhprof_disable()));