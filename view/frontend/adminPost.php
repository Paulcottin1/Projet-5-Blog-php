<?php $title = 'Gestion des blog posts'; ?>
<?php require('template.php'); ?>


<?php ob_start(); ?>
<div class="row center">
    <h1 class="col"> Gestion des blog posts</h1>
</div>
<div class="row center">
<h2 class="col-12"> Ajouter un blog post</h2>
<a href="index.php?action=formAddPost" class="btn btn-dark col-12"> + </a>
</div>
<div class="row">
    <h2 class="col-12 center">Modération des commentaires </h2>
    <a href="index.php?action=adminComment" class="btn btn-dark col-12"> Modérer </a>
</div>
<div class="row admin-post">
    <h2 class="col-12 center"> Modifier ou supprimer des blog posts </h2>
    <p><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <?php
    foreach($posts as $post) { 
    ?>
        <div class="col-12">
            <p>
                <?= htmlspecialchars($post->getId()) ?>
                <?= htmlspecialchars($post->getTitle()) ?>
                <a href="index.php?action=formUpdatePost&id=<?php echo $post->getId() ?>"> Modifier </a>
                <a href="?action=delete&id=<?php echo $post->getId() ?>"> Supprimer </a>
            </p>
        </div><br>
    <?php
    }
    ?>
</div>
