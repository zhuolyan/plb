import {NormalizerMixin} from "./NormalizerMixin.js";
import fs from "fs";

export class FullLoadNormalizer
{
    result = {};
    input  = null;

    constructor()
    {
        Object.assign(FullLoadNormalizer.prototype, NormalizerMixin);
    }

    run()
    {
        this.input = JSON.parse(fs.readFileSync('../domains.json', 'utf8'));

        this.recursiveNormalize(this.input);

        fs.writeFileSync('./json-normalized.json', JSON.stringify(this.result, null, 2), {encoding: 'utf8'});
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
                this.result[this.normalize(current)] = value;
            }
        }
    }
}