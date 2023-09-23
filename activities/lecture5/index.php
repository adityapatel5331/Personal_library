<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CSCI 2170 - Lecture 5</title>
    <meta name="description" content="Title of Site">
    <meta name="author" content="Author Name">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="page">
        <section id="description">
            <h1>Lecture 5 Activity</h1>
            <p>Create a PHP file, this file should include a set of input controls to allow for the following
                calculations:
                <strong>add</strong>, <strong>subtract</strong>, <strong>multiply</strong>, <strong>divide, and
                    modulus, <strong>Is Even</strong>.</strong> And use some of PHP's built-in functions and arrays to
                better structure your code.
            </p>
        </section>
        <div class="content">
            <form method="post" action="" class="calculator">
                <fieldset>
                    <legend>Calculator</legend>
                    <label for="number1" class="notVisible">Number 1:</label>
                    <input type="number" name="number1" id="number1" aria-label="Number 1" tabindex="0"
                        placeholder="e.g. 2">
                    <label for="number2" class="notVisible">Number 2:</label>
                    <input type="number" name="number2" id="number2" aria-label="Number 2" placeholder="e.g. 5">
                    <br>
                    <button name="operator" value="Add">Add</button>
                    <button name="operator" value="Subtract">Subtract</button>
                    <button name="operator" value="Multiply">Multiply</button>
                    <button name="operator" value="Divide">Divide</button>
                    <button name="operator" value="Modulus">Modulus</button>
                    <button name="operator" value="Even">Is Even or not?</button>
                    <p class="result">Result: <em>
                            <?php echo $result;
                            include 'calculator.php';
                            ?>
                        </em></p>
                </fieldset>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; Aditya Patel </p>
    </footer>
</body>

</html>