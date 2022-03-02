<?php
header("Content-Type: text/plain");
$dir = 'data/';

function getGetParameter(string $name): ?string
{
    return isset($_GET[$name]) ? $_GET[$name] : null; 
}

function arrToStr(array $arr):string
{
    $str = '';
    foreach ($arr as $key => $value) 
    {
        $str = $str . $key . ': ' . $value . PHP_EOL; 
    }
    return $str;
}

$params = array(
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'email' => 'Email',
    'age' => 'Age',
);

$email = getGetParameter('email');
if ($email)
{
    $data = array();
    foreach ($params as $paramId => $value) 
    {
        $data[$value] = getGetParameter($paramId) ?? '';
    }
    echo 'QueryData: ' . PHP_EOL;
    print_r($data);

    $fName = $dir . $email . '.txt';
    $fileStatus = false;
    if (file_exists($fName))
    {
        $lines = file($fName);
        echo 'FileData: ' . PHP_EOL;
        print_r($lines);
        $user = array();
        foreach ($lines as $line)
        {
            $value = explode(": ", $line, 2);
            if ($data[$value[0]])
            {
                $user[$value[0]] = trim($data[$value[0]]);
            }
            else
            {
                $user[$value[0]] = trim($value[1]);
            }
        }
        echo 'FinalData: ' . PHP_EOL;
        print_r($user);
        $fileStatus = file_put_contents($fName, arrToStr($user));
    }
    else 
    {
        $lines = arrToStr($data);
        $fileStatus = file_put_contents($fName, $lines);
    }
    echo $fileStatus === false ? 'Save error' : 'File saved';
}