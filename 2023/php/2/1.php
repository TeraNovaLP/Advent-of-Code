<?php

$file = file('input.txt', FILE_IGNORE_NEW_LINES);

$total = 0;

foreach ($file as $line) {
    $parts = explode(' ', $line, 3);
    $game_id = (int)str_replace(':', '', $parts[1]);
    $rounds = explode(';', $parts[2]);

    $possible = true;

    foreach (explode('; ', $parts[2]) as $round) {
        $map = [];

        foreach (explode(', ', $round) as $subset) {
            $pair = explode(' ', $subset);
            $map += [$pair[1] => (int)$pair[0]];
        }

        if (($map["red"] ?? 0) > 12) {
            $possible = false;
        }

        if (($map["green"] ?? 0) > 13) {
            $possible = false;
        }

        if (($map["blue"] ?? 0) > 14) {
            $possible = false;
        }
    }

    if ($possible) {
        $total += $game_id;
    }
}

echo ($total);
