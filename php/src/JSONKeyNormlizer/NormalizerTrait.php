<?php

namespace App\JSONKeyNormlizer;

trait NormalizerTrait
{
    private const INPUT_FILE = __DIR__ . '/../../../domains.json';

    private function prepareParentKey(string $parent)
    {
        if (!empty($parent)) {
            $parent = "$parent-";
        }

        return empty($parent) ? "" : "$parent-";
    }

    private function normalize(string $input): string
    {
        return preg_split('/[_-]/', $input)
               |> (fn($x) => array_map("ucfirst", $x))
               |> (fn($x) => implode("", $x))
               |> lcfirst(...);
    }
}
