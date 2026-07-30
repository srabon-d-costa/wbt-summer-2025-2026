<?php

// 1
//Write a PHP script to calculate the Simple Interest on a given principal amount.
//Hints: Simple Interest = (Principal × Rate × Time) / 100. Take Principal, Rate, and Time as variables and display the result.

echo"1.Simple Interest on a given principal amount.<br>";

$principal = 1000;
$rate = 0.1;
$time = 5;

$interest = ($principal*$rate*$time)/100;

echo"Simple Interest = $interest <br>";


// 2
// Write a PHP script to check whether a given number is a Prime number or not.
// Hints: Use a LOOP and IF-ELSE. A number is prime if it is only divisible by 1 and itself.

echo"2.A given number is a Prime number or not<br>";

$number = 9;
$prime = true;

if ($number <= 1){
    echo "$number is not a prime number <br>";
    }
else{
    for($i = 2; $i < $number; $i ++ ){
        if($number % 2 == 0){
            $prime = false;
            break;
        }
    }

    if($prime){
        echo"$number is not a prime number<br>";
    }
    else{
        echo"$number is a prime number<br>";
    }
}

// 3
//Write a PHP script to calculate the factorial of a given number.
//Hints: Use a LOOP to multiply numbers from 1 up to the given number (n! = 1 × 2 × 3 × ... × n).

echo"3.calculate the factorial.<br>";

$n = 5;
$factorial = 1;

if($n < 0){
    echo "Factorial don't work on negative numvers<br>";
}

for ($i = 1; $i < $n; $i ++){
    $factorial = $factorial * $i; 
}

echo"Factorial of $n is $factorial<br>";


// 4
//Write a PHP script to find the sum and average of all elements in an array.
//Hints: Use a LOOP & ARRAY. Sum = total of all elements, Average = Sum / total number of elements.

echo"4.Sum and Avarage of an array.<br>";
$numbers = [10, 20, 30, 40, 50];

$sum = 0;
$count = count($numbers);

for ($i = 0; $i < $count; $i++){
    $sum += $numbers[$i];
}

$average = $sum / $count;

echo "Sum = $sum <br>";
echo "Average = $average <br>";


// Print the following pattern using PHP.
// Hints: Use NESTED LOOP.
// 1
// 2 2
// 3 3 3
// 4 4 4 4

echo "5.Print the pattern.<br>";
$n = 4;

for($i = 1; $i<=$n; $i++){
    for($j = 0; $j < $i; $j++)
        {echo"$i";}
    echo"<br>";
}

?>


