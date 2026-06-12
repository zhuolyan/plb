import {BenchmarkRunner} from "./src/BenchmarkRunner.js";
import {EratosthenesBenchmark} from "./src/Tasks/EratosthenesBenchmark.js";
import {GCNightmareBenchmark} from "./src/Tasks/GCNightmareBenchmark.js";
import {MatrixMultiplicationBenchmark} from "./src/Tasks/MatrixMultiplicationBenchmark.js";
import {NBodiesSimulationBenchmark} from "./src/Tasks/NBodiesSimulationBenchmark.js";
import {PiMonteCarloBenchmark} from "./src/Tasks/PiMonteCarloBenchmark.js";
import {RegexpBenchmark} from "./src/Tasks/RegexpBenchmark.js";

const runner = new BenchmarkRunner('./default.template', './runner.js', './results.csv');

//EratosthenesBenchmark
// easy
runner.run("EratosthenesBenchmark", "benchColdFixedSieveEasy", 0, 10, EratosthenesBenchmark.easyDataProvider);
runner.run("EratosthenesBenchmark", "benchColdDynamicSieveEasy", 0, 10, EratosthenesBenchmark.easyDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmFixedSieveEasy", 1_000, 10, EratosthenesBenchmark.easyDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveEasy", 1_000, 10, EratosthenesBenchmark.easyDataProvider);
// middle
runner.run("EratosthenesBenchmark", "benchColdFixedSieveMiddle", 0, 10, EratosthenesBenchmark.middleDataProvider);
runner.run("EratosthenesBenchmark", "benchColdDynamicSieveMiddle", 0, 10, EratosthenesBenchmark.middleDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmFixedSieveMiddle", 1_000, 10, EratosthenesBenchmark.middleDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveMiddle", 1_000, 10, EratosthenesBenchmark.middleDataProvider);
// hard
runner.run("EratosthenesBenchmark", "benchColdFixedSieveHard", 0, 10, EratosthenesBenchmark.hardDataProvider);
runner.run("EratosthenesBenchmark", "benchColdDynamicSieveHard", 0, 10, EratosthenesBenchmark.hardDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmFixedSieveHard", 1_000, 10, EratosthenesBenchmark.hardDataProvider);
runner.run("EratosthenesBenchmark", "benchWarmDynamicSieveHard", 1_000, 10, EratosthenesBenchmark.hardDataProvider);

// GCNightmare
// easy
runner.run("GCNightmareBenchmark", "benchColdGCNightmareEasy", 0, 10, GCNightmareBenchmark.defaultDataProvider)
runner.run("GCNightmareBenchmark", "benchWarmGCNightmareEasy", 1_000, 10, GCNightmareBenchmark.defaultDataProvider);
// middle
runner.run("GCNightmareBenchmark", "benchColdGCNightmareMiddle", 0, 10, GCNightmareBenchmark.defaultDataProvider);
runner.run("GCNightmareBenchmark", "benchWarmGCNightmareMiddle", 1_000, 10, GCNightmareBenchmark.defaultDataProvider);
// hard
runner.run("GCNightmareBenchmark", "benchColdGCNightmareHard", 0, 10, GCNightmareBenchmark.defaultDataProvider);
runner.run("GCNightmareBenchmark", "benchWarmGCNightmareHard", 1_000, 10, GCNightmareBenchmark.defaultDataProvider);

//JSON normalizer
runner.run("JSONNormalizerBenchmark", "benchColdFullLoad", 0, 10, () => [1]);
runner.run("JSONNormalizerBenchmark", "benchColdReadFromStream", 0, 10, () => [1]);
runner.run("JSONNormalizerBenchmark", "benchWarmFullLoad", 1_000, 10, () => [1]);
runner.run("JSONNormalizerBenchmark", "benchWarmReadFromStream", 1_000, 10, () => [1]);

//Matrix multiplication
// easy
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchColdFixedMatrixMultiplicationEasy",
    0,
    10,
    MatrixMultiplicationBenchmark.easyDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchColdDynamicMatrixMultiplicationEasy",
    0,
    10,
    MatrixMultiplicationBenchmark.easyDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchWarmDynamicMatrixMultiplicationEasy",
    1_000,
    10,
    MatrixMultiplicationBenchmark.easyDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchWarmFixedMatrixMultiplicationEasy",
    1_000,
    10,
    MatrixMultiplicationBenchmark.easyDataProvider
);
// middle
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchColdDynamicMatrixMultiplicationMiddle",
    0,
    10,
    MatrixMultiplicationBenchmark.middleDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchColdFixedMatrixMultiplicationMiddle",
    0,
    10,
    MatrixMultiplicationBenchmark.middleDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchWarmDynamicMatrixMultiplicationMiddle",
    1_000,
    10,
    MatrixMultiplicationBenchmark.middleDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchWarmFixedMatrixMultiplicationMiddle",
    1_000,
    10,
    MatrixMultiplicationBenchmark.middleDataProvider
);
// hard
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchColdDynamicMatrixMultiplicationHard",
    0,
    10,
    MatrixMultiplicationBenchmark.hardDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchColdFixedMatrixMultiplicationHard",
    0,
    10,
    MatrixMultiplicationBenchmark.hardDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchWarmDynamicMatrixMultiplicationHard",
    1_000,
    10,
    MatrixMultiplicationBenchmark.hardDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchWarmFixedMatrixMultiplicationHard",
    1_000,
    10,
    MatrixMultiplicationBenchmark.hardDataProvider
);
// ultimate
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchColdDynamicMatrixMultiplicationUltimate",
    0,
    10,
    MatrixMultiplicationBenchmark.ultimateDataProvider
);
runner.run(
    "MatrixMultiplicationBenchmark",
    "benchColdFixedMatrixMultiplicationUltimate",
    0,
    10,
    MatrixMultiplicationBenchmark.ultimateDataProvider
);

