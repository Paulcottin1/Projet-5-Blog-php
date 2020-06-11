<?php $title = 'Ajouter un blog post'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>

<div class="row container-fluid modComment">
    <h2 class="col-12 center">Modération des commentaires </h2>
    <p><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">POST ID</th>
            <th scope="col">AUTHEUR</th>
            <th scope="col">COMMENTAIRE</th>
            <th scope="col">VALIDATION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($comments as $comment) { 
        ?>
        <tr cope="row">
            <td><?= htmlspecialchars($comment->getId()) ?></td>
            <td><?= htmlspecialchars($comment->getPostId()) ?></td>
            <td><?= htmlspecialchars($comment->getAuthor()) ?></td>
            <td><?= htmlspecialchars($comment->getComment()) ?></td>
            <td><a href="?action=publishComment&id=<?php echo $comment->getId() ?>"> Valider </a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>


