<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for you</title>
</head>
<body>
    
<!-- <h1>hello home</h1>
<h1> <?php echo $title ?> </h1> -->

<?php
// $_SESSION['user_info'] = [1,2,1];

if (isset($_SESSION['user_info'])) {
    echo '<p class="">' . $_SESSION['user_info']['username'] . '</p>';
}
?>

<?php if (isset($_SESSION['user_info'])) { ?>

    <form action= <?php echo BURL . "home/post" ?> method="POST">
        <input type="text" name="post_text">        
        <input type="submit">  
    </form>

<?php } else { ?>

    <h1>need to login to post</h1>

<?php }?>


<!-- <?php print_r ($posts) ?> -->



<?php foreach ($posts as $post) {?>
    <div>
        <hr>
        <h1> <?php echo $post['name'] ?> </h1>
        <h2> <?php echo $post['username'] ?> </h2>
        <h3> <?php echo $post['post_text'] ?> </h3>
        <h3> <?php echo $post['created_at'] ?> </h3>
        <hr>
    </div>
<?php } ?>





</body>
</html>