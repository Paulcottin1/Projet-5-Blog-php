<div class="container back">
    <p class="btn btn-dark"><a href="/blog">Retour à la liste des réalisations</a></p>
</div>
<div class="img-post-view justify-content-center row container-fluid">
    <img src="/public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="Image article" class="col-md-7 col-sm-10 center">
</div>
<div class="container content margin-top">
    <h2>
        <?= htmlspecialchars($post->getTitle()) ?>
    </h2>
    <p>
        <?= nl2br(htmlspecialchars($post->getContent())) ?>
    </p>
</div>
<div class="comments container" id="comments">
    <div class="row">
        <h3 class="col-md-12 center">Commentaires </h3>
    </div>
    <p><?php if(isset($_SESSION['message'])) { print $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <?php
    foreach($post->getComments() as $comment) {
        $userComment = $userManager->getUser($comment->getUserId());
    ?>  
        <div class="comment">
            <p class="author"><strong><?= htmlspecialchars($userComment->getFirstname()); ?> :</strong> </p>
            <?php
            if(isset($_GET['comment']) == 'update' && $comment->getUserId() === $user->getId()) {
            ?>
                <form action="/?action=submitUpdate&id=<?php print $post->getId(); ?>&page=<?php if(!empty($_GET['page'])) { print $_GET['page']; } else { print 1; } ?>&comment_id=<?php print $comment->getId(); ?>" method="post">
                    <textarea name="comment" id="comment" cols="30" rows="10" class="text-area-update"><?= nl2br(htmlspecialchars($comment->getComment())) ?></textarea>
                    <input type="submit" class="btn btn-dark update-comment margin-bottom">
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
                    <a href="/post/<?php print $post->getId(); ?>/page/<?php if(!empty($_GET['page'])) {
                    print $_GET['page']; } else { print 1; } ?>/modification-commentaire#comment" class="btn btn-dark margin-bottom update-comment"> Modifier</a>
                <?php
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>
<div class="container add-comment-form center container-fluid">
    <div class="row">
        <h2 class="col-md-12">Ajouter un commentaire </h2>
    </div>
    <?php 
    if(!empty($_SESSION['user'])) { 
    $user = unserialize($_SESSION['user']);                ?>
    <form action="/?action=addComment&amp;id=<?= $post->getId() ?>" method="post">
        <div>
            <p>Auteur : <?php print $user->getFirstname() . ' ' . $user->getLastname(); ?></p>
        </div>
        <div>
            <label for="comment">Commentaire :</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-dark margin-bottom" />
        </div>
    </form>
    <?php
    } else { ?>
        <a class="btn btn-dark margin-bottom" href="/connexion">Connectez vous pour écrire un commentaire</a>
    <?php 
    }
    ?>
</div>
