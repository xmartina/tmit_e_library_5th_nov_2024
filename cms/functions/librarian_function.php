<?php
session_start();
include_once(__DIR__ . '/../../cms/functions/main_function.php');
include_once(__DIR__ . '/../../cms/functions/login_function.php');

if (!isset($conn)) {
    die("Database connection error.");
}

$sql = "SELECT * FROM students"; // Adjust the table name if different
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$student_id = $row['id'];
$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$reg_no = $row['reg_no'];
$student_dpt = $row['dpt_id'];
$student_img = $row['img'];
$gender = $row['gender'];

$full_name = $fname . ' ' . $lname;
if ($student_img == '') {
    $student_img = 'default.png';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    // Get form data
    $book_name = $_POST['book_name'];
    $book_type = $_POST['book_type'];
    $dpt_id = $_POST['dpt_id'];
    $author = $_POST['author'];
    $book_link = null;
    $book_cover = null;

    if ($book_type == '1') { // If book type is PDF
        if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
            $pdf_dir = __DIR__ . '/../../front_added/pdf/'; // Directory on the server
            $pdf_link = $site_url . 'front_added/pdf/'; // URL to access the file
            $pdf_name = basename($_FILES['pdf_file']['name']);
            $pdf_path = $pdf_dir . $pdf_name; // Full server path

            if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $pdf_path)) {
                $book_link = $pdf_link . $pdf_name; // Store URL in the database
            } else {
                header('Location: /cms/librarian/add_book?msg=error_uploading_pdf');
                exit();
            }
        } else {
            header('Location: /cms/librarian/add_book?msg=pdf_required');
            exit();
        }
    } elseif ($book_type == '2') { // If book type is Link
        $book_link = $_POST['book_link']; // Directly store the link provided
    }

// Handle Book Cover Upload
    if (isset($_FILES['book_cover']) && $_FILES['book_cover']['error'] == 0) {
        $cover_dir = __DIR__ . '/../../front_added/pdf/cover/'; // Directory on the server
        $cover_link = $site_url . 'front_added/pdf/cover/'; // URL to access the file
        $cover_name = basename($_FILES['book_cover']['name']);
        $cover_path = $cover_dir . $cover_name; // Full server path

        if (move_uploaded_file($_FILES['book_cover']['tmp_name'], $cover_path)) {
            $book_cover = $cover_link . $cover_name; // Store URL in the database
        } else {
            header('Location: /cms/librarian/add_book?msg=error_uploading_cover');
            exit();
        }
    } else {
        header('Location: /cms/librarian/add_book?msg=cover_required');
        exit();
    }

    // Prepare and execute SQL query to insert data
    $sql = "INSERT INTO e_book (book_name, book_link, book_type, dpt_id, book_cover, author) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisss", $book_name, $book_link, $book_type, $dpt_id, $book_cover, $author);

    if ($stmt->execute()) {
        header('Location: /cms/librarian/add_book?msg=book_added_successfully');
        exit();
    } else {
        header('Location: /cms/librarian/add_book?msg=error_adding_book');
        exit();
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['delete_book'])){

    if (!isset($conn)) {
        die("Database connection error.");
    }

// Check if the book ID is provided in the URL
    if (isset($_GET['book_id'])) {
        $book_id = intval($_GET['book_id']); // Sanitize the book ID to prevent SQL injection

        // Check if the book exists
        $sql_check = "SELECT * FROM e_book WHERE id = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("i", $book_id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check && $result_check->num_rows > 0) {
            // Book exists, proceed with deletion
            $sql_delete = "DELETE FROM e_book WHERE id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $book_id);

            if ($stmt_delete->execute()) {
                header('Location: /cms/librarian/book_list.php?msg=book_deleted_successfully');
                exit();
            } else {
                header('Location: /cms/librarian/book_list.php?msg=error_deleting_book');
                exit();
            }

            $stmt_delete->close();
        } else {
            // Book not found
            header('Location: /cms/librarian/book_list.php?msg=book_not_found');
            exit();
        }

        $stmt_check->close();
    } else {
        // No book ID provided
        header('Location: /cms/librarian/book_list.php?msg=invalid_book_id');
        exit();
    }

    $conn->close();


}