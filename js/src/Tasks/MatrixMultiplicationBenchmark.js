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
        return dataProvider(80, 160, 2)
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
        return this.dynamicMatrixMultiplication(size);
    }

    benchColdFixedMatrixMultiplicationEasy(size)
    {
        return this.fixedMatrixMultiplication(size);
    }

    benchWarmDynamicMatrixMultiplicationEasy(size)
    {
        return this.dynamicMatrixMultiplication(size);
    }

    benchWarmFixedMatrixMultiplicationEasy(size)
    {
        return this.fixedMatrixMultiplication(size);
    }

    benchColdDynamicMatrixMultiplicationMiddle(size)
    {
        return this.dynamicMatrixMultiplication(size);
    }

    benchColdFixedMatrixMultiplicationMiddle(size)
    {
        return this.fixedMatrixMultiplication(size);
    }

    benchWarmDynamicMatrixMultiplicationMiddle(size)
    {
        return this.dynamicMatrixMultiplication(size);
    }

    benchWarmFixedMatrixMultiplicationMiddle(size)
    {
        return this.fixedMatrixMultiplication(size);
    }

    benchColdDynamicMatrixMultiplicationHard(size)
    {
        return this.dynamicMatrixMultiplication(size);
    }

    benchColdFixedMatrixMultiplicationHard(size)
    {
        return this.fixedMatrixMultiplication(size);
    }

    benchWarmDynamicMatrixMultiplicationHard(size)
    {
        return this.dynamicMatrixMultiplication(size);
    }

    benchWarmFixedMatrixMultiplicationHard(size)
    {
        return this.fixedMatrixMultiplication(size);
    }

    benchColdDynamicMatrixMultiplicationUltimate(size)
    {
        return this.dynamicMatrixMultiplication(size);
    }

    benchColdFixedMatrixMultiplicationUltimate(size)
    {
        return this.fixedMatrixMultiplication(size);
    }

    dynamicMatrixMultiplication(size)
    {
        const first  = new DynamicMatrix(size, true)
        const second = new DynamicMatrix(size, true)

        return first.multiplication(second);
    }

    fixedMatrixMultiplication(size)
    {
        const first  = new FixedMatrix(size, true)
        const second = new FixedMatrix(size, true)

        return first.multiplication(second);
    }
}