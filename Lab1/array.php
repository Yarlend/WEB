<?php
$student = [
    "name" => "Dmitriy",
    "surname" => "Ivanov",
    "age" => 19,
    "speciality" => "Computer science"
];

echo "Name: " . $student["name"] . "<br>";
echo "Surname: " . $student["surname"] . "<br>";
echo "Age: " . $student["age"] . "<br>";
echo "Speciality: " . $student["speciality"] . "<br>";

$student["average_score"] = 4.5;

echo "<br>Updated array:<br>";
echo "Name: " . $student["name"] . "<br>";
echo "Surname: " . $student["surname"] . "<br>";
echo "Age: " . $student["age"] . "<br>";
echo "Speciality: " . $student["speciality"] . "<br>";
echo "Average score: " . $student["average_score"];
?>