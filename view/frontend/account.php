<p><?php if(isset($_SESSION['message'])) { print $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<div class=" center">
    <h1>MON COMPTE</h1>
    <p>Mes informations personnelles</p>
</div>
<div class="container form-add-post">
    <form action="/?action=updateUser&id=<?= $userId ?>" method="post">
        <div>
            <label for="firstname"> Prénom :</label>
            <input type="text" name="firstname" id="firstname" value="<?= $userFirstname ?>">
        </div>
        <div>
            <label for="name"> Nom :</label>
            <input type="text" name="name" id="name" value="<?= $userLastname ?>">
        </div>
        <div>
            <label for="phone"> Numéro de téléphone :</label>
            <input type="text" name="phone" id="phone" value="<?= $userPhone ?>">
        </div>
        <div>
            <label for="email"> Email :</label>
            <input type="text" name="email" id="email" value="<?= $userEmail ?>">
        </div>
        <div>
            <label for="password"> Mot de passe :</label>
            <input type="password" name="password" id="password" value="<?= $userPassword ?>">
        </div>
        <input type="submit" class="margin-top btn btn-dark" value="Modifier">
    </form>
</div>
<div class="full-height">
</div>