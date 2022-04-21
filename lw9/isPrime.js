/**
 * @param {(Array<number>|number)} number 
 */
function isPrimeNumber(param) {
    if (typeof param === 'number') {
        _logIsPrime(param)            
    }
    else if (Array.isArray(param)) {
        param.forEach((number, index) => {
            if (typeof number === 'number') {
                _logIsPrime(number)
            }
            else {
                console.error(
                    'unexpected type of array elem: \n', 
                    'param[' + index + '] =>', 
                    typeof number,
                )        
            }
        })
    }
    else {
        console.error('unexpected type: ', typeof param)
    }
    
    function _logIsPrime(number) {
        let isPrime = true
        for (let i = 2; i < number; i++) {
            if (number % i == 0) {
                isPrime = false
                break
            }
        }
        console.log('Результат: ' + number + ' is '+ (isPrime ? '' : 'not') + ' prime number')
    }
}
