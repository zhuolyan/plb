import {Node} from "../Tested/GCNigthmare/Node.js";
import {dataProvider} from "../helpers.js";

export class GCNightmareBenchmark
{
    result = null;

    static defaultDataProvider() {
        return dataProvider(10_000, 10_000_000, 10_000)
    }

    benchColdGCNightmareEasy(size) {
        for (let i = 0; i < size; i++) {
            let arr = {};
            arr[`key${i}`] = i;
            this.result = arr;
        }
    }

    benchWarmGCNightmareEasy(size) {
        this.benchColdGCNightmareEasy(size);
    }

    benchColdGCNightmareMiddle(size) {
        for (let i = 0; i < size; i++) {
            this.result = {};
            this.result.test = "test";
        }
    }

    benchWarmGCNightmareMiddle(size) {
        this.benchColdGCNightmareMiddle(size);
    }

    benchColdGCNightmareHard(size) {
        for (let i = 0; i < size; i++) {
            this.result = new Node();
            this.result.left = new Node();
            this.result.right = new Node();
            this.result.right.left = this.result;
            this.result.left.right = this.result.left;
        }
    }

    benchWarmGCNightmareHard(size) {
        this.benchColdGCNightmareHard(size);
    }
}