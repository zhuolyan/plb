export const SieveMixin = {
    sieve()
    {
        for (let i = 2; i < this.size; i++) {
            this.isPrime[i] = true;
        }

        let limit = Math.floor(Math.sqrt(this.size));
        for (let p = 2; p <= limit; p++) {
            if (this.isPrime[p]) {
                for (let i = p * p; i <= this.size; i += p) {
                    this.isPrime[i] = false;
                }
            }
        }

        let count = 0;
        for (let i = 2; i <= this.size; i++) {
            if (this.isPrime[i]) {
                count++;
            }
        }

        return count;
    }
}