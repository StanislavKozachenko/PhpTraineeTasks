<?php
//Task 1 - 3 functions.
include_once "task1/task1.php";
echo (usingSwitch(34) . "<br>");
echo (usingConditions(30) . "<br>");
echo (usingTernaryOperator(11));



//Task 2 - Birthday countdown.
include_once "task2/task2.php";
echo "<hr>";
echo("Days left: " . countOfDays("16-05-2023"));



//Task 3 - Sum of digits.
include_once "task3/task3.php";
echo "<hr>";
echo("Result: " . sumOfDigits(11119999));



//Task 4 - Remove item from array.
include_once "task4/task4.php";
echo "<hr>";
$inputArray = array(1,2,3,4,5);
$position = 2;
removeItemFromArray($inputArray, $position);
var_dump($inputArray);



//Task 5 - From A to B values.
include_once "task5/task5.php";
echo "<hr>";
$A = 14;
$B = 9;
$generator = getBetweenValues($A, $B);
foreach ($generator as $value) {
    echo "$value ";
}



//Task 6 - Transform string.
include_once "task6/task6.php";
echo "<hr>";
echo(transformString("              The quick-brown_fox jumps over the_lazy-dog      "));



//Task 6 - Validate URL.
include_once "task7/task7.php";
echo "<hr>";
echo "Result: " . checkURL("https://innowise.com/");



//Task 8 - Matrix class.
include_once "task8/task8.php";
echo "<hr>";
$matrix = new Matrix([
    [1.4,2.1,3.6],
    [2.8,3.4,1.5],
    [3.1,4.5,5.3]
]);
$secondMatrix = [
    [1,0,0],
    [0,2,0],
    [0,0,0.4]
];
$number = 10;

echo($matrix->show($matrix->getMatrix())); //Print output
echo "<br><br>Multiplication by a number<br><br>";
try {
    echo($matrix->add($number)); //Multiplication by a number
    echo "<br><br>Addition with another matrix<br><br>";
    echo($matrix->add($secondMatrix)); //Addition with another matrix

} catch (Exception $e) {
    echo $e;
}
echo "<br><br>Matrix multiplication<br><br>";
echo($matrix->multiply($secondMatrix)); //Matrix multiplication



//Task 9 - Inheritance example.
include_once "task9/Student.php";
include_once "task9/Aspirant.php";
echo "<hr>";
$student = new Student("Andrew", "Kolbaev", "222111", 5);

$students = [
    new Student("Anatoliy", "Vasiliev", "1113333", 2.3),
    new Student("Stanislav", "Kozachenko", "220343", 4.3),
    new Aspirant("Anton", "Vladimirov", "112344", 4.3),
    new Student("Andrew", "Kolbaev", "222111", 5),
    new Aspirant("Tonya", "Karpova", "112344", 5)
];
foreach ($students as $student){
    echo($student->getLastName() . ": " . $student->getScholarship() . "<br>");
}



//Task 10 - Calculator.
include_once "task10/task10.php";
echo "<hr>";
$myCalc = new Calculator(12, 6);
echo "Add numbers: " . $myCalc->add();
echo "<br><br>";
echo "Multiply numbers: " .$myCalc->multiply();
echo "<br><br>";
echo "Chain calculations: " .$myCalc->add()->divideBy(9)->multiplyBy(2); // Calculation by chain



//Task 11 - The shortest path (The shortest path is marked with stars).
include_once "task11/src/Path.php";

echo "<hr>";
$path = new Path();
echo $path . "<br>-----------<br>";
echo "A : " . $path->getA() . "<br>";
echo "B : " . $path->getB();
echo "<br>-----------<br>";

echo($path->solve());