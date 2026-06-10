<?php

namespace App\JSONKeyNormlizer;

use JsonMachine\JsonDecoder\ExtJsonDecoder;
use JsonMachine\RecursiveItems;
use SplFileObject;

class ReadFromStreamNormalizer
{
    use NormalizerTrait;

    private const string END_LINE = "," . PHP_EOL;
    private array          $result = [];
    private RecursiveItems $input;
    private SplFileObject  $file;

    public function run()
    {
        $this->file = new SplFileObject(__DIR__ . "/../../json-normalized.json", "w");
        $this->file->fwrite("{" . PHP_EOL);

        $this->input = RecursiveItems::fromFile(self::INPUT_FILE, ['decoder' => new ExtJsonDecoder(true)]);
        $this->recursiveNormalize($this->input);

        $this->file->fwrite("}");
        $this->file->fflush();
    }

    private function recursiveNormalize(RecursiveItems $data, string $parent_key = ""): void
    {
        $parent_key = $this->prepareParentKey($parent_key);

        foreach ($data as $key => $value) {
            $current_key = $parent_key . $key;

            if ($value instanceof RecursiveItems) {
                $this->recursiveNormalize($value, $current_key);
            } else {
                $this->writeLine($this->normalize($current_key), $value);
            }
        }
        $this->file->fseek(-strlen(self::END_LINE));
        $this->file->fwrite("}");
    }

    private function writeLine(string $key, string $value): void
    {
        if (in_array($key, $this->result)) {
            return;
        }

        $this->result[] = $key;

        $key   = json_encode($key);
        $value = json_encode($value);

        $this->file->fwrite("{" . $key . ":" . $value . "}" . self::END_LINE);
    }
}
