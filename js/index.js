import {BenchmarkRunner} from "./src/BenchmarkRunner.js";

const runner = new BenchmarkRunner('./default.template', './runner.js', './results.csv');
const start = process.hrtime.bigint();
runner.run("Test", "run", 1_000, 3, () => {
    let data = [];
    for (let i = 0; i < 10; i++) {
        data.push(i);
    }

    return data;
});

console.log(process.hrtime.bigint() - start);