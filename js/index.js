import {Bench} from 'tinybench'
import fs from 'fs';

const bench = new Bench({name: 'simple benchmark', warmup: true, iterations: 10});

bench.on('cycle', function (event) {
    
})