<?php
function calculate($number1, $number2, $operator)
{
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
                    $result = 'Cannot divide by zero.';
                }
                break;
            case 'Even':
                if ($number1 % 2 == 0) {
                    $result = 'Even';
                } else {
                    $result = 'Odd';
                }
                break;
            default:
                $result = 'Invalid operator.';
        }
    } else {
        $result = 'You have not entered valid numeric values.';
    }

    return $result;
}
?>