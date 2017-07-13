<?php 



$testInput = "2*2"; 




function doMath($input) {
    $index = 0;
    $operatorsArray = array(
        "+" => "addition",
        "-" => "subtraction"
    );
    $inputLength = strlen($input); 
    while ($index < $inputLength) {
        //echo $input[$index]."<br/>";
        switch(ord($input[$index])) {
            // Addition (+) = 43 in ASCII
            case(43):
                $a = substr($input, 0,$index); // Grab the numbers from the start up to where the operator is
                $b = substr($input,$index+1);
                
                return $a+$b;
                break;

            // Subtraction
            case(45): 
                $a = substr($input, 0,$index); // Grab the numbers from the start up to where the operator is
                $b = substr($input,$index+1);
                return $a-$b;
                break;

            // Division
            case(47):
                $a = substr($input, 0,$index); // Grab the numbers from the start up to where the operator is
                $b = substr($input,$index+1);
                return $a/$b;
                break;

            // Multiplication
            case(42):
                $a = substr($input, 0,$index); // Grab the numbers from the start up to where the operator is
                $b = substr($input,$index+1);
                return $a*$b;




                
        default:
        echo '';
        }
        $index++; 
    }
}

print("2+2=".doMath("2+2")."<br>");
print("2-4=".doMath("2-4")."<br>");
print("22+4=".doMath("22+4")."<br>");
print("22-4=".doMath("22-4")."<br>");
print("2*4=".doMath("2*4")."<br");
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

    <form>
        <button>Cut my life into pizza</button>
        <button>This is my plastic fork</button>
        <button>/</button>
    </form>
</body>
</head>
</html>