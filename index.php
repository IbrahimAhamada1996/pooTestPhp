<div class="container">
    <?php
        require('model.php');

        $posts = getPosts();

        require('indexView.php');
    ?>
 </div>