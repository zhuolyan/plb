import {FullLoadNormalizer} from "../Tested/JSONKeyNormalizer/FullLoadNormalizer.js";
import {ReadFromStreamNormalizer} from "../Tested/JSONKeyNormalizer/ReadFromStreamNormalizer.js";

export class JSONNormalizerBenchmark
{
    benchColdFullLoad()
    {
       return  new FullLoadNormalizer().run();
    }

    async benchColdReadFromStream()
    {
        return await new ReadFromStreamNormalizer().run();
    }

    benchWarmFullLoad()
    {
        return new FullLoadNormalizer().run();
    }

    async benchWarmReadFromStream()
    {
       return await new ReadFromStreamNormalizer().run();
    }
}