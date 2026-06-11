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
    public function benchColdDynamicMatrixMultiplicationEasy(int $size): void
    {
        $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdFixedMatrixMultiplicationEasy(int $size): void
    {
        $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationEasy(int $size): void
    {
        $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmFixedMatrixMultiplicationEasy(int $size): void
    {
        $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdDynamicMatrixMultiplicationMiddle(int $size): void
    {
        $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdFixedMatrixMultiplicationMiddle(int $size): void
    {
        $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationMiddle(int $size): void
    {
        $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmFixedMatrixMultiplicationMiddle(int $size): void
    {
        $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdDynamicMatrixMultiplicationHard(int $size): void
    {
        $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdFixedMatrixMultiplicationHard(int $size): void
    {
        $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationHard(int $size): void
    {
        $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmFixedMatrixMultiplicationHard(int $size): void
    {
        $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchColdDynamicMatrixMultiplicationUltimate(int $size): void
    {
        $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchColdFixedMatrixMultiplicationUltimate(int $size): void
    {
        $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationUltimate(int $size): void
    {
        $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchWarmFixedMatrixMultiplicationUltimate(int $size): void
    {
        $this->fixedMatrixMultiplication($size);
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

    private function dynamicMatrixMultiplication(int $size): void
    {
        $first  = new DynamicMatrix($size, true);
        $second = new DynamicMatrix($size, true);

        $first->multiplication($second);
    }

    private function fixedMatrixMultiplication(int $size): void
    {
        $first  = new FixedMatrix($size, true);
        $second = new FixedMatrix($size, true);

        $first->multiplication($second);
    }
}
