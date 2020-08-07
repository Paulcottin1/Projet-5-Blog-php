<div>
    <a href="/admin" class="btn btn-dark button back-admin"> Retour au menu d'administration</a>
</div>
<div class="row admin-post container-fluid">
    <h2 class="col-12 center"> Gestion des blog posts </h2>
    <p class="col-12 center">Vous pouvez modifier ou supprimer un blog post</p>
    <p><?php if(isset($_SESSION['message'])) { print $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <table class="table table-responsive-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">TITRE</th>
            <th scope="col">MODFICATION</th>
            <th scope="col">SUPPRESSION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($posts as $post) { ?>
            <tr cope="row">
                <td><?= htmlspecialchars($post->getId()) ?></td>
                <td><?= htmlspecialchars($post->getTitle()) ?></td>
                <td><a href="/admin/modification-post/<?= $post->getId() ?>"> Modifier </a></td>
                <td><a href="/admin/delete-post/<?= $post->getId() ?>"> Supprimer </a></td>
            </form>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
