<?php $title = 'Modifier un blog post'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>
<div>
    <h1>Modifier un blog post !</h1>
    <img src="./public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="">
    <form action="index.php?action=update&img=<?php echo $post->getImg();?>&id=<?php echo $post->getId();?>" method="post" enctype="multipart/form-data">
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
        <input type="submit">
    </form>
</div>