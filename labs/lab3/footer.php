<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Form</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/"> -->
    <style>
        .error-message {
            color: red;
        }

        .form-container {
            border: 1px solid #ccc;
            /* Border color and thickness */
            padding: 20px;
            /* Padding inside the container */
            margin: 20px;
            /* Margin around the container */
            max-width: 400px;
            /* Set maximum width for the container */
            border-width: 7px;
            border-color: pink;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container:hover {
            border-color: #0056b3;
            /* Border color on hover */
        }

        /* Style for form elements */
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: calc(100% - 22px);
            /* Calculate width to allow space for border and padding */
            margin-bottom: 10px;
            /* Spacing between form elements */
            padding: 10px;
            /* Padding inside form elements */
            display: inline-block;
            /* Display form elements inline */
        }

        .form-container input[type="submit"] {
            width: 100%;
            /* Make the submit button full width */
            background-color: #007bff;
            /* Button background color */
            color: #fff;
            /* Button text color */
            border: none;
            /* Remove button border */
            padding: 15px;
            /* Button padding */
            cursor: pointer;
            /* Add pointer cursor on hover */
            transition: background-color 0.3s ease;
            /* Smooth transition effect for button background color */
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
            /* Button background color on hover */
        }
    </style>
</head>