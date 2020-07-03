<?php $title = 'Gestion des blog posts'; ?>
<?php require('template.php'); ?>


<?php ob_start(); ?>
<div class="row center">
    <h2 class="col-12"> Modération des utilisateurs</h2>
    <a href="admin/moderation-utilisateur" class="btn btn-dark col-12"> Modérer </a>
</div>
<div class="row center">
    <h2 class="col-12"> Ajouter un blog post</h2>
    <a href="admin/ajout-post" class="btn btn-dark col-12"> + </a>
</div>
<div class="row">
    <h2 class="col-12 center">Modération des commentaires </h2>
    <a href="admin/moderation-commentaire" class="btn btn-dark col-12"> Modérer </a>
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
                <a href="/admin/modification-post/<?php echo $post->getId() ?>"> Modifier </a>
                <a href="admin/delete-post/<?php echo $post->getId() ?>"> Supprimer </a>
            </p>
        </div><br>
    <?php
    }
    ?>
</div>
