import {BenchmarkRunner} from "./src/BenchmarkRunner.js";

const runner = new BenchmarkRunner('./default.template', './runner.js', './results.csv');

//EratosthenesBenchmark
// runner.run("EratosthenesBenchmark", "benchColdFixedSieveEasy", 0, 10, EratosthenesBenchmark.easyDataProvider);
// runner.run("EratosthenesBenchmark", "benchColdDynamicSieveEasy", 0, 10, EratosthenesBenchmark.easyDataProvider);
// runner.run("EratosthenesBenchmark", "benchWarmFixedSieveEasy", 1_000, 10, EratosthenesBenchmark.easyDataProvider);
// runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveEasy", 1_000, 10, EratosthenesBenchmark.easyDataProvider);
//
// runner.run("EratosthenesBenchmark", "benchColdFixedSieveMiddle", 0, 10, EratosthenesBenchmark.middleDataProvider);
// runner.run("EratosthenesBenchmark", "benchColdDynamicSieveMiddle", 0, 10, EratosthenesBenchmark.middleDataProvider);
// runner.run("EratosthenesBenchmark", "benchWarmFixedSieveMiddle", 1_000, 10,
// EratosthenesBenchmark.middleDataProvider); runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveMiddle", 1_000,
// 10, EratosthenesBenchmark.middleDataProvider);  runner.run("EratosthenesBenchmark", "benchColdFixedSieveHard", 0,
// 10, EratosthenesBenchmark.hardDataProvider); runner.run("EratosthenesBenchmark", "benchColdDynamicSieveHard", 0, 10,
// EratosthenesBenchmark.hardDataProvider); runner.run("EratosthenesBenchmark", "benchWarmFixedSieveHard", 1_000, 10,
// EratosthenesBenchmark.hardDataProvider); runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveHard", 1_000, 10,
// EratosthenesBenchmark.hardDataProvider);  // //GCNightmare runner.run("GCNightmareBenchmark",
// "benchColdGCNightmareEasy", 0, 10, GCNightmareBenchmark.defaultDataProvider); runner.run("GCNightmareBenchmark",
// "benchWarmGCNightmareEasy", 1_000, 10, GCNightmareBenchmark.defaultDataProvider); runner.run("GCNightmareBenchmark",
// "benchColdGCNightmareMiddle", 0, 10, GCNightmareBenchmark.defaultDataProvider); runner.run("GCNightmareBenchmark",
// "benchWarmGCNightmareMiddle", 1_000, 10, GCNightmareBenchmark.defaultDataProvider); runner.run("GCNightmareBenchmark", "benchColdGCNightmareHard", 0, 10, GCNightmareBenchmark.defaultDataProvider); runner.run("GCNightmareBenchmark", "benchWarmGCNightmareHard", 1_000, 10, GCNightmareBenchmark.defaultDataProvider);

//JSON normalizer
runner.run("JSONNormalizerBenchmark", "benchColdFullLoad", 0, 10, () => [1]);
// runner.run("JSONNormalizerBenchmark", "benchColdReadFromStream", 0, 10, () => [1]);
// runner.run("JSONNormalizerBenchmark", "benchWarmFullLoad", 1_000, 10, () => [1]);
// runner.run("JSONNormalizerBenchmark", "benchWarmReadFromStream", 1_000, 10, () => [1]);