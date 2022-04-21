function calc(param) {
    const result = _calculate(
        param.replace(/\(|\)/g, ' ')
            .split(' ')
            .filter(token => token !== '')
    );
    
    function _calculate(data) {
        const sliceIndex = _getSliceIndex(data);
        const [operator, a, b] = data.splice(sliceIndex, 3);
        const result = _getResult(operator, Number(a), Number(b));
        if (sliceIndex !== 0) {
            data.splice(sliceIndex, 0, String(result));
            return _calculate(data);
        }
        return result;
    }

    function _getSliceIndex(data) {
        const operators = ['+', '-', '*', '/'];
        let sliceIndex = 0;
        for (const operator of operators) {
            const index = data.lastIndexOf(operator);
            sliceIndex = index > sliceIndex ? index : sliceIndex;
        }
        return sliceIndex
    }

    function _getResult(operator, a, b) {
        switch (operator) {
            case '+':
                return a + b;
            case '-':
                return a - b;
            case '*':
                return a * b;
            case '/':
                return a / b;
        }
    }

    return result;
}
