<?php /*

<?php AuthorisationMiddleware::check_for_login(); ?>

<h3>login</h3>
<form action= <?php echo BURL . "login/login" ?> method="POST">
    <input type='text' name='username' placeholder='username'>
    <input type='password' name='pwd' placeholder='password'>
    <button type="submit">login</button>
</form>

<?php 

// $_SESSION['errors_login'] = [1,2,1];

// echo session_id();

if (isset($_SESSION['errors_login'])) {
    $errors = $_SESSION['errors_login'];

    echo "<br>";


    foreach ($errors as $error) {
        echo '<p class="form_error">' . $error . '</p>';
    }

    unset($_SESSION['errors_login']);
}
?>
*/ ?>

<?php require_once(VIEWS.'inc/head.php') ?>

<?php AuthorisationMiddleware::check_for_login(); ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0 rounded-4 p-4">
                <div class="card-body">
                    <h2 class="text-center fw-bold mb-4">Login</h2>
                    
                    <?php if (isset($_SESSION['errors_login'])): ?>
                        <?php foreach ($_SESSION['errors_login'] as $error): ?>
                            <div class="alert alert-danger p-2 text-center"><?php echo $error; ?></div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors_login']); ?>
                    <?php endif; ?>

                    <form action="<?php echo BURL . "login/login"; ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control rounded-pill" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="pwd" class="form-control rounded-pill" placeholder="Enter your password" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
