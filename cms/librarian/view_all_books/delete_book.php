<?php
session_start();
include_once(__DIR__ . '/../../../cms/functions/main_function.php'); // Include database connection file

if (!isset($conn)) {
    die("Database connection error.");
}

// Check if the book ID is provided in the URL
if (isset($_GET['book_id'])) {
    $book_id = intval($_GET['book_id']); // Sanitize the book ID to prevent SQL injection

    // Prepare and execute the deletion query
    $sql_delete = "DELETE FROM e_book WHERE id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $book_id);

    if ($stmt_delete->execute()) {
        header('Location: /cms/librarian/view_all_books?msg=book_deleted_successfully');
        exit();
    } else {
        header('Location: /cms/librarian/view_all_books?msg=error_deleting_book');
        exit();
    }

    $stmt_delete->close();
} else {
    // No book ID provided
    header('Location: /cms/librarian/view_all_books?msg=invalid_book_id');
    exit();
}

$conn->close();
?>
