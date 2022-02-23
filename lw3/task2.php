<?php
header("Content-Type: text/plain");

function getMessage($value): string
{
    if (is_numeric($value[0]))
    {
        return 'identifier can\'t start with a digit!';
    }
    $values = str_split(substr($value, 0, -1));
    foreach ($values as $char) {
        if (!ctype_alpha($char) || !is_numeric($char)) 
        {
            return 'No, Incorrect identifier';
        }
    }
    return 'Yes';
}

if (isset($_GET['identifier']) && ($_GET['text'] !== '')) 
{   
    $id = $_GET['identifier'];
    $output = getMessage($id);
    echo ' -> ' . $output 
}