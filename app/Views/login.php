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

