<?php

namespace Extensions;

use PhpBench\DependencyInjection\Container;
use PhpBench\DependencyInjection\ExtensionInterface;
use PhpBench\Extension\RunnerExtension;
use PhpBench\Remote\Launcher;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WithGCExtension implements ExtensionInterface
{
    public function configure(OptionsResolver $resolver): void
    {
    }

    public function load(Container $container): void
    {
        $container->register(WithGCExecutor::class, function (Container $container) {
            return new WithGCExecutor($container->get(Launcher::class));
        },                   [RunnerExtension::TAG_EXECUTOR => ['name' => 'custom',]]);
    }
}
