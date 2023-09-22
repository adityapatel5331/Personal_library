<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab1</title>
</head>

<body>
    <?php
    $stringVar1 = "Dalhousie University is <br>";
    $stringVar2 = "the 7th largest university in Canada <br>";
    $stringVar3 = 'in the world!!!';
    $intc = 12;
    $inta = 298;

    echo $stringVar1;
    echo $stringVar2;
    echo $inta;
    echo $stringVar3;
    ?>
    <br>
    <?php
    // Use of more than 1 data type
    $stringVar = "Hello, ";
    $intVar = 5;
    $floatVar = 3.14;
    $boolVar = true;

    // Use of expressions and operators
    $result = $intVar * $floatVar;
    $isEven = ($intVar % 2 == 0);

    // Use of basic PHP Built-In functions (echo)
    echo $stringVar . "world!";
    echo '<br>';
    echo "The result of $intVar*$floatVar is: ($result).<br> ";

    if ($boolVar) {
        echo "The integer $intVar is even: " . ($isEven ? 'Yes!' : 'No!');
    }
    ?>
</body>

</html>