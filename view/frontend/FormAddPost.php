<?php $title = 'Ajouter un blog post'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>

<?php if(isset($_SESSION['message'])) { echo '<p>'.$_SESSION['message'].'</p>'; unset($_SESSION['message']);} ?>
<div>
    <a href="/admin" class="btn btn-dark button back-admin"> Retour au menu d'administration</a>
</div>
<div class="container form-add-post">
    <h1>Ajout d'un blog post</h1>
    <p class="center">Veuillez remplir tous les champs</p>
    <form action="/?action=addPost" method="post" enctype="multipart/form-data">
        <div>
            <label for="title"> Titre </label></br>
            <input type="text" name="title">
        </div>
        <div>
            <label for="chapo"> Chapo </label></br>
            <input type="text" name="chapo">
        </div>
        <div>
            <label for="content"> Contenu </label></br>
            <textarea name="content" id="content" cols="30" rows="5"></textarea>
        </div>
        <div>
            <label for="fichier"> Image de mise en avant : </label>
            <input type="file" name="file">
        </div>
        <input type="submit" class="btn btn-dark">
    </form>
</div>
