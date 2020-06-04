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
<div class="row pagination">
        <a href="index.php?action=adminPost&page=1" class="btn btn-dark col-2"> <<</a>
        <?php if(!empty($_GET['page']) && $_GET['page'] > 1) { ?>
            <a href="index.php?action=adminPost&page=<?php echo $_GET['page'] - 1; ?>" class="btn btn-dark col-1"> < </a>
        <?php } 
        for($i = 1; $i <= $numberPages; $i++) {
            ?> <a href="index.php?action=adminPost&page=<?php echo $i; ?>" class="btn btn-dark col-1"><?php echo $i; ?></a> <?php
        }
        if(!empty($_GET['page']) && $_GET['page'] < $numberPages) { ?>
            <a href="index.php?action=adminPost&page=<?php if(!empty($_GET['page'])){ echo $_GET['page'] + 1; } else { echo 2; } ?>" class="btn btn-dark col-1"> > </a>
        <?php } ?>
        <a href="index.php?action=adminPost&page=<?php echo $numberPages; ?>" class="btn btn-dark col-2"> >></a>
</div>