<?php
/*
// echo '<br>';echo '<br>';echo '<br>';
// print_r($my_notification);

foreach ($my_notification as $notification) { ?>

<a href= <?php echo BURL . 'Post/open_post/' . $notification['post'] ?> >
    <?php echo $notification['notification_text'] ?>
</a>

<?php } */?>

<?php require_once(VIEWS.'inc/head.php') ?>
<?php require_once(VIEWS.'inc/header.php') ?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="mb-3">Notifications</h4>
            
            <?php if (empty($my_notification)): ?>
                <div class="alert alert-info">No new notifications.</div>
            <?php else: ?>
                <div class="list-group shadow-sm">
                    <?php foreach ($my_notification as $notification): ?>
                        <a href="<?php echo BURL . 'Post/open_post/' . $notification['post']; ?>" 
                           class="list-group-item list-group-item-action p-3">
                            <div class="d-flex w-100 justify-content-between">
                                <p class="mb-1"><?php echo htmlspecialchars($notification['notification_text']); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>