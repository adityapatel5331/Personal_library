<?php
$books = array(
    array(
        "Book Name" => "Tea Party Teddy",
        "Author" => "Dianne Harman",
        "ISBN-10" => "0988934906",
        "Year of Publication" => "2013",
        "Image" => "tea.jpg",
        "Price" => "$18",
        "Genre" => "Suspense, Romance, Politics, Fiction"
    ),
    array(
        "Book Name" => "The United States of Elfin: Imagining a More Elven Style of Government",
        "Author" => "The Silver Elves",
        "ISBN-10" => "1544939981",
        "Year of Publication" => "2017",
        "Image" => "silver.jpg",
        "Price" => "$22",
        "Genre" => "Government, Spirituality, Philosophy, History, Nonfiction"
    ),
    array(
        "Book Name" => "The Orphan Conspiracies: 29 Conspiracy Theories from The Orphan Trilogy",
        "Author" => "James Morcan",
        "ISBN-10" => "1649374046",
        "Year of Publication" => "2022",
        "Image" => "orphan.jpg",
        "Price" => "$19",
        "Genre" => "Nonfiction, Conspiracy Theories, Science, History, Politics, Philosophy, Social Justice"
    ),
    array(
        "Book Name" => "Politixworks",
        "Author" => "Chuck U. Farlie",
        "ISBN-10" => "1538752727",
        "Year of Publication" => "2020",
        "Image" => "politics.jpg",
        "Price" => "$19",
        "Genre" => "Fiction"
    ),
    array(
        "Book Name" => "Economic Conservative/Social Liberal",
        "Author" => "Mark Bragg",
        "ISBN-10" => "0615548946",
        "Year of Publication" => "2015",
        "Image" => "liberal.jpg",
        "Price" => "$17.99",
        "Genre" => "Politics"
    )
);

$bookCount = count($books);

foreach ($books as $key => $book) {


    echo '<form method="post" action="shoppingcart.php">';

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
    echo '<img src="./images/' . $book["Image"] . '" alt="Book Cover" width="200" height="300"><br>';
    echo '<input type="hidden" name="book_name_' . $key . '" value="' . $book["Book Name"] . '">';
    echo '<input type="hidden" name="author_' . $key . '" value="' . $book["Author"] . '">';
    echo '<input type="hidden" name="isbn_' . $key . '" value="' . $book["ISBN-10"] . '">';
    echo '<input type="hidden" name="price_' . $key . '" value="' . $book["Price"] . '">';
    echo '<input type="hidden" name="image_' . $key . '" value="' . $book["Image"] . '">';



    echo '<label for="quantity">Quantity:</label>';
    echo '<input type="number" name="quantity" value="1" min="1" max="10">';
    echo '<input type="hidden" name="book_name" value="' . $book["ISBN-10"] . '">';
    echo '<input type="hidden" name="book_type" value="biographies">';

    echo '<button type="submit" class="btn btn-info" name="buy_book">Buy</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo "<hr>";
}
