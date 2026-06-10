<?php

namespace App\Benchmarks;

use App\Matrix\ArrayMatrix;
use App\Matrix\SplMatrix;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\ParamProviders;

class MatrixMultiplicationBenchmark
{
    use DataProviderTrait;

    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchArrayMatrixMultiplicationEasy(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchSplMatrixMultiplicationEasy(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchArrayMatrixMultiplicationMiddle(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchSplMatrixMultiplicationMiddle(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchArrayMatrixMultiplicationHard(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchSplMatrixMultiplicationHard(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchArrayMatrixMultiplicationUltimate(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchSplMatrixMultiplicationUltimate(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider('size', 2, 80);
    }

    public function middleDataProvider(): array
    {
        return $this->dataProvider('size', 80, 160);
    }

    public function hardDataProvider(): array
    {
        return $this->dataProvider('size', 160, 530, 10);
    }

    public function ultimateDataProvider(): array
    {
        return $this->dataProvider('size', 1_000, 5_000, 1_000);
    }

    private function arrayMatrixMultiplication(array $params): void
    {
        $first  = new ArrayMatrix($params['size'], true);
        $second = new ArrayMatrix($params['size'], true);

        $first->multiplication($second);
    }

    private function splMatrixMultiplication(array $params): void
    {
        $first  = new SplMatrix($params['size'], true);
        $second = new SplMatrix($params['size'], true);

        $first->multiplication($second);
    }
}
