<?php /*
<?php require_once(VIEWS.'inc/head.php') ?>
<?php require_once(VIEWS.'inc/header.php') ?>



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
*/ ?>



<?php require_once(VIEWS.'inc/head.php') ?>
<?php require_once(VIEWS.'inc/header.php') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <!-- بطاقة المنشور الأساسي -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h3 class="card-title fw-bold text-primary mb-1"><?php echo htmlspecialchars($post_data['name']); ?></h3>
                    <h6 class="text-muted mb-3">@<?php echo htmlspecialchars($post_data['username']); ?></h6>
                    
                    <p class="card-text fs-5 mb-4"><?php echo htmlspecialchars($post_data['post_text']); ?></p>
                    
                    <div class="text-muted small mb-3">
                        <?php echo $post_data['created_at']; ?>
                    </div>

                    <?php if (isset($_SESSION['user_info'])): ?>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top">
                            <a href="<?php echo BURL . "Post/comment/" . $post_data['id']; ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                Comment
                            </a>
                            <div class="d-flex align-items-center gap-1">
                                <a href="<?php echo BURL . "Post/like/" . $post_data['id']; ?>" class="text-decoration-none">
                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Like</button>
                                </a>
                                <span class="badge bg-light text-dark"><?php echo $post_data['total_likes']; ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- قسم التعليقات -->
            <div class="comments-section">
                <h5 class="fw-bold mb-3">Responses</h5>

                <?php if (empty($commentsarr)): ?>
                    <div class="text-center p-4 border rounded bg-light text-muted">
                        No comments yet. Be the first to reply!
                    </div>
                <?php else: ?>
                    <?php foreach ($commentsarr as $comment): ?>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h6 class="fw-bold mb-0 text-dark"><?php echo htmlspecialchars($comment['name']); ?></h6>
                                    <small class="text-muted" style="font-size: 0.75rem;"><?php echo $comment['created_at']; ?></small>
                                </div>
                                <div class="text-muted small mb-2">@<?php echo htmlspecialchars($comment['username']); ?></div>
                                <p class="card-text mb-0"><?php echo htmlspecialchars($comment['comments_text']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<?php require_once(VIEWS.'inc/footer.php') ?>