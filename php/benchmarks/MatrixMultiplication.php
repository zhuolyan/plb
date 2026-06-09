<?php

namespace App\Benchmarks;

use App\Matrix\ArrayMatrix;
use App\Matrix\SplMatrix;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;

class MatrixMultiplication
{
    use DataProviderTrait;

    #[Iterations(10)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdArrayMatrixMultiplicationEasy(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdSplMatrixMultiplicationEasy(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmArrayMatrixMultiplicationEasy(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["easy", "matrix-multiplication"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmSplMatrixMultiplicationEasy(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdArrayMatrixMultiplicationMiddle(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdSplMatrixMultiplicationMiddle(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmArrayMatrixMultiplicationMiddle(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "matrix-multiplication"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmSplMatrixMultiplicationMiddle(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdArrayMatrixMultiplicationHard(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdSplMatrixMultiplicationHard(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmArrayMatrixMultiplicationHard(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmSplMatrixMultiplicationHard(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchColdArrayMatrixMultiplicationUltimate(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchColdSplMatrixMultiplicationUltimate(array $params): void
    {
        $this->splMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchWarmArrayMatrixMultiplicationUltimate(array $params): void
    {
        $this->arrayMatrixMultiplication($params);
    }

    #[Iterations(10)]
    #[Groups(["ultimate", "matrix-multiplication"])]
    #[ParamProviders('ultimateDataProvider')]
    public function benchWarmSplMatrixMultiplicationUltimate(array $params): void
    {
        $this->splMatrixMultiplication($params);
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
