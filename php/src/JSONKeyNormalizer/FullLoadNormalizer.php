<?php

namespace App\JSONKeyNormalizer;

class FullLoadNormalizer
{
    use NormalizerTrait;

    private array $result = [];
    private array $input  = [];

    public function run(): void
    {
        $this->input = json_decode(file_get_contents(self::INPUT_FILE), true);

        $this->recursiveNormalize($this->input);

        file_put_contents(__DIR__ . "/../../json-normalized.json", json_encode($this->result, JSON_PRETTY_PRINT));
    }

    private function recursiveNormalize(array $data, string $parent_key = ""): void
    {
        $parent_key = $this->prepareParentKey($parent_key);

        foreach ($data as $key => $value) {
            $current_key = $parent_key . $key;
            if (is_array($value)) {
                $this->recursiveNormalize($value, $current_key);
            } else {
                $this->result[$this->normalize($current_key)] = $value;
            }
        }
    }
}
