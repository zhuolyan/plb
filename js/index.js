import {BenchmarkRunner} from "./src/BenchmarkRunner.js";
import {EratosthenesBenchmark} from "./src/Tasks/EratosthenesBenchmark.js";
import {GCNightmare} from "./src/Tasks/GCNightmare.js";

const runner = new BenchmarkRunner('./default.template', './runner.js', './results.csv');
const start  = process.hrtime.bigint();

//EratosthenesBenchmark
runner.run("EratosthenesBenchmark", "benchColdFixedSieveEasy", 0, 10, EratosthenesBenchmark.easyDataProvider);
runner.run("EratosthenesBenchmark", "benchColdDynamicSieveEasy", 0, 10, EratosthenesBenchmark.easyDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmFixedSieveEasy", 1_000, 10, EratosthenesBenchmark.easyDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveEasy", 1_000, 10, EratosthenesBenchmark.easyDataProvider);

runner.run("EratosthenesBenchmark", "benchColdFixedSieveMiddle", 0, 10, EratosthenesBenchmark.middleDataProvider);
runner.run("EratosthenesBenchmark", "benchColdDynamicSieveMiddle", 0, 10, EratosthenesBenchmark.middleDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmFixedSieveMiddle", 1_000, 10, EratosthenesBenchmark.middleDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveMiddle", 1_000, 10, EratosthenesBenchmark.middleDataProvider);

runner.run("EratosthenesBenchmark", "benchColdFixedSieveHard", 0, 10, EratosthenesBenchmark.hardDataProvider);
runner.run("EratosthenesBenchmark", "benchColdDynamicSieveHard", 0, 10, EratosthenesBenchmark.hardDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmFixedSieveHard", 1_000, 10, EratosthenesBenchmark.hardDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveHard", 1_000, 10, EratosthenesBenchmark.hardDataProvider);

//GCNightmare
runner.run("GCNightmare", "benchColdGCNightmareEasy", 0, 10, GCNightmare.defaultDataProvider);
runner.run("GCNightmare", "benchWarmGCNightmareEasy", 1_000, 10, GCNightmare.defaultDataProvider);
runner.run("GCNightmare", "benchColdGCNightmareMiddle", 0, 10, GCNightmare.defaultDataProvider);
runner.run("GCNightmare", "benchWarmGCNightmareMiddle", 1_000, 10, GCNightmare.defaultDataProvider);
runner.run("GCNightmare", "benchColdGCNightmareHard", 0, 10, GCNightmare.defaultDataProvider);
runner.run("GCNightmare", "benchWarmGCNightmareHard", 1_000, 10, GCNightmare.defaultDataProvider);

console.log(process.hrtime.bigint() - start);