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
        <h1>Welcome to politics Section of my Book Store Website</h1>
    </main>
    <hr>
    <?php
    $books = array(
        array(
            "Book Name" => "VINCE FLYNN: CODE RED",
            "Author" => "VINCE FLYNN",
            "ISBN-10" => "1982164999",
            "Year of Publication" => "2023",
            "Image" => "code-red.jpg",
            "Price" => "$14",
            "Genre" => "Thriller, Fiction, Action, Mystery, Suspense Spy Thriller"
        ),
        array(
            "Book Name" => "HOLLY",
            "Author" => "King, Stephen",
            "ISBN-10" => "1668016133",
            "Year of Publication" => "2021",
            "Image" => "holly.jpg",
            "Price" => "$20",
            "Genre" => "Thriller, Fiction, Horror, Mystery, Crime"
        ),
        array(
            "Book Name" => "FOURTH WING",
            "Author" => "Yarros, Rebecca",
            "ISBN-10" => "1649374046",
            "Year of Publication" => "2022",
            "Image" => "fourth.jpg",
            "Price" => "$16",
            "Genre" => "Fantasy, Fiction, Romance, Dragon"
        ),
        array(
            "Book Name" => "23 1/2 LIES",
            "Author" => "Patterson, James",
            "ISBN-10" => "1538752727",
            "Year of Publication" => "2020",
            "Image" => "23.jpg",
            "Price" => "$19",
            "Genre" => "Adult, Fiction, Crime, Mystery, Mystery Thriller"
        ),
        array(
            "Book Name" => "THINGS WE LEFT BEHIND",
            "Author" => "Score, Lucy",
            "ISBN-10" => "1728276128",
            "Year of Publication" => "2019",
            "Image" => "things.jpg",
            "Price" => "$7.99",
            "Genre" => "Romance, Contemporary Romance, Contemporary, Fiction, Romantic Suspense"
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