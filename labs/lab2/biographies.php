<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>My Bookstore</title>
    <style>
        .book-container {
            display: flex;
            align-items: center;
        }

        .book-info {
            flex: 1;
        }

        .book-image {
            flex: 1;
            margin-left: 20px;
            /* Adjust the margin as needed */
        }

        .book-image img {
            max-width: 100%;
            height: auto;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }

        main {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main>
        <h1>Welcome to The Section of Biographies in my Bookstore</h1>
    </main>
    <hr>
    <?php
    $books = array(
        array(
            "Book Name" => "Steve Jobs",
            "Author" => "Steve Jobs",
            "ISBN-10" => "1451648537",
            "Year of Publication" => "2011",
            "Image" => "steve.jpg",
            "Price" => "$14",
            "Genre" => "Biography,
            Nonfiction,
            Business,
            Technology,
            History,
            Biography Memoir"
        ),
        array(
            "Book Name" => "Unbroken: A World War II Story of Survival, Resilience and Redemption",
            "Author" => "Laura Hillenbrand",
            "ISBN-10" => "1400064163",
            "Year of Publication" => "2010",
            "Image" => "world.jpg",
            "Price" => "$20",
            "Genre" => "Nonfiction
            History,
            Biography,
            World War II,
            War,
            Historical"
        ),
        array(
            "Book Name" => "Einstein: His Life and Universe",
            "Author" => "Walter Isaacson",
            "ISBN-10" => "0743264738",
            "Year of Publication" => "2007",
            "Image" => "einstein.jpg",
            "Price" => "$16",
            "Genre" => "Biography,
            Nonfiction,
            Science,
            History,
            Physics,
            Biography Memoir"
        ),
        array(
            "Book Name" => "Into the Wild",
            "Author" => "Jon Krakauer",
            "ISBN-10" => "0385486804",
            "Year of Publication" => "1997",
            "Image" => "wild.jpg",
            "Price" => "$19",
            "Genre" => "Nonfiction
            Biography,
            Travel,
            Adventure,
            Classics,
            Memoir,
            Nature"
        ),
        array(
            "Book Name" => "John Adams",
            "Author" => "David McCullough",
            "ISBN-10" => "0743223136",
            "Year of Publication" => "2001",
            "Image" => "john.jpg",
            "Price" => "$7.99",
            "Genre" => "History,
            Biography,
            Nonfiction,
            American History,
            Presidents,
            Politics,
            Historical"
        )
    );

    foreach ($books as $book) {
        echo '<div class="book-container">';
        echo '<div class="book-info">';
        echo "<strong>Book Name:</strong> " . $book["Book Name"] . "<br>";
        echo "<strong>Author:</strong> " . $book["Author"] . "<br>";
        echo "<strong>ISBN-10:</strong> " . $book["ISBN-10"] . "<br>";
        echo "<strong>Year of Publication:</strong> " . $book["Year of Publication"] . "<br>";
        echo "<strong>Genre:</strong> " . $book["Genre"] . "<br>";
        echo "<strong>Price:</strong> " . $book["Price"] . "<br>";
        echo '</div>';

        echo '<div class="book-image">';
        echo '<img src="./images/' . $book["Image"] . '" alt="Book Cover" width="200" height="300">';
        echo '</div>';
        echo '</div>';
        echo "<hr>";
    }
    ?>
    <a href="index.php" class="btn btn-primary">Go to Index Page</a>
    <a href="biographies.php" class="btn btn-primary">Go to Biography Page</a>
    <a href="politics.php" class="btn btn-primary">Go to Politics Page</a>

</body>

<footer>
    <p> &copy; Aditya Patel </p>
</footer>

</html>