<?php $title = 'Connexion'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>

<p><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<div>
    <h2> Création de compte</h2>
    <a href="/creation-compte" class="btn btn-dark"> Je créer mon compte</a>
</div>
<div>
    <h2>Connexion</h2>
    <form action="/?action=connection" method="post">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas ton email.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-dark">Je me connecte</button>
    </form>
</div>