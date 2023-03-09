<?php
function transformString(string $input): string {
    $normalized = array();
    foreach (preg_split('/([^a-z])/', strtolower($input)) as $word) {
        $normalized[] = ucfirst($word);
    }
    return implode('', $normalized);
}
