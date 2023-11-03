<?php
session_start();
include('./main/list1.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy_book'])) {

    //     $books = $_POST['books'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        $_SESSION['cart_count'] = 0;
    }
    foreach ($books as $key => $book) {
        if ($book['ISBN-10'] == $_POST['book_name']) {
            $bookIndex = $key;
            break;
        }
    }
    $book = $books[$bookIndex];
    $book['quantity'] = $_POST['quantity'];
    if (isset($_SESSION['cart'][$bookIndex])) {
        $_SESSION['cart'][$bookIndex]['quantity'] += $book['quantity'];
    } else {
        $_SESSION['cart'][$bookIndex] = $book;
    }

    $_SESSION['cart_count'] += $book['quantity'];

    // set session variable for total price
    if (!isset($_SESSION['total_price'])) {
        $_SESSION['total_price'] = 0;
    }

    $book['Price'] =   substr($book['Price'], 1);
    $book['quantity'] = $book['quantity'];

    $_SESSION['total_price'] += $book['Price'] * $book['quantity'];


    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    // If no book is selected, redirect to index.php
    header("Location: index.php");
    exit();
}