// N-bodies simulation
// middle
runner.run(
    "NBodiesSimulationBenchmark",
    "benchColdDynamicSimulationMiddle",
    0,
    10,
    NBodiesSimulationBenchmark.middleProvider
);
runner.run(
    "NBodiesSimulationBenchmark",
    "benchColdFixedSimulationMiddle",
    0,
    10,
    NBodiesSimulationBenchmark.middleProvider
);
runner.run(
    "NBodiesSimulationBenchmark",
    "benchWarmDynamicSimulationMiddle",
    1_000,
    10,
    NBodiesSimulationBenchmark.middleProvider
);
runner.run(
    "NBodiesSimulationBenchmark",
    "benchWarmFixedSimulationMiddle",
    1_000,
    10,
    NBodiesSimulationBenchmark.middleProvider
);
// hard
runner.run(
    "NBodiesSimulationBenchmark",
    "benchColdDynamicSimulationHard",
    0,
    10,
    NBodiesSimulationBenchmark.hardProvider
);
runner.run(
    "NBodiesSimulationBenchmark",
    "benchColdFixedSimulationHard",
    0,
    10,
    NBodiesSimulationBenchmark.hardProvider
);
runner.run(
    "NBodiesSimulationBenchmark",
    "benchWarmDynamicSimulationHard",
    1_000,
    10,
    NBodiesSimulationBenchmark.hardProvider
);
runner.run(
    "NBodiesSimulationBenchmark",
    "benchWarmFixedSimulationHard",
    1_000,
    10,
    NBodiesSimulationBenchmark.hardProvider
);

// Calculate Pi Monte-Carlo method
//easy
runner.run("PiMonteCarloBenchmark", "benchColdPiMonteCarloEasy", 0, 10, PiMonteCarloBenchmark.easyDataProvider);
runner.run("PiMonteCarloBenchmark", "benchWarmPiMonteCarloEasy", 1_000, 10, PiMonteCarloBenchmark.easyDataProvider);
//middle
runner.run("PiMonteCarloBenchmark", "benchColdPiMonteCarloMiddle", 0, 10, PiMonteCarloBenchmark.midletDataProvider);
runner.run("PiMonteCarloBenchmark", "benchWarmPiMonteCarloMiddle", 1_000, 10, PiMonteCarloBenchmark.midletDataProvider);

// Regexp
runner.run("RegexpBenchmark", "benchCold", 0, 10, RegexpBenchmark.defaultDataProvider);
runner.run("RegexpBenchmark", "benchWarm", 1_000, 10, RegexpBenchmark.defaultDataProvider);