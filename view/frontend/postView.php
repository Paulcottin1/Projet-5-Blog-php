<?php $title = htmlspecialchars($post->getTitle()); ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>
<div class="row center title-blog-page">
    <h1 class="col">Mon blog !</h1>
</div>
<div class="container">
    <p class="btn btn-secondary"><a href="/blog">Retour à la liste des billets</a></p>
</div>
<div class="img-post-view row center">
    <img src="/public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="Image article" class="img-fluid col">
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
    <?php 
    if(!empty($_SESSION['user'])) { 
    $user = unserialize($_SESSION['user']);                ?>
    <form action="/?action=addComment&amp;id=<?= $post->getId() ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <p><?php echo $user->getLastname() . ' ' . $user->getFirstname(); ?></p>
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-secondary" />
        </div>
    </form>
    <?php
    } else { ?>
        <a class="btn btn-dark" href="/connexion">Connectez vous pour écrire un commentaire</a>
    <?php 
    }
    ?>
</div>
<div class="comments container" id="comments">
    <div class="row">
        <h2 class="col-md-12 center">Commentaires :</h2>
    </div>
    <p><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <?php
    foreach($post->getComments() as $comment) {
    ?>  
        <div class="comment">
            <p class="author"><strong><?= htmlspecialchars($comment->getAuthor()) ?> :</strong> </p>
            <?php
            if(isset($_GET['comment']) == 'update' && $comment->getUserId() === $user->getId()) {
            ?>
                <form action="/?action=submitUpdate&id=<?php echo $post->getId(); ?>&page=<?php if(!empty($_GET['page'])) { echo $_GET['page']; } else { echo 1; } ?>&comment_id=<?php echo $comment->getId(); ?>" method="post">
                    <textarea name="comment" id="comment" cols="30" rows="10"><?= nl2br(htmlspecialchars($comment->getComment())) ?></textarea>
                    <input type="submit" class="btn btn-dark">
                </form>
            <?php
            } else {
            ?>
                <p class="content-comment"><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
            <?php
            }
            ?>
            <?php
            if(!empty($user)) {
                if($comment->getUserId() === $user->getId() && !isset($_GET['comment'])) {
                ?>
                    <a href="/post/<?php echo $post->getId(); ?>/page/<?php if(!empty($_GET['page'])) {
                    echo $_GET['page']; } else { echo 1; } ?>/modification-commentaire#comment" class="btn btn-dark"> Modifier</a>
                <?php
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>
