namespace Benchmark;

public static class DataProvider
{
    public static IEnumerable<int> EratosthenesEasy   => DataProvider.Generate(10, 60_000, 10);
    public static IEnumerable<int> EratosthenesMiddle => DataProvider.Generate(60_010, 8_200_000, 20_000);
    public static IEnumerable<int> EratosthenesHard   => DataProvider.Generate(8_200_000, 1_000_000_000, 2_000_000);

    public static IEnumerable<int> Generate(int start, int end, int step = 1)
    {
        List<int> result = [];

        for (int i = start; i <= end; i += step) {
            result.Add(i);
        }

        return result;
    }
}
