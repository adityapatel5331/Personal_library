<?php
$number1 = $_POST['number1'];
$number2 = $_POST['number2'];
$operator = $_POST['operator'];
$result = '';

if (is_numeric($number1) && is_numeric($number2)) {
    switch ($operator) {
        case 'Add':
            $result = $number1 + $number2;
            break;
        case 'Subtract':
            $result = $number1 - $number2;
            break;
        case 'Multiply':
            $result = $number1 * $number2;
            break;
        case 'Divide':
            if ($number2 != 0) {
                $result = $number1 / $number2;
            } else {
                $result = '<strong>Error: Division by zero</strong>';
            }
            break;
        case 'Modulus':
            if ($number2 != 0) {
                $result = $number1 % $number2;
            } else {
                $result = '<strong>Error: Modulus by zero</strong>';
            }
            break;
        default:
            $result = '<strong>Invalid operator</strong>';
    }
} else {
    $result = '<strong>You have not entered valid numbers</strong>';
}
?>