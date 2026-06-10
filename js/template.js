const path = require('path');
const { performance } = require('perf_hooks');
const v8 = require('v8');
const config = JSON.parse(process.env.BENCH_CONFIG);

if (config.bootstrap) {
    require(path.resolve(config.bootstrap));
}