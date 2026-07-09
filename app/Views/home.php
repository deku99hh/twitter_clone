<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>hello home</h1>
<h1> <?php echo $title ?> </h1>

<?php
// $_SESSION['user_info'] = [1,2,1];

if (isset($_SESSION['user_info'])) {
    echo '<p class="">' . $_SESSION['user_info']['username'] . '</p>';
}
?>

</body>
</html>