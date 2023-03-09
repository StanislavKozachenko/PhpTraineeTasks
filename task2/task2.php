<?php
function countOfDays(string $date): int{
    return (int)((strtotime($date) - time())/86400);
}