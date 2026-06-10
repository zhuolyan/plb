<?php

const DOMAIN = "htpps://example.com/";

function generate(string $domain = DOMAIN, int $depth = 3): array
{
    $depth--;
    $keys   = include "keys.php";
    $result = [];

    $i = 0;
    foreach ($keys as $key => $uri_path) {
        $current = $domain . $uri_path . "/";
        if ($i == 3) {
            $i = 0;
        }
        if ($i == 0 && $depth > 0) {
            $result[$key] = generate($current, $depth);
        } else {
            $result[$key] = $current;
        }
        $i++;
    }

    return $result;
}

file_put_contents(__DIR__ . "/../domains.json", json_encode(generate(), JSON_PRETTY_PRINT));
