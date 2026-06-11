<?php

namespace App\JSONKeyNormalizer;

trait NormalizerTrait
{
    private const string INPUT_FILE = __DIR__ . '/../../../domains.json';

    private function prepareParentKey(string $parent): string
    {
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
