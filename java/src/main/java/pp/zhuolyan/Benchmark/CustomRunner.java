package pp.zhuolyan.Benchmark;

import org.openjdk.jmh.annotations.Mode;
import org.openjdk.jmh.profile.GCProfiler;
import org.openjdk.jmh.results.format.ResultFormatType;
import org.openjdk.jmh.runner.Runner;
import org.openjdk.jmh.runner.RunnerException;
import org.openjdk.jmh.runner.options.ChainedOptionsBuilder;
import org.openjdk.jmh.runner.options.OptionsBuilder;

import java.lang.reflect.Type;
import java.util.concurrent.TimeUnit;

public class CustomRunner
{
    public static void runCold(Type testType, int start, int end, int step, String testName) throws RunnerException
    {
        ChainedOptionsBuilder builder = CustomRunner.getBaseBuilder(testType, testName + "-cold", start, end, step)
                                                    .warmupIterations(0)
                                                    .warmupForks(0);

        new Runner(builder.build()).run();
    }

    private static ChainedOptionsBuilder getBaseBuilder(Type testType, String testName, int start, int end, int step)
    {
        ChainedOptionsBuilder builder = new OptionsBuilder().addProfiler(GCProfiler.class)
                                                            .include(testType.getTypeName())
                                                            .timeUnit(TimeUnit.MICROSECONDS)
                                                            .measurementIterations(1)
                                                            .mode(Mode.SingleShotTime)
                                                            .forks(1)
                                                            .resultFormat(ResultFormatType.CSV)
                                                            .result("results/" + testName + ".csv");

        for (int i = start; i <= end; i += step) {
            builder.param("size", String.valueOf(i));
        }

        return builder;
    }

    public static void runWarm(Type testType, int start, int end, int step, String testName) throws RunnerException
    {
        ChainedOptionsBuilder builder = CustomRunner.getBaseBuilder(testType, testName + "-warm", start, end, step)
                                                    .warmupIterations(1)
                                                    .warmupForks(1);

        new Runner(builder.build()).run();
    }
}
