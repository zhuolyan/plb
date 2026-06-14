namespace Benchmark;

public static class DataProvider
{
    public static IEnumerable<int> EratosthenesEasy   => DataProvider.Generate(10, 60_000, 10);
    public static IEnumerable<int> EratosthenesMiddle => DataProvider.Generate(60_010, 8_200_000, 20_000);
    public static IEnumerable<int> EratosthenesHard   => DataProvider.Generate(8_200_000, 1_000_000_000, 2_000_000);
    public static IEnumerable<int> GCNightmare        => DataProvider.Generate(10_000, 10_000_000, 10_000);
    public static IEnumerable<int> MatrixEasy         => DataProvider.Generate(2, 80);
    public static IEnumerable<int> MatrixMiddle       => DataProvider.Generate(80, 160, 2);
    public static IEnumerable<int> MatrixHard         => DataProvider.Generate(160, 530, 10);
    public static IEnumerable<int> MatrixUltimate     => DataProvider.Generate(1_000, 5_000, 1_000);
    public static IEnumerable<int> NBodiesMiddle      => DataProvider.Generate(240, 144_000, 240);
    public static IEnumerable<int> NBodiesHard        => DataProvider.Generate(144_000, 1_584_000, 144_000);
    public static IEnumerable<int> PiMonteCarloEasy   => DataProvider.Generate(1_000, 1_000_000, 1_000);
    public static IEnumerable<int> PiMonteCarloHard   => DataProvider.Generate(1_000_000, 1_000_000_000, 1_000_000);
    public static IEnumerable<int> Regexp             => DataProvider.Generate(255, 1000);

    public static IEnumerable<int> Generate(int start, int end, int step = 1)
    {
        List<int> result = [];

        for (int i = start; i <= end; i += step) {
            result.Add(i);
        }

        return result;
    }
}
