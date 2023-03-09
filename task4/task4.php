<?php
function removeItemFromArray(array &$arr, int $position): void{
    array_splice($arr, $position, 1);
}