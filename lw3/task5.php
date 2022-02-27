<?php
header('Content-Type: text/plain');

$dir = 'task4/data/';
function getGetParameter(string $name): ?string
{
    return $_GET[$name] ?? null;
}

$email = getGetParameter('email');
if ($email) 
{
    $fName = $dir . $email . '.txt';
    if (file_exists($fName)) 
    {
        $file = file($dir . $email . '.txt');
        foreach ($file as $line) {
            echo $line;
        }   
    }
    else {
        echo 'File not found';
    }
}
else 
{
    echo 'Empty email value';
}


