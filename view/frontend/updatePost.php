<div>
    <a href="/admin" class="btn btn-dark button back-admin"> Retour au menu d'administration</a>
</div>
<div class="form-add-post container">
    <h1>Modifier un blog post !</h1>
    <img src="./public/image/<?= htmlspecialchars($postImg)  ?>" alt="">
    <form action="/?action=update&img=<?= $postImg;?>&id=<?= $postId;?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="title"> Titre </label>
            <input type="text" name="title" value="<?= $postTitle; ?>">
        </div>
        <div>
            <label for="chapo"> Chapo </label>
            <input type="text" name="chapo" value="<?= $postChapo; ?>">
        </div>
        <div>
            <label for="content"> Contenu </label>
            <textarea name="content" id="content" cols="30" rows="5"><?= nl2br(htmlspecialchars($postContent)); ?></textarea>
        </div>
        <div>
            <label for="file"> Changer d'image de mise en avant</label>
            <input type="file" name="file">
        </div>
        <input type="submit" class="btn btn-dark">
    </form>
</div>