import {NormalizerMixin} from "./NormalizerMixin.js";
import fs from "fs";
import {chain} from 'stream-chain';
import {streamObject} from './../../../node_modules/stream-json/src/streamers/stream-object.js';

export class ReadFromStreamNormalizer
{
    result = null;
    input  = null;

    constructor()
    {
        Object.assign(ReadFromStreamNormalizer.prototype, NormalizerMixin);
    }

    async run()
    {
        this.input = chain([fs.createReadStream('../domains.json'), streamObject.withParserAsStream()]);
        for await (const {key, value} of data) {
            let current = parentKey + key;
            if (value instanceof Object) {
                console.log(value); break;
                this.recursiveNormalize(value, current);
            } else {
                this.result[this.normalize(current)] = value;
            }
        }

        await this.recursiveNormalize(this.input,"")

        fs.writeFileSync('./json-normalized.json', JSON.stringify(this.result), {encoding: 'utf8'});
    }

    recursiveNormalize(data, parentKey = "")
    {
        parentKey = this.prepareParentKey(parentKey);

        for (const {key, value} of data) {
            let current = parentKey + key;
            if (value instanceof Object) {
                this.recursiveNormalize(value, current);
            } else {
                this.result[this.normalize(current)] = value;
            }
        }
    }
}