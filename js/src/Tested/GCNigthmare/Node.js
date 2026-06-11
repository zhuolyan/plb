export class Node {
    left;
    right;
    self;

    constructor() {
        this.left = null;
        this.right = null;
        this.self = this;
    }
}