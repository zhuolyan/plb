package pp.zhuolyan.Benchmark;

import pp.zhuolyan.Benchmark.Banchmarks.Eratosthenes;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main
{
    public static void main(String[] args) throws Exception
    {
        // Eratosthenes
        // easy
        CustomRunner.runCold(Eratosthenes.class, 10, 60_000, 10, "Eratosthenes-easy");
        CustomRunner.runWarm(Eratosthenes.class, 10, 60_000, 10, "Eratosthenes-easy");
        // middle
        CustomRunner.runCold(Eratosthenes.class, 60_010, 8_200_000, 20_000, "Eratosthenes-easy");
        CustomRunner.runWarm(Eratosthenes.class, 60_010, 8_200_000, 20_000, "Eratosthenes-easy");
        //hard
        CustomRunner.runCold(Eratosthenes.class, 8_200_000, 1_000_000_000, 2_000_000, "Eratosthenes-easy");
        CustomRunner.runWarm(Eratosthenes.class, 8_200_000, 1_000_000_000, 2_000_000, "Eratosthenes-easy");
    }
}
