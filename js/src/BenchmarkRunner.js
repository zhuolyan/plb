import fs from "fs";
import {execSync as exec} from 'child_process';

export class BenchmarkRunner
{
    _template;
    _runner;
    _result;

    constructor(templateFile, runnerFile, resultFile)
    {
        this._template = templateFile;
        this._runner   = runnerFile;
        this._result   = resultFile;

        let headers = [
                          'benchmark',
                          'subject',
                          'set',
                          'mem_peak',
                          'mem_real',
                          'mode',
                          'rstdev'
                      ].join(",") + "\n";
        fs.writeFileSync(this._result, headers, {encoding: 'utf8'});
    }

    run(className, method, warmUp, iteration, dataProvider)
    {
        if (typeof dataProvider == "function") {
            let i = 0;
            for (let size in dataProvider()) {
                this.#runSet(className, method, warmUp, iteration, i++, size);
            }
        }
    }

    #runSet(className, method, warmUp, iteration, set, size)
    {
        this.#createRunnerFromTemplate(className, method, warmUp, size);

        let result = this.#runBenchmark(className, method, iteration, set);

        let str = [
                      result.benchmark,
                      result.subject,
                      set,
                      result.mem_peak,
                      result.mem_real,
                      result.mode,
                      result.rstdev
                  ].join(",") + "\n";

        fs.appendFileSync(this._result, str, {encoding: 'utf8'});

        this.#deleteRunnerFile()
    }

    #runBenchmark(className, method, iterations, set)
    {
        const results = {
            benchmark: className,
            subject:   method,
            set:       set,
            revs:      iterations,
            mem_peak:  0,
            mem_real:  0,
            mode:      0,
            rstdev:    0,
        }

        const times = [];

        for (let i = 0; i < iterations; i++) {
            const output = exec(`node ${this._runner}`, {encoding: 'utf-8'});
            const data   = JSON.parse(output);
            results.mem_peak += data.mem.peak;
            results.mem_real += data.mem.real;
            results.mode += data.time;

            times.push(data.time);

            console.log(className, method, set, i, iterations);
        }

        return this.#calculateResult(results, times, iterations);
    }

    #calculateResult(results, times, iterations)
    {
        results.mode     = results.mode / iterations;
        results.mem_peak = Math.round(results.mem_peak / iterations);
        results.mem_real = Math.round(results.mem_real / iterations);

        let sumDelta = 0;

        for (let i = 0; i < times.length; i++) {
            sumDelta += Math.abs(times[i] - results.mode);
        }

        results.rstdev = sumDelta / iterations / results.mode * 100;

        return results;
    }

    #createRunnerFromTemplate(className, method, warmUp, size)
    {
        let content = fs.readFileSync(this._template, 'utf8');

        content = content.replaceAll('{{class}}', className);
        content = content.replaceAll('{{file}}', `./src/Tasks/${className}.js`);
        content = content.replaceAll('{{method}}', method);
        content = content.replaceAll('{{warmUp}}', warmUp);
        content = content.replaceAll('{{size}}', size);

        fs.writeFileSync(this._runner, content);
    }

    #deleteRunnerFile()
    {
        fs.unlinkSync(this._runner);
    }
}
