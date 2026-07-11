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
