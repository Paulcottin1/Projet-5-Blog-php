<?php $title = 'Modifier un blog post'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>

<div>
    <a href="/admin" class="btn btn-dark button back-admin"> Retour au menu d'administration</a>
</div>
<div class="form-add-post container">
    <h1>Modifier un blog post !</h1>
    <img src="./public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="">
    <form action="/?action=update&img=<?php echo $post->getImg();?>&id=<?php echo $post->getId();?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="title"> Titre </label>
            <input type="text" name="title" value="<?php echo $post->getTitle(); ?>">
        </div>
        <div>
            <label for="chapo"> Chapo </label>
            <input type="text" name="chapo" value="<?php echo $post->getChapo(); ?>">
        </div>
        <div>
            <label for="content"> Contenu </label>
            <textarea name="content" id="content" cols="30" rows="5"><?php echo nl2br(htmlspecialchars($post->getContent())); ?></textarea>
        </div>
        <div>
            <label for="file"> Changer d'image de mise en avant</label>
            <input type="file" name="file">
        </div>
        <input type="submit" class="btn btn-dark">
    </form>
</div>