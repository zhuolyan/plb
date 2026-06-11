<?php

namespace App\Benchmarks;

use App\Matrix\DynamicMatrix;
use App\Matrix\FixedMatrix;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;

class MatrixMultiplicationBenchmark
{
    use DataProviderTrait;

    #[Iterations(10)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdDynamicMatrixMultiplicationEasy(array $params): void
    {
        $this->dynamicMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdFixedMatrixMultiplicationEasy(array $params): void
    {
        $this->fixedMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationEasy(array $params): void
    {
        $this->dynamicMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmFixedMatrixMultiplicationEasy(array $params): void
    {
        $this->fixedMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdDynamicMatrixMultiplicationMiddle(array $params): void
    {
        $this->dynamicMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdFixedMatrixMultiplicationMiddle(array $params): void
    {
        $this->fixedMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationMiddle(array $params): void
    {
        $this->dynamicMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmFixedMatrixMultiplicationMiddle(array $params): void
    {
        $this->fixedMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdDynamicMatrixMultiplicationHard(array $params): void
    {
        $this->dynamicMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdFixedMatrixMultiplicationHard(array $params): void
    {
        $this->fixedMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationHard(array $params): void
    {
        $this->dynamicMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmFixedMatrixMultiplicationHard(array $params): void
    {
        $this->fixedMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchColdDynamicMatrixMultiplicationUltimate(array $params): void
    {
        $this->dynamicMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchColdFixedMatrixMultiplicationUltimate(array $params): void
    {
        $this->fixedMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationUltimate(array $params): void
    {
        $this->dynamicMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchWarmFixedMatrixMultiplicationUltimate(array $params): void
    {
        $this->fixedMatrixMultiplication($params);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider(2, 80);
    }

    public function middleDataProvider(): array
    {
        return $this->dataProvider(80, 160);
    }

    public function hardDataProvider(): array
    {
        return $this->dataProvider(160, 530, 10);
    }

    public function ultimateDataProvider(): array
    {
        return $this->dataProvider(1_000, 5_000, 1_000);
    }

    private function dynamicMatrixMultiplication(array $params): void
    {
        $first  = new DynamicMatrix($params['size'], true);
        $second = new DynamicMatrix($params['size'], true);

        $first->multiplication($second);
    }

    private function fixedMatrixMultiplication(array $params): void
    {
        $first  = new FixedMatrix($params['size'], true);
        $second = new FixedMatrix($params['size'], true);

        $first->multiplication($second);
    }
}
