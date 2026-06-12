using System.Globalization;

using Benchmark.Benchmarks;

using BenchmarkDotNet.Configs;
using BenchmarkDotNet.Diagnosers;
using BenchmarkDotNet.Exporters.Csv;
using BenchmarkDotNet.Running;

using Perfolizer.Horology;
using Perfolizer.Metrology;

CsvExporter exporter = new(CsvSeparator.CurrentCulture,
                           new(CultureInfo.CurrentCulture, true, printUnitsInContent: false, timeUnit: TimeUnit.Microsecond, sizeUnit: SizeUnit.B));

ManualConfig config = ManualConfig.CreateMinimumViable().AddExporter(exporter).AddDiagnoser(MemoryDiagnoser.Default);

BenchmarkRunner.Run<EratosthenesEasyCold>(config);
BenchmarkRunner.Run<EratosthenesMiddleCold>(config);
BenchmarkRunner.Run<EratosthenesHardCold>(config);
BenchmarkRunner.Run<EratosthenesEasyWarm>(config);
BenchmarkRunner.Run<EratosthenesMiddleWarm>(config);
BenchmarkRunner.Run<EratosthenesHardWarm>(config);
