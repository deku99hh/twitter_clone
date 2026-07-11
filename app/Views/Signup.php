<?php AuthorisationMiddleware::check_for_login(); ?>

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
}
?>