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
    public function benchColdDynamicMatrixMultiplicationEasy(int $size): DynamicMatrix
    {
        return $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdFixedMatrixMultiplicationEasy(int $size): FixedMatrix
    {
        return $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationEasy(int $size): DynamicMatrix
    {
        return $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmFixedMatrixMultiplicationEasy(int $size): FixedMatrix
    {
        return $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdDynamicMatrixMultiplicationMiddle(int $size): DynamicMatrix
    {
        return $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdFixedMatrixMultiplicationMiddle(int $size): FixedMatrix
    {
        return $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationMiddle(int $size): DynamicMatrix
    {
        return $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmFixedMatrixMultiplicationMiddle(int $size): FixedMatrix
    {
        return $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdDynamicMatrixMultiplicationHard(int $size): DynamicMatrix
    {
        return $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdFixedMatrixMultiplicationHard(int $size): FixedMatrix
    {
        return $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmDynamicMatrixMultiplicationHard(int $size): DynamicMatrix
    {
        return $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmFixedMatrixMultiplicationHard(int $size): FixedMatrix
    {
        return $this->fixedMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchColdDynamicMatrixMultiplicationUltimate(int $size): DynamicMatrix
    {
        return $this->dynamicMatrixMultiplication($size);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchColdFixedMatrixMultiplicationUltimate(int $size): FixedMatrix
    {
        return $this->fixedMatrixMultiplication($size);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider(2, 80);
    }

    public function middleDataProvider(): array
    {
        return $this->dataProvider(80, 160, 2);
    }

    public function hardDataProvider(): array
    {
        return $this->dataProvider(160, 530, 10);
    }

    public function ultimateDataProvider(): array
    {
        return $this->dataProvider(1_000, 5_000, 1_000);
    }

    private function dynamicMatrixMultiplication(int $size): DynamicMatrix
    {
        $first  = new DynamicMatrix($size, true);
        $second = new DynamicMatrix($size, true);

        return $first->multiplication($second);
    }

    private function fixedMatrixMultiplication(int $size): FixedMatrix
    {
        $first  = new FixedMatrix($size, true);
        $second = new FixedMatrix($size, true);

        return $first->multiplication($second);
    }
}
