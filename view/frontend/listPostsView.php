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
                <?= nl2br(htmlspecialchars($post->getContent())) ?>
            </p>
            <div class="view-comments">
                <a href="index.php?action=post&amp;id=<?= $post->getId() ?>">Voir les commentaires</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>


