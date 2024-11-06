<?php
$page_name = 'View All E-Books';
$rootDir = '/home/multistream6/domains/thomas.matagram.com/public_html/';
include_once(__DIR__ . '/../../../cms/functions/librarian_function.php');
include_once(__DIR__ . '/../../../cms/partials/header.php');
?>

<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"><?=$page_name?></h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?=$site_url?>" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Dashboard / <?=$page_name?></li>
        </ul>
    </div>
    <div class="my-5 mx-3 p-4">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            if ($msg == 'book_deleted_successfully') {
                echo '<div class="alert alert-success bg-success-100 text-success-600 border-success-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="akar-icons:double-check" class="icon text-xl"></iconify-icon>
                    Book deleted successfully!
                </div>
                <button class="remove-button text-success-600 text-xxl line-height-1" onclick="this.parentElement.style.display=\'none\';">
                    <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                </button>
            </div>';
            } elseif ($msg == 'error_deleting_book') {
                echo '<div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                    Error deleting book. Please try again.
                </div>
                <button class="remove-button text-danger-600 text-xxl line-height-1" onclick="this.parentElement.style.display=\'none\';">
                    <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                </button>
            </div>';
            } elseif ($msg == 'invalid_book_id') {
                echo '<div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                    Invalid Command or Key Pressed. Please try again.
                </div>
                <button class="remove-button text-danger-600 text-xxl line-height-1" onclick="this.parentElement.style.display=\'none\';">
                    <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                </button>
            </div>';
            } elseif ($msg == 'pdf_required') {
                echo '<div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                    PDF file is required.
                </div>
                <button class="remove-button text-danger-600 text-xxl line-height-1" onclick="this.parentElement.style.display=\'none\';">
                    <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                </button>
            </div>';
            } elseif ($msg == 'error_uploading_cover') {
                echo '<div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                    Error uploading the book cover. Please try again.
                </div>
                <button class="remove-button text-danger-600 text-xxl line-height-1" onclick="this.parentElement.style.display=\'none\';">
                    <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                </button>
            </div>';
            } elseif ($msg == 'cover_required') {
                echo '<div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                    Book cover is required.
                </div>
                <button class="remove-button text-danger-600 text-xxl line-height-1" onclick="this.parentElement.style.display=\'none\';">
                    <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                </button>
            </div>';
            }
        }
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Automatically hide the alert after 2 seconds (2000 milliseconds)
                setTimeout(function() {
                    const alerts = document.querySelectorAll('.alert');
                    alerts.forEach(alert => {
                        alert.style.transition = 'opacity 0.5s ease-out';
                        alert.style.opacity = '0';
                        setTimeout(() => {
                            alert.style.display = 'none';
                        }, 500); // Wait for the transition to finish before setting display to 'none'
                    });
                }, 2000);
            });
        </script>
    </div>
<div class="row mb-4">
    <?php
    // Ensure database connection is available
    if (!isset($conn)) {
        die("Database connection error.");
    }

    // Query to get all books from the e_book table
    $sql = "SELECT id, book_name, book_link, book_type, book_cover, author FROM e_book";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $book_id = $row['id'];
            $book_name = htmlspecialchars($row['book_name']);
            $book_link = htmlspecialchars($row['book_link']);
            $book_type = $row['book_type'];
            $book_cover = $row['book_cover'] ? $row['book_cover'] : 'assets/images/default_cover.png'; // Fallback to default if no cover
            $author = htmlspecialchars($row['author']);

            // Display each book using the template
            echo '
        <div class="col-xxl-3 col-md-4 col-sm-6">
            <div class="card h-100 radius-12">
                <img style="max-height:300px;max-width: 100%;object-fit: cover;object-position: center;" src="' . $book_cover . '" class="card-img-top" alt="' . $book_name . ' cover image">
                <div class="card-body p-16 text-end">
                    <h5 class="card-title text-lg text-primary-light mb-6">' . $book_name . '</h5>
                    <p class="card-text text-neutral-600">Author: ' . $author . '</p>
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-3">
                        <a href="' . $book_link . '" target="_blank" class="btn btn-primary-100 text-white text-primary-600 px-12 py-10 d-inline-flex align-items-center gap-2">
                            View Book <iconify-icon icon="iconamoon:arrow-right-2" class="text-xl"></iconify-icon>
                        </a>
                        <a href="delete_book.php?book_id=' . $book_id . '" onclick="return confirm(\'Are you sure you want to delete this book?\');" class="btn btn-danger text-white px-12 py-10 d-inline-flex align-items-center gap-2">
                            Delete <iconify-icon icon="bx:trash" class="text-xl"></iconify-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>';
        }
    } else {
        echo '<p>No books found.</p>';
    }
    ?>
</div>

<div class="mb-5"></div>
<?php
include_once(__DIR__ . '/../../../cms/partials/footer.php');
?>
