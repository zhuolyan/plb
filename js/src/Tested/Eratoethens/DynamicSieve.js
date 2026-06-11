import {SieveMixin} from "./SieveMixin.js";

export class DynamicSieve
{

    size    = 0;
    isPrime = [];

    constructor(size)
    {
        this.size = size;

        Object.assign(DynamicSieve.prototype, SieveMixin);
    }
}