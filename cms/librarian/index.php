<?php
$page_name = 'Librarian Portal';
$rootDir = '/home/multistream6/domains/thomas.matagram.com/public_html/';
include_once(__DIR__ . '/../../cms/functions/librarian_function.php');
include_once(__DIR__ . '/../../cms/partials/header.php');
?>

    <!--Section 1A-->
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Dashboard</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">E-Book Portal</li>
            </ul>
        </div>

        <div class="row gy-4">
            <!-- Top performance Start -->
            <div class="col-xxl-4">
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                            <h6 class="mb-2 fw-bold text-lg mb-0">New Students</h6>
                            <a href="<?$portal_url?>"
                               class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                                View All
                                <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                            </a>
                        </div>

                        <div class="mt-32">

                            <?php include_once(__DIR__ . '/../../cms/librarian/new_students.php'); ?>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Top performance End -->

        </div>
    </div>
<?php
include_once(__DIR__ . '/../../cms/partials/footer.php');
?>