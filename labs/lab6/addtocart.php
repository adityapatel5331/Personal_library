<?php
session_start();
include('./main/list1.php');
// Check if the form is submitted and the book is selected
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy_book'])) {
//     $books = $_POST['books'];

//     // Initialize cart count
//     $cartCount = 0;

//     // Check if cart is already set in session
//     if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
//         // Add selected books to the cart
//         foreach ($books as $book) {
//             $_SESSION['cart'][] = $book;
//             $cartCount++;
//         }
//     } else {
//         // Create a new cart and add selected books
//         $_SESSION['cart'] = $books;
//         $cartCount = count($books);
//     }

//     // Update cart count in session
//     $_SESSION['cart_count'] = $cartCount;

//     // Redirect back to the previous page
//     header("Location: {$_SERVER['HTTP_REFERER']}");
//     exit();
// } 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy_book'])) {
    //     $books = $_POST['books'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        $_SESSION['cart_count'] = 0;
    }
    // foreach ($books as $key => $book){
    //     $_SESSION['cart'][] = $book;
    // }
    foreach ($books as $key => $book){
        if ($book['ISBN-10'] == $_POST['book_index']){
            $bookIndex = $key;
            break;
        }
    }
    // $bookIndex = $_POST['book_index'];
    $book = $books[$bookIndex];

    $_SESSION['cart'][] = $book;
    $_SESSION['cart_count']++;
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
else {
    // If no book is selected, redirect to index.php
    header("Location: index.php");
    exit();
}
?>