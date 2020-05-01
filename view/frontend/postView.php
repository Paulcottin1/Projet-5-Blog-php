<?php $title = htmlspecialchars($post->getTitle()); ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post->getTitle()) ?>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post->getContent())) ?>
    </p>
</div>

<h2>Commentaires</h2>

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
        <input type="submit" />
    </div>
</form>

<?php
foreach($post->getComments() as $comment){
?>
    <p><strong><?= htmlspecialchars($comment->getAuthor()) ?> :</strong> </p>
    <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
<?php
}
?>



