<?php
function checkURL(string $input): string{
    if (!preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $input)) return "Not a valid URL";
    return "OK";
}
