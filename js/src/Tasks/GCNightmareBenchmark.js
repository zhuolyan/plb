import {Node} from "../Tested/GCNigthmare/Node.js";
import {dataProvider} from "../helpers.js";

export class GCNightmareBenchmark
{
    result = null;

    static defaultDataProvider()
    {
        return dataProvider(10_000, 10_000_000, 10_000)
    }

    benchColdGCNightmareEasy(size)
    {
        for (let i = 0; i < size; i++) {
            let arr        = {};
            arr[`key${i}`] = i;
            this.result    = arr;
        }
        return this.result;
    }

    benchWarmGCNightmareEasy(size)
    {
        return this.benchColdGCNightmareEasy(size);
    }

    benchColdGCNightmareMiddle(size)
    {
        for (let i = 0; i < size; i++) {
            this.result      = {};
            this.result.test = "test";
        }
        return this.result;
    }

    benchWarmGCNightmareMiddle(size)
    {
        return this.benchColdGCNightmareMiddle(size);
    }

    benchColdGCNightmareHard(size)
    {
        for (let i = 0; i < size; i++) {
            this.result            = new Node();
            this.result.left       = new Node();
            this.result.right      = new Node();
            this.result.right.left = this.result;
            this.result.left.right = this.result.left;
        }
        return this.result;
    }

    benchWarmGCNightmareHard(size)
    {
        return this.benchColdGCNightmareHard(size);
    }
}