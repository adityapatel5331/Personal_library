<?php
foreach ($books as $key => $book) {
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
    echo '<form method="post" action="cart.php">';
    echo '<input type="hidden" name="book_name_' . $key . '" value="' . $book["Book Name"] . '">';
    echo '<input type="hidden" name="author_' . $key . '" value="' . $book["Author"] . '">';
    echo '<input type="hidden" name="isbn_' . $key . '" value="' . $book["ISBN-10"] . '">';
    echo '<input type="hidden" name="price_' . $key . '" value="' . $book["Price"] . '">';
    echo '<input type="hidden" name="image_' . $key . '" value="' . $book["Image"] . '">';
    // echo '<button type="submit" class="btn btn-info" name="buy_book">Buy</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo "<hr>";
}
?>