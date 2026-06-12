namespace Benchmark.Logic.PiMonteCarlo;

public static class PiMonteCarlo
{
    public static double Calculate(int size)
    {
        float inside = 0;

        for (int i = 0; i < size; i++) {
            double x = Random.Shared.NextDouble();
            double y = Random.Shared.NextDouble();

            if (x * x + y * y <= 1.0) {
                inside++;
            }
        }

        return 4 * (inside / size);
    }
}
