<?php
function getBetweenValues(int $A, int $B): Generator {
    yield $A;
    if(($A <=> $B) > 0){
        yield from getBetweenValues($A-1, $B);
    } elseif(($A <=> $B) < 0){
        yield from getBetweenValues($A+1, $B);
    }
}