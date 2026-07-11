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
    echo '<p class=""> hello ' . $_SESSION['user_info']['name'] . '! </p>';
}
?>

<?php if (isset($_SESSION['user_info'])) { ?>

    <form action= <?php echo BURL . "Post/post" ?> method="POST">
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
        <a href= <?php echo BURL . "Post/open_post/" . $post['id'] ?>>view comments</a>

<?php if (isset($_SESSION['user_info'])) { ?>

        <a href= <?php echo BURL . "Post/comment/" . $post['id'] ?>>comment</a>
        <a href=<?php echo BURL . "Post/like/" . $post['id'] ?>><button>like</button></a> <samp> <?php echo $post['total_likes'] ?> </samp>

<?php }?>

        <hr>
    </div>
<?php } ?>





</body>
</html>