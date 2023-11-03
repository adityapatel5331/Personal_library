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
    echo '<button type="submit" class="btn btn-info" name="buy_book">Buy</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo "<hr>";
}
?>