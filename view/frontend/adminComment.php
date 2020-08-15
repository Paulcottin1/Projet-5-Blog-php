<div>
    <a href="/admin" class="btn btn-dark button back-admin"> Retour au menu d'administration</a>
</div>
<div class="container-fluid">
    <div class="row container-fluid modComment">
        <h2 class="col-12 center">Gestion des commentaires </h2>
        <p class="col-12 center">Validez les commentaires des utilisateurs pour qu'ils soient visible sur le blog post</p>
        <p><?php if(isset($_SESSION['message'])) { print $_SESSION['message']; unset($_SESSION['message']);} ?></p>
        <table class="table table-responsive-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">POST ID</th>
                <th scope="col">USER ID</th>
                <th scope="col">COMMENTAIRE</th>
                <th scope="col">VALIDATION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($comments as $comment) { ?>
                <tr cope="row">
                    <td><?= htmlspecialchars($comment->getId()) ?></td>
                    <td><?= htmlspecialchars($comment->getPostId()) ?></td>
                    <td><?= htmlspecialchars($comment->getUserId()) ?></td>
                    <td><?= htmlspecialchars($comment->getComment()) ?></td>
                    <td><a href="/?action=publishComment&id=<?= $comment->getId() ?>"> Valider </a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
