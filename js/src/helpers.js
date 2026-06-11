export function dataProvider(start, end, step)
{
    let result = [];

    for (let i = start; i <= end; i += step) {
        result.push(i);
    }

    return result;
}