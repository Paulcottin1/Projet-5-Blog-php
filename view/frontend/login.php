<p><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<div class="row center justify-content-center">
    <h2 class="col-5"> Création de compte</h2></br>
</div>
<div class="row center justify-content-center">
    <a href="/creation-compte" class="btn btn-dark col-3"> Créer mon compte</a>
</div>
<div class="margin-top container">
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
    <button type="submit" class="btn btn-dark">Connexion</button>
    </form>
</div>
<div class="full-height">
</div>
<div class="full-height">
</div>