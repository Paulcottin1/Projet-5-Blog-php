<?php $title = 'Mon blog'; ?>
<?php require('template.php'); ?>


<?php ob_start(); ?>
<div class="row center title-blog-page">
    <h1 class="col">Mon blog !</h1>
</div>
<h2>Derniers billets du blog </h2>

<div class="row">
    <?php
    foreach($posts as $post) { 
    ?>
        <div class="news col-12 col-sm-6 col-md-3">
            <h3>
                <?= htmlspecialchars($post->getTitle()) ?>
            </h3>
            <img src="./public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="Image article" class="img-fluid">
            <p>
                <?= nl2br(htmlspecialchars($post->getChapo())) ?>
            </p>
            <div class="view-comments">
                <a href="index.php?action=post&amp;id=<?= $post->getId() ?>">Voir les commentaires</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="row pagination">
        <a href="index.php?action=blog&page=1" class="btn btn-dark col-2"> <<</a>
        <?php if(!empty($_GET['page']) && $_GET['page'] > 1) { ?>
            <a href="index.php?action=blog&page=<?php echo $_GET['page'] - 1; ?>" class="btn btn-dark col-1"> < </a>
        <?php } 
        for($i = 1; $i <= $numberPages; $i++) {
            ?> <a href="index.php?action=blog&page=<?php echo $i; ?>" class="btn btn-dark col-1"><?php echo $i; ?></a> <?php
        }
        if(!empty($_GET['page']) && $_GET['page'] < $numberPages) { ?>
            <a href="index.php?action=blog&page=<?php if(!empty($_GET['page'])){ echo $_GET['page'] + 1; } else { echo 2; } ?>" class="btn btn-dark col-1"> > </a>
        <?php } ?>
        <a href="index.php?action=blog&page=<?php echo $numberPages; ?>" class="btn btn-dark col-2"> >></a>
</div>


