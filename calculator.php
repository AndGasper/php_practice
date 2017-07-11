<?php 



$testInput = "2*2"; 




function doMath($input) {
    $index = 0;
    $inputLength = strlen($input); 
    while ($index < $inputLength) {
        echo $input[$index]."<br/>";
        $index++; 
    }
}

doMath("2+2"); 

?> 

<!DOCTYPE html> 
<html>
<head>
<body>
    <div>
        <p>Cut my life into pizza</p>
        <p>This is my plastic fork</p>
        <p>Oven baking, heavy breathing</p>
    </div>
</body>
</head>
</html>