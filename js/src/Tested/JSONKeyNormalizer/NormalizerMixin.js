const ucFirst                = str => str.replace(/^./, char => char.toUpperCase());
const lcFirst                = str => str.replace(/^./, char => char.toLowerCase());
export const NormalizerMixin = {
    prepareParentKey(parent)
    {
        return parent.length === 0 ? "" : `${parent}-`;
    },

    normalize(input)
    {
        input = input.split(/[_-]/);
        input = input.map((item) => ucFirst(item));
        input = input.join("");
        input = lcFirst(input);

        return input;
    }
}