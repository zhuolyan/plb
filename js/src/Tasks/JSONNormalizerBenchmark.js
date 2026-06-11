import {FullLoadNormalizer} from "../Tested/JSONKeyNormalizer/FullLoadNormalizer.js";
import {ReadFromStreamNormalizer} from "../Tested/JSONKeyNormalizer/ReadFromStreamNormalizer.js";

export class JSONNormalizerBenchmark  {
    benchColdFullLoad()
    {
        new FullLoadNormalizer().run();
    }

    async benchColdReadFromStream()
    {
        await new ReadFromStreamNormalizer().run();
    }

    benchWarmFullLoad()
    {
        new FullLoadNormalizer().run();
    }

    async benchWarmReadFromStream()
    {
        await new ReadFromStreamNormalizer().run();
    }
}