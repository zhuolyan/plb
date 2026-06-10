<?php

namespace App\Benchmarks;

use App\NBodySimulation\ArrayNBodySimulation;
use App\NBodySimulation\SplNBodySimulation;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\ParamProviders;
use SplFixedArray;

class NBodySimulationBenchmark
{
    use DataProviderTrait;

    private array         $array_result = [];
    private SplFixedArray $spl_result;

    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchArraySimulationMiddle(array $params): void
    {
        $this->arraySimulation($params);
    }

    #[Groups(["easy", "n-body-simulation"])]
    #[ParamProviders('middleProvider')]
    public function benchSplSimulationMiddle(array $params): void
    {
        $this->splSimulation($params);
    }

    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchArraySimulationHard(array $params): void
    {
        $this->arraySimulation($params);
    }

    #[Groups(["hard", "n-body-simulation"])]
    #[ParamProviders('hardProvider')]
    public function benchSplSimulationHard(array $params): void
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
