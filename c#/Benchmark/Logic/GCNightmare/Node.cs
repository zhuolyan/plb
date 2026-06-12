namespace Benchmark.Logic.GCNightmare;

public class Node
{
    public Node()
    {
        this.Self = this;
    }

    public Node? Left  { get; set; }
    public Node? Right { get; set; }
    public Node? Self  { get; private set; }
}
