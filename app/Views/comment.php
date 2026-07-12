<?php require_once(VIEWS.'inc/head.php') ?>
<?php require_once(VIEWS.'inc/header.php') ?>


<!-- <div>
    <h1> <?php echo $name ?> </h1>
    <h2> <?php echo $username ?> </h2>
    <h3> <?php echo $post_text ?> </h3>
    <h3> <?php echo $created_at ?> </h3>
</div>


<form action= <?php echo BURL . "Post/comment_comment/" . $id ?> method="POST">
    <input type="text" name="comment_text">        
    <input type="submit">  
</form> -->




<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- البطاقة التي تحوي بيانات البوست -->
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <!-- اسم المستخدم -->
                    <h3 class="card-title fw-bold text-primary mb-1"><?php echo htmlspecialchars($name); ?></h3>
                    <!-- اسم المستخدم @username -->
                    <h6 class="text-muted mb-3">@<?php echo htmlspecialchars($username); ?></h6>
                    
                    <!-- نص التغريدة -->
                    <p class="card-text fs-5 mb-4"><?php echo htmlspecialchars($post_text); ?></p>
                    
                    <!-- التاريخ -->
                    <div class="text-muted small mb-4">
                        <i class="bi bi-calendar"></i> <?php echo $created_at; ?>
                    </div>

                    <hr>

                    <!-- نموذج الكومنت -->
                    <form action="<?php echo BURL . "Post/comment_comment/" . $id; ?>" method="POST">
                        <div class="input-group">
                            <input type="text" name="comment_text" class="form-control" placeholder="Write a comment..." required>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>