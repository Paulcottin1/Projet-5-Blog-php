<?php $title = 'Ajouter un blog post'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>
<?php if(isset($_SESSION['message'])) { echo '<p>'.$_SESSION['message'].'</p>'; unset($_SESSION['message']);} ?>
<div>
    <h1>Ajouter un blog post !</h1>
    <form action="/?action=addPost" method="post" enctype="multipart/form-data">
        <div>
            <label for="title"> Titre </label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="chapo"> Chapo </label>
            <input type="text" name="chapo">
        </div>
        <div>
            <label for="content"> Contenu </label>
            <textarea name="content" id="content" cols="30" rows="5"></textarea>
        </div>
        <div>
            <label for="fichier"> Image de mise en avant</label>
            <input type="file" name="file">
        </div>
        <input type="submit">
    </form>
</div>
