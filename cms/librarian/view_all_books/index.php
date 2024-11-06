<?php
$page_name = 'Add E-Book';
$rootDir = '/home/multistream6/domains/thomas.matagram.com/public_html/';
include_once(__DIR__ . '/../../../cms/functions/librarian_function.php');
include_once(__DIR__ . '/../../../cms/partials/header.php');
?>

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

<div class="col-xxl-3 col-sm-6">
    <div class="card h-100 radius-12">
        <img src="assets/images/card-component/card-img3.png" class="card-img-top" alt="">
        <div class="card-body p-16 text-end">
            <h5 class="card-title text-lg text-primary-light
                         mb-6">This is Card title</h5>
            <p class="card-text text-neutral-600">We quickly learn to fear and thus automatically avo id potentially stressful situations of all kinds, including the most common of all .</p>
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-3">
                <a href="javascript:void(0)" class="btn btn-primary-100 text-white text-primary-600 px-12 py-10 d-inline-flex align-items-center gap-2">
                    Read More <iconify-icon icon="iconamoon:arrow-right-2" class="text-xl"></iconify-icon>
                </a>
                <button class="btn btn-warning-100 text-white text-warning-600 px-12 py-10 d-inline-flex align-items-center gap-2">
                    Book Mark <iconify-icon icon="bx:bookmark-minus" class="text-xl"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include_once(__DIR__ . '/../../../cms/partials/footer.php');
?>
