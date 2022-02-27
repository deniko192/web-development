<?php
header("Content-Type: text/plain");

function getPasswordStrength($pass)
{
    $len = strlen($pass);
    echo 'len => ' . $len . "\n";
    $strength = 0;
    $strength += 4 * $len; 
    $chars = str_split($pass);
    $digits = 0;
    $upperCase = 0;
    $lowerCase = 0;
    foreach ($chars as $char) {
        if (is_numeric($char))
        {
            $digits += 1;
            continue;
        }
        if (ctype_upper($char)) 
        {
            $upperCase += 1;
            continue;
        }
        $lowerCase += 1;
    }
    $strength += $digits * 4 
    $strength += $upperCase ? ($len-$upperCase) * 2 : 0; 
    $strength += $lowerCase ? ($len-$lowerCase) * 2 : 0;
    $strength -= $digits == $len ? $len : 0;
    $strength -= ($upperCase + $lowerCase) == $len ? $len : 0;
    $symbolsCount = array_count_values(str_split($pass));
    foreach ($symbols as $count) {
        if ($count > 1)
        {
            $strength -= $count;
        }
    }
    return $strength;
}   

if (isset($_GET['password']) && ($_GET['password'] !== '')) 
{   
    $pass = $_GET['password'];
    $strength = getPasswordStrength($pass);    
}
else {
    echo 'Enter password...'
}