

<?php /*
<p>
    username: <?php echo $username ?>
</p>

<p>
    name: <?php echo $name ?>
</p>

<p>
    links: <?php echo $links ?>
</p>

<p>
    about: <?php echo $about_text ?>
</p>

<p>
    birthday: <?php echo $birthday ?>
</p>



<p>
    num who follows me: <?php echo $num_who_follows_A ?>
</p>

<p>
    num who i follows: <?php echo $num_who_A_is_following ?>
</p>

<!-- SELECT users.id, users.username, users.name, users.created_at, about.about_text, about.birthday, about.links FROM users INNER JOIN about ON users.id = about.user_id; -->
*/
?>

<?php require_once(VIEWS.'inc/head.php') ?>
<?php require_once(VIEWS.'inc/header.php') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-4">
                <div class="card-body">
                    <div class="mb-4">
                        <h2 class="fw-bold mb-0"><?php echo htmlspecialchars($name); ?></h2>
                        <h5 class="text-muted">@<?php echo htmlspecialchars($username); ?></h5>
                    </div>

                    <p class="fs-5 text-dark"><?php echo htmlspecialchars($about_text); ?></p>

                    <div class="d-flex gap-4 text-muted mb-4">
                        <?php if(!empty($links)): ?>
                            <div><i class="bi bi-link-45deg"></i> <?php echo htmlspecialchars($links); ?></div>
                        <?php endif; ?>
                        <div><i class="bi bi-calendar-event"></i> Born on: <?php echo htmlspecialchars($birthday); ?></div>
                    </div>

                    <div class="d-flex gap-4 border-top pt-3">
                        <div class="text-center">
                            <span class="d-block fw-bold fs-4"><?php echo $num_who_A_is_following; ?></span>
                            <span class="text-muted">Following</span>
                        </div>
                        <div class="text-center">
                            <span class="d-block fw-bold fs-4"><?php echo $num_who_follows_A; ?></span>
                            <span class="text-muted">Followers</span>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
    </div>
</div>

<?php require_once(VIEWS.'inc/footer.php') ?>