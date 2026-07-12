

<body>
    
<?php
// $_SESSION['user_info'] = [1,2,1];

if (isset($_SESSION['user_info'])) {
    echo '<p class=""> hello ' . $_SESSION['user_info']['name'] . '! </p>';
}
?>

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
        <a href=<?php echo BURL . "stars/add/" . $post['id'] ?>><button>stars</button></a> <span> <?php echo $post['is_starred'] ?> </span>

<?php }?>

        <hr>
    </div>
<?php } ?>





</body>
</html>