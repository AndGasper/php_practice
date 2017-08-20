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

print_r($arrayOfRandomStrings[4]);
echo count($arrayOfRandomStrings[4]);








?>

