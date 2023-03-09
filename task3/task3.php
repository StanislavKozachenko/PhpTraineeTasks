<?php
function sumOfDigits(int $num): int {
    return $num > 0 ? (($num - 1) % 9 + 1) : 0;
}