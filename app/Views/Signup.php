<?php /*

AuthorisationMiddleware::check_for_login(); ?>

<h3>signup</h3>
<form action=<?php echo BURL . "signup/signup" ?> method="POST">

    <?php
    if (isset($_SESSION['signupData']['username']) && !isset($_SESSION['errors_signup']['username_taken'])) {
        echo "<input type='text' name='username' placeholder='username' value=". $_SESSION['signupData']['username'] .">";
    } else {
        echo "<input type='text' name='username' placeholder='username'>";
    }

    if (isset($_SESSION['signupData']['email']) && !isset($_SESSION['errors_signup']['email_used']) && !isset($_SESSION['errors_signup']['invalid_email'])) {
        echo "<input type='text' name='email' placeholder='email' value=". $_SESSION['signupData']['email'] .">";
    } else {
        echo "<input type='text' name='email' placeholder='email'>";
    }

    if (isset($_SESSION['signupData']['name'])) {
        echo "<input type='text' name='name' placeholder='name' value=". $_SESSION['signupData']['name'] .">";
    } else {
        echo "<input type='text' name='name' placeholder='name'>";

    }

    echo "<input type='password' name='pwd' placeholder='password'>";

    unset($_SESSION['signupData']);
    ?>

    <button type="submit">signup</button>
</form>

<?php
// $_SESSION['errors_signup'] = [1,2,1];

if (isset($_SESSION['errors_signup'])) {
    $errors = $_SESSION['errors_signup'];

    echo "<br>";


    foreach ($errors as $error) {
        echo '<p class="form_error">' . $error . '</p>';
    }

    unset($_SESSION['errors_signup']);
} else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
    echo "<br>";
    echo "signup success";
} */
?>

<?php require_once(VIEWS.'inc/head.php') ?>

<?php AuthorisationMiddleware::check_for_login(); ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4 p-4">
                <div class="card-body">
                    <h2 class="text-center fw-bold mb-4">Create your account</h2>

                    <?php if (isset($_SESSION['errors_signup'])): ?>
                        <?php foreach ($_SESSION['errors_signup'] as $error): ?>
                            <div class="alert alert-danger p-2 text-center"><?php echo $error; ?></div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors_signup']); ?>
                    <?php elseif(isset($_GET["signup"]) && $_GET["signup"] === "success"): ?>
                        <div class="alert alert-success text-center">Signup successful! Please login.</div>
                    <?php endif; ?>

                    <form action="<?php echo BURL . "signup/signup"; ?>" method="POST">
                        
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control rounded-pill" placeholder="Name" 
                                   value="<?php echo isset($_SESSION['signupData']['name']) ? htmlspecialchars($_SESSION['signupData']['name']) : ''; ?>">
                        </div>

                        <div class="mb-3">
                            <input type="text" name="username" class="form-control rounded-pill" placeholder="Username" 
                                   value="<?php echo (isset($_SESSION['signupData']['username']) && !isset($_SESSION['errors_signup']['username_taken'])) ? htmlspecialchars($_SESSION['signupData']['username']) : ''; ?>">
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control rounded-pill" placeholder="Email" 
                                   value="<?php echo (isset($_SESSION['signupData']['email']) && !isset($_SESSION['errors_signup']['email_used']) && !isset($_SESSION['errors_signup']['invalid_email'])) ? htmlspecialchars($_SESSION['signupData']['email']) : ''; ?>">
                        </div>

                        <div class="mb-3">
                            <input type="password" name="pwd" class="form-control rounded-pill" placeholder="Password" required>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Sign up</button>
                        </div>
                    </form>
                    
                    <?php unset($_SESSION['signupData']); ?>
                </div>
            </div>
        </div>
    </div>
</div>