<?php
$page_name = 'Login';
$rootDir = '/home/multistream6/domains/thomas.matagram.com/public_html/';
$siteUrl = 'https://thomas.matagram.com/';
include_once($rootDir . 'cms/functions/login_function.php');
include_once($rootDir . 'cms/partials/header.php');
?>
<section class="auth bg-base d-flex flex-wrap">
    <div class="auth-left d-lg-block d-none">
        <div class="d-flex align-items-center flex-column h-100 justify-content-center">
            <img src="<?= $siteUrl ?>front_added/logo/logo.png?v=1697959738" alt="">
        </div>
    </div>
    <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
        <div class="max-w-464-px mx-auto w-100">
            <div>
                <a href="/" class="mb-40 max-w-290-px">
                    <img src="<?= $siteUrl ?>front_added/logo/logo.png?v=1697959738" alt="">
                </a>
                <h4 class="mb-12">Sign In to your Account</h4>
                <p class="mb-32 text-secondary-light text-lg">Welcome back! please enter your detail</p>
                <?php if (!empty($error)): ?>
                    <div class="py-2">
                        <div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
                            <div class="d-flex align-items-center gap-2">
                                <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                                <?php echo htmlspecialchars($error); ?>
                            </div>
                            <button class="remove-button text-warning-600 text-xxl line-height-1" onclick="this.parentElement.style.display='none';">
                                <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
                            </button>
                        </div>
                    </div>
                <div class="py-2">
                <?php endif; ?>
            </div>
            <form action="" method="POST"> <!-- Points to login_function.php -->
                <div class="icon-field mb-16">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="mage:email"></iconify-icon>
                    </span>
                    <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Email" required>
                </div>
                <div class="position-relative mb-20">
                    <div class="icon-field">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                        </span>
                        <input type="password" name="password" class="form-control h-56-px bg-neutral-50 radius-12" id="your-password" placeholder="Password" required>
                    </div>
                    <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
                </div>
                <div class="">
                    <div class="d-flex justify-content-between gap-2">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input border border-neutral-300" type="checkbox" value="" id="remember">
                            <label class="form-check-label" for="remember">Remember me </label>
                        </div>
                        <a href="<?= $siteUrl ?>forgotten_password" class="text-primary-600 fw-medium">Forgot Password?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32" name="login"> Sign In</button>

                <!-- Additional social login buttons -->

                <div class="mt-32 text-center text-sm">
                    <p class="mb-0">Don’t have an account? <a href="<?= $siteUrl ?>signup" class="text-primary-600 fw-semibold">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once($rootDir . 'cms/partials/footer.php');
?>
