namespace Benchmark.Logic.Matrix;

public class FixedMatrix
{
    private readonly int    _size;
    private readonly int[,] _value;

    public FixedMatrix(int size, bool feelRandom)
    {
        this._size = size;

        this._value = new int[size, size];

        for (int i = 0; i < this._size; i++) {
            for (int j = 0; j < this._size; j++) {
                this._value[i, j] = feelRandom ? new Random().Next(0, 256) : 0;
            }
        }
    }

    public FixedMatrix Multiplication(FixedMatrix another)
    {
        FixedMatrix result = new(this._size, false);

        for (int i = 0; i < this._size; i++) {
            for (int j = 0; j < this._size; j++) {
                for (int k = 0; k < this._size; k++) {
                    result._value[i, j] = this._value[i, k] * this._value[k, j];
                }
            }
        }

        return result;
    }
}
