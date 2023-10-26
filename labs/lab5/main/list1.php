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