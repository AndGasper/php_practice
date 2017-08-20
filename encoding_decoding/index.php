<?php

// The problem: Given a string of text, "compress it"

$testString1 = "aabbbcc";
$alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
// echo 'count($alphabet): '.count($alphabet); // Output: 26; Just checking I got them all

// Not terrible useful but not entirely useless. 
// function createAlphabetAssociativeArray($alphabet) {
//     $arrayToHoldDictionary = array(); // Create empty array 
//     $i = 0; // index for while loop. Start at 0, i.e. "0" => "a"
//     while ($i < 26) {
//         $arrayToHoldDictionary[$i] = $alphabet[$i]; // Populate the array 
//         $i++; // increment i to avoid infinite loop
//     }
//     return $arrayToHoldDictionary; // return filled array from function
// }
// $alphabetDictionary = createAlphabetAssociativeArray($alphabet); 
// print_r($alphabetDictionary); 
// echo $alphabetDictionary[0];

function createAlphabetFrequencyLogAssociativeArray($alphabet) {
    $frequencyLog = array(); // Initialize frequency log array
    // Example entry: $frequencyLog[0] = "a" => 0; 
    $i = 0;
    // count($alphabet) = 26, but I might change up what constitutes a letter/eligible letters later
    while ($i < count($alphabet)) {
        $frequencyLog[$alphabet[$i]] = 0; // Set the key equal to the letter and the value equal to 0 frequency (0 initially)
        $i++;
    }
    return $frequencyLog; 
}


$letterFrequencyLog = createAlphabetFrequencyLogAssociativeArray($alphabet); 


function generateRandomTextStrings($desiredStringLength, $alphabet) {
    $randomStringOfLetters = ""; // Initialize the random string of letters set to the empty string;
    $i = 0; // index for while loop;
    while ($i < $desiredStringLength) {
        // assign a random letter to the randomString at position i
        // Random number generated using the "Mersenne Twister" 
        $randomStringOfLetters[$i] = $alphabet[mt_rand(0,25)]; // int mt_rand(int min, int max) inclusive
        $i++;
    }
    return $randomStringOfLetters;
}


// Because I am too lazy to keep typing the same thing over and over again...
// I'll cheat a little and just auto fill an array of the suckers
$arrayOfRandomStrings = array(); 
for ($z = 0; $z < 5; $z++) {
    // Array at - 0: 10 letters, 1: 20 letters, 2: 30 letters, 3: 40 letters, 4: 50 letters 
    $arrayOfRandomStrings[$z] = generateRandomTextStrings(($z*10 + 10), $alphabet); 
    // $arrayOfRandomStrings[] = generateRandomTextStrings(($z*10), $alphabet);
    // also have to change for loop to: for ($z = 1; $z < 6; $z++) {...} to work

}

class PolynomialEquation {
    /**
    * General polynomial equation - Assume a_n is an integer value, i.e. n exists in Z
    *
    * f(x) = sum(min: i = 0, max: i = n) { a_(n-i) * x^(n-i) }
    *
    * Example: Linear, n = 1;
    * f(x) = sum(min: i = 0, max: i = 1) { (a_(1-0) * x^(1-0) ) + ( a_(1-1) * x^(1-1) ) }
    * f(x) = a_1*x^1 + a_0*x^0; 
    * f(x) = a_1*x + a_0; 

    * Example: Quadratic, n = 2; 
    * f(x) = sum(min: i = 0, max: i = 2) { ( a_(2-0) * x^(2-0) ) + ( a_(2-1) * x^(2-1) ) + (a_(2-2) * x^(2-2) ) }
    * f(x) = a_2*x^2 + a_1*x^1 + a_0*x^0; x^0 = 1;
    * f(x) = a_2*x^2 + a_1*x + a_0;
    */
    
    protected $degree = 0; // Set n = 0 by default
    // because I couldn't figure out how to get new stdClass() to work
    protected $coefficientValues = array(); // Example: [a_2] => 7
    protected $variableValues = array(); 
    protected $equationString = "f(x) = "; // start equation as empty string 
    
    public function setDegree($degreeValue) {
        $this->degree = $degreeValue; // set degree equal to the passed value
        return;
    }
    public function getDegree() {
        return $this->degree;
    }

    // Two birds one stone. Might as well do the x^n terms while we're doing the a_n terms
    // Though the name could use some work...little long
    public function setArrayValuessForCoeffiecientsAndVariables() {
        $polynomialDegree = $this->degree; // Access the degree property and assign it to a local variable; n part of equation    
        while ($polynomialDegree > -1) {
            $this->coefficientValues["a_$polynomialDegree"] = mt_rand(0,10); // For now, I set the coefficient terms to some value between 0 and 10
            $this->variableValues[$polynomialDegree] = "x^$polynomialDegree";
            $polynomialDegree--;
        }
        // Lazy way of setting x^0 = 1 without adding a ternary to the expression 
        $this->variableValues["0"] = 1;  // "0", just to be  clear: I am referring to the key "0" not the index 0;
        return;
    }

    public function getCoefficientValues() {
        return $this->coefficientValues; 
    }
    
    // I don't like the phrase "variable values," but I can't think of a better way to refer to the
    // exponential terms, at the moment
    public function getVariableValues() {
        return $this->variableValues; 
    }

    public function setEquation() {
        $degreeValue = $this->degree; 
        
        while ($degreeValue > 0) {
            // echo $this->coefficientValues["a_$degreeValue"];
            // echo $this->variableValues[$degreeValue];
            $this->equationString .= "{$this->coefficientValues["a_$degreeValue"]}*{$this->variableValues[$degreeValue]} + ";
            $degreeValue--;
        }
        // $this->equationString .= "{$this->coefficientValues['a_0']}*{$this->variableValues['0']}";
        $this->equationString .= "{$this->coefficientValues['a_0']}"; // Append the final coefficient value
        return;
    }

    public function printEquation() {
        return $this->equationString;
    }
}


// setDegree method is kind of cumbersome, should consider switching to __construct route
$constantValue = new PolynomialEquation(); 
// echo $constantValue->getDegree();

$linearEquation = new PolynomialEquation();
$linearEquation->setDegree(1); 
$linearEquation->setArrayValuessForCoeffiecientsAndVariables();
print_r($linearEquation->getCoefficientValues());
echo "<br/>";
print_r($linearEquation->getVariableValues());
echo "<br/>";
$linearEquation->setEquation();
echo "<br/>";
echo $linearEquation->printEquation();
echo "<br/>";

$quadraticEquation = new PolynomialEquation(); 
$quadraticEquation->setDegree(2); 
$quadraticEquation->setArrayValuessForCoeffiecientsAndVariables();
print_r($quadraticEquation->getCoefficientValues());
echo "<br/>";
print_r($quadraticEquation->getVariableValues());
echo "<br/>";
$quadraticEquation->setEquation(); 
echo $quadraticEquation->printEquation();



// print_r($arrayOfRandomStrings[4]);
// echo count($arrayOfRandomStrings[4]);








?>

