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
        foreach($posts as $post) {
            $postId = $post->getId();
            $postTitle = $post->getTitle(); ?>
            <tr cope="row">
                <td><?= htmlspecialchars($postId) ?></td>
                <td><?= htmlspecialchars($postTitle) ?></td>
                <td><a href="/admin/modification-post/<?= $postId ?>"> Modifier </a></td>
                <td><a href="/admin/delete-post/<?= $postId ?>"> Supprimer </a></td>
            </form>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
