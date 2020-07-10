<?php $title = 'Administration'; ?>
<?php require('template.php'); ?>


<?php ob_start(); ?>
<div class="row center">
    <h1 class="col-12"> Administration</h1>
    <p class="col-12">Choisissez ce que vous souhaitez administrer</p>
</div>
<div class="container admin-table">
    <table class="table table-bordered table-dark">
    <tbody>
        <tr>
            <td>
                <a href="admin/moderation-utilisateur" class="btn btn-dark col-12">
                    <h2 class="col-12"> Gestion des utilisateurs</h2>
                </a>
            </td>
            <td>
                <a href="admin/ajout-post" class="btn btn-dark col-12">
                    <h2 class="col-12"> Ajout d'un blog post</h2>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="admin/moderation-commentaire" class="btn btn-dark col-12">
                    <h2 class="col-12 center">Gestion des commentaires </h2>
                </a>
            </td>
            <td>
                <a href="/admin/modification-post" class="btn btn-dark col-12">
                    <h2 class="col-12 center"> Gestion des blog posts </h2>
                </a>
            </td>
        </tr>
    </tbody>
    </table>
</div>
