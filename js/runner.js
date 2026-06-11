import {Test} from './src/Tasks/Test.js';

const warmUp = 1000000000;

const bench = new Test();

if (warmUp > 0) {
    for (let i = 1; i <= warmUp; i++) {
        bench.run(2);
    }
}

let startTime = process.hrtime.bigint();
bench.run(0);
let time = Number(process.hrtime.bigint() - startTime);
time = time / 1_000;

console.log(JSON.stringify({
                'mem':{
                    'peak': process.memoryUsage().heapUsed,
                    'real': process.memoryUsage().rss,
                },
                'time': time,
            }));