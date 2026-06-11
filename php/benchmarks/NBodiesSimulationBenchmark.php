<?php

namespace App\Benchmarks;

use App\NBodySimulation\DynamicNBodiesSimulation;
use App\NBodySimulation\FixedNBodiesSimulation;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;
use SplFixedArray;

class NBodiesSimulationBenchmark
{
    use DataProviderTrait;

    private array         $dynamic_result = [];
    private SplFixedArray $fixed_result;

    #[Iterations(10)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchColdDynamicSimulationMiddle(int $size): void
    {
        $this->dynamicSimulation($size);
    }

    #[Iterations(10)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchColdFixedSimulationMiddle(int $size): void
    {
        $this->fixedSimulation($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchWarmDynamicSimulationMiddle(int $size): void
    {
        $this->dynamicSimulation($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchWarmFixedSimulationMiddle(int $size): void
    {
        $this->fixedSimulation($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchColdDynamicSimulationHard(int $size): void
    {
        $this->dynamicSimulation($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchColdFixedSimulationHard(int $size): void
    {
        $this->fixedSimulation($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchWarmDynamicSimulationHard(int $size): void
    {
        $this->dynamicSimulation($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchWarmFixedSimulationHard(int $size): void
    {
        $this->fixedSimulation($size);
    }

    public function hardProvider(): array
    {
        return $this->dataProvider(144_000, 1_584_000, 144_000);
    }

    public function middleProvider(): array
    {
        return $this->dataProvider(240, 144_000, 240);
    }

    private function dynamicSimulation(int $size): void
    {
        $simulation           = new DynamicNBodiesSimulation($size);
        $this->dynamic_result = $simulation->run();
    }

    private function fixedSimulation(int $size): void
    {
        $simulation         = new FixedNBodiesSimulation($size);
        $this->fixed_result = $simulation->run();
    }
}
