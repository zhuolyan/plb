import {DynamicMatrix} from "../Tested/Matrix/DynamicMatrix.js";
import {FixedMatrix} from "../Tested/Matrix/FixedMatrix.js";
import {dataProvider} from "../helpers.js";

export class MatrixMultiplicationBenchmark
{
    static easyDataProvider()
    {
        return dataProvider(2, 80)
    }

    static middleDataProvider()
    {
        return dataProvider(80, 160)
    }

    static hardDataProvider()
    {
        return dataProvider(160, 530, 10);
    }

    static ultimateDataProvider()
    {
        return dataProvider(1_000, 5_000, 1_000);
    }

    benchColdDynamicMatrixMultiplicationEasy(size)
    {
        this.dynamicMatrixMultiplication(size);
    }

    benchColdFixedMatrixMultiplicationEasy(size)
    {
        this.fixedMatrixMultiplication(size);
    }

    benchWarmDynamicMatrixMultiplicationEasy(size)
    {
        this.dynamicMatrixMultiplication(size);
    }

    benchWarmFixedMatrixMultiplicationEasy(size)
    {
        this.fixedMatrixMultiplication(size);
    }

    benchColdDynamicMatrixMultiplicationMiddle(size)
    {
        this.dynamicMatrixMultiplication(size);
    }

    benchColdFixedMatrixMultiplicationMiddle(size)
    {
        this.fixedMatrixMultiplication(size);
    }

    benchWarmDynamicMatrixMultiplicationMiddle(size)
    {
        this.dynamicMatrixMultiplication(size);
    }

    benchWarmFixedMatrixMultiplicationMiddle(size)
    {
        this.fixedMatrixMultiplication(size);
    }

    benchColdDynamicMatrixMultiplicationHard(size)
    {
        this.dynamicMatrixMultiplication(size);
    }

    benchColdFixedMatrixMultiplicationHard(size)
    {
        this.fixedMatrixMultiplication(size);
    }

    benchWarmDynamicMatrixMultiplicationHard(size)
    {
        this.dynamicMatrixMultiplication(size);
    }

    benchWarmFixedMatrixMultiplicationHard(size)
    {
        this.fixedMatrixMultiplication(size);
    }

    benchColdDynamicMatrixMultiplicationUltimate(size)
    {
        this.dynamicMatrixMultiplication(size);
    }

    benchColdFixedMatrixMultiplicationUltimate(size)
    {
        this.fixedMatrixMultiplication(size);
    }

    benchWarmDynamicMatrixMultiplicationUltimate(size)
    {
        this.dynamicMatrixMultiplication(size);
    }

    benchWarmFixedMatrixMultiplicationUltimate(size)
    {
        this.fixedMatrixMultiplication(size);
    }

    dynamicMatrixMultiplication(size)
    {
        const first  = new DynamicMatrix(size, true)
        const second = new DynamicMatrix(size, true)

        first.multiplication(second);
    }

    fixedMatrixMultiplication(size)
    {
        const first  = new FixedMatrix(size, true)
        const second = new FixedMatrix(size, true)

        first.multiplication(second);
    }
}