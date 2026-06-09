<?php

namespace Extensions;

use PhpBench\Executor\Benchmark\TemplateExecutor;
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
}
