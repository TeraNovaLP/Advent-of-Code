<?php

$file = file('input.txt', FILE_IGNORE_NEW_LINES);

$total = 0;

$map = [
    'one' => 1,
    'two' => 2,
    'three' => 3,
    'four' => 4,
    'five' => 5,
    'six' => 6,
    'seven' => 7,
    'eight' => 8,
    'nine' => 9
];

foreach ($file as $line) {
    $positions = [];

    foreach ($map as $key => $value) {
        $pos = strpos($line, $key);

        if (is_numeric($pos)) {
            array_push($positions, convert($pos, $value));
        }

        $pos = strrpos($line, $key);

        if (is_numeric($pos)) {
            array_push($positions, convert($pos, $value));
        }

        $pos = strpos($line, $value);

        if (is_numeric($pos)) {
            array_push($positions, convert($pos, $value));
        }

        $pos = strrpos($line, $value);

        if (is_numeric($pos)) {
            array_push($positions, convert($pos, $value));
        }
    }

    usort($positions, fn ($a, $b) => $a->pos <=> $b->pos);

    $first = $positions[array_key_first($positions)]->val;
    $last = $positions[array_key_last($positions)]->val;

    $num = (int)($first . $last);

    $total += $num;
}

function convert(int $pos, int $val)
{
    $obj = new stdClass;
    $obj->pos = $pos;
    $obj->val = $val;

    return $obj;
}

echo ($total);
