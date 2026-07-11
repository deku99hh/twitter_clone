
<div>
    <h1> <?php echo $name ?> </h1>
    <h2> <?php echo $username ?> </h2>
    <h3> <?php echo $post_text ?> </h3>
    <h3> <?php echo $created_at ?> </h3>
</div>


<form action= <?php echo BURL . "Post/comment_comment/" . $id ?> method="POST">
    <input type="text" name="comment_text">        
    <input type="submit">  
</form>



