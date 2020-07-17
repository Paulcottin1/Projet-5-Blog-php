<div class="container">
    <h2> Création de compte</h2>
    <p><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <form action="/?action=addUser" method="post">
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas ton email.</small>
        </div>
        <div class="form-group">
            <label for="phone"> Téléphone </label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <input type="submit" class="btn btn-dark">
    </form>
</div>
<div class="full-height">
</div>