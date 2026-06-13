package pp.zhuolyan.Benchmark;

import org.openjdk.jmh.profile.GCProfiler;
import org.openjdk.jmh.results.format.ResultFormatType;
import org.openjdk.jmh.runner.Runner;
import org.openjdk.jmh.runner.options.Options;
import org.openjdk.jmh.runner.options.OptionsBuilder;
import org.openjdk.jmh.runner.options.VerboseMode;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main
{
    public static void main(String[] args) throws Exception {
        Options opt = new OptionsBuilder()
                .addProfiler(GCProfiler.class) // Автоматично додає GC метрики
                .verbosity(VerboseMode.NORMAL)
                .resultFormat(ResultFormatType.CSV)
                .result("results.csv")
                .build();

        new Runner(opt).run();
    }
}
