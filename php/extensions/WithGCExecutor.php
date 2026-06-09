<?php

namespace Extensions;

use PhpBench\Executor\Benchmark\TemplateExecutor;
use PhpBench\Executor\ExecutionContext;
use PhpBench\Executor\ExecutionResults;
use PhpBench\Model\Result\MemoryResult;
use PhpBench\Model\Result\TimeResult;
use PhpBench\Registry\Config;
use PhpBench\Remote\Launcher;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WithGCExecutor extends TemplateExecutor
{
    public function __construct(Launcher $launcher)
    {
        parent::__construct($launcher, __DIR__ . '/templates/with_gc.template');
    }

    public function configure(OptionsResolver $options): void
    {
        parent::configure($options);
        $options->setDefaults([
                                  self::OPTION_SAFE_PARAMETERS => true,
                              ]);
    }

    public function execute(ExecutionContext $context, Config $config): ExecutionResults
    {
        return ExecutionResults::fromResults(
            TimeResult::fromArray([]),
            MemoryResult::fromArray([])
        );
    }
}
