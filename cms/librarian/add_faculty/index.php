<?php
$page_name = 'Add Faculty';
$rootDir = '/home/multistream6/domains/thomas.matagram.com/public_html/';
include_once(__DIR__ . '/../../../cms/functions/librarian_function.php');
include_once(__DIR__ . '/../../../cms/partials/header.php');
?>

<script>
    function toggleFields() {
        var bookType = document.getElementById('book_type').value;
        var pdfField = document.getElementById('pdf_upload');
        var linkField = document.getElementById('book_link');

        if (bookType == '1') {
            pdfField.style.display = 'block';
            linkField.style.display = 'none';
        } else if (bookType == '2') {
            pdfField.style.display = 'none';
            linkField.style.display = 'block';
        }
    }
</script>

<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Add E-Book</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?=$site_url?>" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Dashboard / Add E-Book</li>
        </ul>
    </div>

    <div class="row gy-4 justify-content-center">
        <div class="col-xl-6">
            <div class="card h-100 p-0">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg fw-semibold mb-0"><?=$page_name?></h6>
                    <?php
                    if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        if ($msg == 'book_added_successfully') {
                            echo '<div class="alert alert-success bg-success-100 text-success-600 border-success-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="akar-icons:double-check" class="icon text-xl"></iconify-icon>
                    Book added successfully!
                </div>
                <button class="remove-button text-success-600 text-xxl line-height-1" onclick="this.parentElement.style.display=\'none\';">
                    <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                </button>
            </div>';
                        } elseif ($msg == 'error_adding_book') {
                            echo '<div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                    Error adding the book. Please try again.
                </div>
                <button class="remove-button text-danger-600 text-xxl line-height-1" onclick="this.parentElement.style.display=\'none\';">
                    <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                </button>
            </div>';
                        } elseif ($msg == 'error_uploading_pdf') {
                            echo '<div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                    Error uploading the PDF. Please try again.
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
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body p-24">
                        <!-- Book Name -->
                        <div class="col-12">
                            <label class="form-label">Faculty Name</label>
                            <input type="text" name="faculty_name" class="form-control" required>
                        </div>

                        <!-- Book Cover Upload -->
                        <div class="col-12">
                            <label class="form-label">Faculty Image</label>
                            <input type="file" name="faculty_image" class="form-control" accept="image/*" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 py-3">
                            <button type="submit" name="submit" class="btn btn-primary w-75">Add Faculty</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once(__DIR__ . '/../../../cms/partials/footer.php');
?>
