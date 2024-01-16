<?php

$file = file('input.txt', FILE_IGNORE_NEW_LINES);

$total = 0;

foreach ($file as $line) {
    $chars = str_split($line);

    $nums = array_filter($chars, fn ($val) => is_numeric($val));

    $first = $nums[array_key_first($nums)];
    $last = $nums[array_key_last($nums)];

    $num = (int)($first . $last);

    $total += $num;
}

echo ($total);
