import {SieveMixin} from "./SieveMixin.js";

export class FixedSieve
{

    size    = 0;
    isPrime = [];

    constructor(size)
    {
        this.size    = size;
        this.isPrime = new Array(size);

        Object.assign(FixedSieve.prototype, SieveMixin);
    }
}