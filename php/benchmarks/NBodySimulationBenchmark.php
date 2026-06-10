<?php

namespace App\Benchmarks;

use App\NBodySimulation\ArrayNBodySimulation;
use App\NBodySimulation\SplNBodySimulation;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;
use SplFixedArray;

class NBodySimulationBenchmark
{
    use DataProviderTrait;

    private array         $array_result = [];
    private SplFixedArray $spl_result;

    #[Iterations(10)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchColdArraySimulationMiddle(array $params): void
    {
        $this->arraySimulation($params);
    }

    #[Iterations(10)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchColdSplSimulationMiddle(array $params): void
    {
        $this->splSimulation($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchWarmArraySimulationMiddle(array $params): void
    {
        $this->arraySimulation($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchWarmSplSimulationMiddle(array $params): void
    {
        $this->splSimulation($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchColdArraySimulationHard(array $params): void
    {
        $this->arraySimulation($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchColdSplSimulationHard(array $params): void
    {
        $this->splSimulation($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchWarmArraySimulationHard(array $params): void
    {
        $this->arraySimulation($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchWarmSplSimulationHard(array $params): void
    {
        $this->splSimulation($params);
    }

    public function hardProvider(): array
    {
        return $this->dataProvider('size', 144_000, 1_584_000, 144_000);
    }

    public function middleProvider(): array
    {
        return $this->dataProvider('size', 240, 144_000, 240);
    }

    private function arraySimulation(array $params): void
    {
        $simulation         = new ArrayNBodySimulation($params['size']);
        $this->array_result = $simulation->run();
    }

    private function splSimulation(array $params): void
    {
        $simulation       = new SplNBodySimulation($params['size']);
        $this->spl_result = $simulation->run();
    }
}
