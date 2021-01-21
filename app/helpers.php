<?php

function toTime(float $hour): string
{
    $hours = intval($hour);
    $remainder = $hour - $hours;
    $minutes = floor($remainder * 60);
    $stringMinutes = $minutes < 10 ? "0" . $minutes : "{$minutes}";
    return "{$hours}:{$stringMinutes} hrs";
}
