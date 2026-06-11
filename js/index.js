import {BenchmarkRunner} from "./src/BenchmarkRunner.js";
import {EratosthenesBenchmark} from "./src/Tasks/EratosthenesBenchmark.js";

const runner = new BenchmarkRunner('./default.template', './runner.js', './results.csv');
const start  = process.hrtime.bigint();

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

console.log(process.hrtime.bigint() - start);