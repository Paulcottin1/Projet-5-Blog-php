<?php $title = 'Ajouter un blog post'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>
<div>
    <h1>Ajouter un blog post !</h1>

    <form action="index.php?action=addPost" method="post">
        <div>
            <label for="title"> Titre </label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="content"> Contenu </label>
            <textarea name="content" id="conteent" cols="30" rows="5"></textarea>
        </div>
        <div>
            <label for="img"> Image de mise en avant</label>
            <input type="file" name="img" id="id">
        </div>
        <input type="submit">
    </form>
</div>
