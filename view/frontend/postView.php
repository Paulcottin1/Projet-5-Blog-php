<?php $title = htmlspecialchars($post->getTitle()); ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>
<div class="row center title-blog-page">
    <h1 class="col">Mon blog !</h1>
</div>
<div class="container">
    <p class="btn btn-secondary"><a href="index.php">Retour à la liste des billets</a></p>
</div>
<div class="img-post-view row center">
    <img src="./public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="Image article" class="img-fluid col">
</div>
<div class="news container">
    <h3>
        <?= htmlspecialchars($post->getTitle()) ?>
    </h3>
    <p>
        <?= nl2br(htmlspecialchars($post->getContent())) ?>
    </p>
</div>
<div class="container add-comment-form center">
    <div class="row">
        <h2 class="col-md-12">Écrire un commentaire :</h2>
    </div>
    <form action="index.php?action=addComment&amp;id=<?= $post->getId() ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-secondary" />
        </div>
    </form>
</div>
<div class="comments container">
    <div class="row">
        <h2 class="col-md-12 center">Commentaires :</h2>
    </div>
    <?php
    foreach($post->getComments() as $comment){
    ?>  
        <div class="comment">
            <p class="author"><strong><?= htmlspecialchars($comment->getAuthor()) ?> :</strong> </p>
            <p class="content-comment"><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
        </div>
    <?php
    }
    ?>
</div>
<div class="row pagination">
        <a href="index.php?action=post&amp;id=<?= $post->getId() ?>&page=1" class="btn btn-dark col-2"> <<</a>
        <?php if(!empty($_GET['page']) && $_GET['page'] > 1) { ?>
            <a href="index.php?action=post&amp;id=<?= $post->getId() ?>&page=<?php echo $_GET['page'] - 1; ?>" class="btn btn-dark col-1"> < </a>
        <?php } 
        for($i = 1; $i <= $numberPages; $i++) {
            ?> <a href="index.php?action=post&amp;id=<?= $post->getId() ?>&page=<?php echo $i; ?>" class="btn btn-dark col-1"><?php echo $i; ?></a> <?php
        }
        if(!empty($_GET['page']) && $_GET['page'] < $numberPages) { ?>
            <a href="index.php?action=post&amp;id=<?= $post->getId() ?>&page=<?php if(!empty($_GET['page'])){ echo $_GET['page'] + 1; } else { echo 2; } ?>" class="btn btn-dark col-1"> > </a>
        <?php } ?>
        <a href="index.php?action=post&amp;id=<?= $post->getId() ?>&page=<?php echo $numberPages; ?>" class="btn btn-dark col-2"> >></a>
</div>

