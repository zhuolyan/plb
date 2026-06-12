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

    #[Iterations(10)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchColdDynamicSimulationMiddle(int $size): array
    {
        return $this->dynamicSimulation($size);
    }

    #[Iterations(10)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchColdFixedSimulationMiddle(int $size): SplFixedArray
    {
        return $this->fixedSimulation($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchWarmDynamicSimulationMiddle(int $size): array
    {
        return $this->dynamicSimulation($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchWarmFixedSimulationMiddle(int $size): SplFixedArray
    {
        return $this->fixedSimulation($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchColdDynamicSimulationHard(int $size): array
    {
        return $this->dynamicSimulation($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchColdFixedSimulationHard(int $size): SplFixedArray
    {
        return $this->fixedSimulation($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchWarmDynamicSimulationHard(int $size): array
    {
        return $this->dynamicSimulation($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchWarmFixedSimulationHard(int $size): SplFixedArray
    {
        return $this->fixedSimulation($size);
    }

    public function hardProvider(): array
    {
        return $this->dataProvider(144_000, 1_584_000, 144_000);
    }

    public function middleProvider(): array
    {
        return $this->dataProvider(240, 144_000, 240);
    }

    private function dynamicSimulation(int $size): array
    {
        $simulation = new DynamicNBodiesSimulation($size);

        return $simulation->run();
    }

    private function fixedSimulation(int $size): SplFixedArray
    {
        $simulation = new FixedNBodiesSimulation($size);

        return $simulation->run();
    }
}
