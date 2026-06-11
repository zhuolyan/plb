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
    public function benchColdDynamicSimulationMiddle(array $params): void
    {
        $this->dynamicSimulation($params);
    }

    #[Iterations(10)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchColdFixedSimulationMiddle(array $params): void
    {
        $this->fixedSimulation($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchWarmDynamicSimulationMiddle(array $params): void
    {
        $this->dynamicSimulation($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchWarmFixedSimulationMiddle(array $params): void
    {
        $this->fixedSimulation($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchColdDynamicSimulationHard(array $params): void
    {
        $this->dynamicSimulation($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchColdFixedSimulationHard(array $params): void
    {
        $this->fixedSimulation($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchWarmDynamicSimulationHard(array $params): void
    {
        $this->dynamicSimulation($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchWarmFixedSimulationHard(array $params): void
    {
        $this->fixedSimulation($params);
    }

    public function hardProvider(): array
    {
        return $this->dataProvider(144_000, 1_584_000, 144_000);
    }

    public function middleProvider(): array
    {
        return $this->dataProvider(240, 144_000, 240);
    }

    private function dynamicSimulation(array $params): void
    {
        $simulation           = new DynamicNBodiesSimulation($params['size']);
        $this->dynamic_result = $simulation->run();
    }

    private function fixedSimulation(array $params): void
    {
        $simulation         = new FixedNBodiesSimulation($params['size']);
        $this->fixed_result = $simulation->run();
    }
}
