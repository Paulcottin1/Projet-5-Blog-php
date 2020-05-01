<?php require('template.php'); ?>
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
foreach($posts as $post) { 
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->getTitle()) ?>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post->getContent())) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $post->getId() ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>


