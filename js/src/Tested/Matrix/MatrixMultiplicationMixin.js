export const MatrixMultiplicationMixin = {
    getRandomInt(min, max)
    {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    },
    multiplication(another)
    {
        const result = new this.constructor(this.size, false);

        for (let i = 0; i < this.size; i++) {
            for (let j = 0; j < this.size; j++) {
                for (let k = 0; k < this.size; k++) {
                    result.value[i][j] = this.value[i][k] * another.value[k][j];
                }
            }
        }

        return result;
    }
}