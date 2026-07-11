
<div>
    <h1> <?php echo $post_data['name'] ?> </h1>
    <h2> <?php echo $post_data['username'] ?> </h2>
    <h3> <?php echo $post_data['post_text'] ?> </h3>
    <h3> <?php echo $post_data['created_at'] ?> </h3>
</div>


<?php if (isset($_SESSION['user_info'])) { ?>

        <a href= <?php echo BURL . "Post/comment/" . $post_data['id'] ?>>comment</a>
        <a href=<?php echo BURL . "Post/like/" . $post_data['id'] ?>><button>like</button></a> <samp> <?php echo $post_data['total_likes'] ?> </samp>

<?php }?>


<?php
if (!$commentsarr) {?>
    <h1>no comments yet</h1>
<?php }
?>

<?php foreach ($commentsarr as $comment) {?>
    <div>
        <hr>
        <p> <?php echo $comment['name'] ?> </p>
        <p> <?php echo $comment['username'] ?> </p>
        <p> <?php echo $comment['comments_text'] ?> </p>
        <p> <?php echo $comment['created_at'] ?> </p>
        <!-- <a href= <?php // echo BURL . "Post/comment/" . $comment['id'] ?>>comment</a> -->
        <hr>
    </div>
<?php } ?>
