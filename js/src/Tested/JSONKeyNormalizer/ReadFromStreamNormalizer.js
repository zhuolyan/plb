import {NormalizerMixin} from "./NormalizerMixin.js";
import fs from "fs";
import {chain} from 'stream-chain';
import {streamObject} from './../../../node_modules/stream-json/src/streamers/stream-object.js';

export class ReadFromStreamNormalizer
{
    _endLine = ",\n";
    result   = [];
    input    = null;
    fd       = null;

    constructor(resultFile)
    {
        Object.assign(ReadFromStreamNormalizer.prototype, NormalizerMixin);
    }

    async run()
    {
        this.fd = fs.openSync("./json-normalized.json", "w");
        fs.writeSync(this.fd, Buffer.from("{\n"));

        this.input = chain([
                               fs.createReadStream('../domains.json'),
                               streamObject.withParserAsStream()
                           ]);

        await this.recursiveNormalizeTopLvl();

        fs.writeSync(this.fd, Buffer.from("}\n"), 0, 0, fs.fstatSync(this.fd).size - this._endLine.length);
    }

    async recursiveNormalizeTopLvl()
    {
        for await (const {key, value} of this.input) {
            if (value instanceof Object) {
                this.recursiveNormalize(value, key);
            } else {
                this.writeLine(this.normalize(key), value);
            }
        }
    }

    recursiveNormalize(data, parentKey = "")
    {
        parentKey = this.prepareParentKey(parentKey);

        for (const key in data) {
            const value   = data[key];
            const current = parentKey + key;
            if (value instanceof Object) {
                this.recursiveNormalize(value, current);
            } else {
                this.writeLine(this.normalize(current), value);
            }
        }
    }

    writeLine(key, value)
    {
        if (this.result.includes(key)) {
            return;
        }

        this.result.push(key);

        key   = JSON.stringify(key);
        value = JSON.stringify(value);

        fs.writeSync(this.fd, Buffer.from(`${key}:${value}${this._endLine}`));
    }

}