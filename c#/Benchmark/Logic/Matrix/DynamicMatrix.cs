namespace Benchmark.Logic.Matrix;

public class DynamicMatrix
{
    private readonly int             _size;
    private readonly List<List<int>> _value = [];

    public DynamicMatrix(int size, bool feelRandom)
    {
        this._size = size;

        for (int i = 0; i < this._size; i++) {
            this._value.Add([]);

            for (int j = 0; j < this._size; j++) {
                this._value[i].Add(feelRandom ? new Random().Next(0, 256) : 0);
            }
        }
    }

    public DynamicMatrix Multiplication(DynamicMatrix another)
    {
        DynamicMatrix result = new(this._size, false);

        for (int i = 0; i < this._size; i++) {
            for (int j = 0; j < this._size; j++) {
                for (int k = 0; k < this._size; k++) {
                    result._value[i][j] = this._value[i][k] * this._value[k][j];
                }
            }
        }

        return result;
    }
}
