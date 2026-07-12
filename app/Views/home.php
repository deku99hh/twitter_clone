<?php /*

    <?php require_once(VIEWS.'inc/head.php') ?>

    <?php require_once(VIEWS.'inc/header.php') ?>



    <?php

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




    <?php require_once(VIEWS.'inc/footer.php') ?>
*/ ?>



<?php require_once(VIEWS.'inc/head.php') ?>
<?php require_once(VIEWS.'inc/header.php') ?>

<div class="container my-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            
            <?php if (isset($_SESSION['user_info'])): ?>
                <div class="alert alert-light border p-3 mb-4">
                    <h5 class="fw-bold">Welcome, <?php echo htmlspecialchars($_SESSION['user_info']['name']); ?>!</h5>
                    <form action="<?php echo BURL . "Post/post"; ?>" method="POST" class="mt-3">
                        <textarea class="form-control mb-2" name="post_text" rows="3" placeholder="What's happening?" required></textarea>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Post</button>
                    </form>
                </div>
            <?php else: ?>
                <div class="text-center p-4 mb-4 border rounded">
                    <h5>Join the conversation!</h5>
                    <a href="<?php echo BURL . 'login'; ?>" class="btn btn-outline-primary">Login to post</a>
                </div>
            <?php endif; ?>

            <?php foreach ($posts as $post): ?>
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-0"><?php echo htmlspecialchars($post['name']); ?></h6>
                        <small class="text-muted">@<?php echo htmlspecialchars($post['username']); ?></small>
                        <p class="card-text mt-2"><?php echo ($post['post_text']); ?></p>
                        <small class="text-muted d-block mb-3"><?php echo $post['created_at']; ?></small>

                        <div class="d-flex gap-3">
                            <a href="<?php echo BURL . "Post/open_post/" . $post['id']; ?>" class="text-decoration-none text-secondary">Comments</a>
                            
                            <?php if (isset($_SESSION['user_info'])): ?>
                                <a href="<?php echo BURL . "Post/comment/" . $post['id']; ?>" class="text-decoration-none text-secondary">Reply</a>
                                
                                <a href="<?php echo BURL . "Post/like/" . $post['id']; ?>" class="text-decoration-none">
                                    <button class="btn btn-sm btn-outline-danger">Like</button>
                                </a> 
                                <span><?php echo $post['total_likes']; ?></span>

                                <a href="<?php echo BURL . "stars/add/" . $post['id']; ?>" class="text-decoration-none">
                                    <button class="btn btn-sm btn-outline-warning">Star</button>
                                </a> 
                                <span><?php echo $post['is_starred']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require_once(VIEWS.'inc/footer.php') ?>