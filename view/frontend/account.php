<?php $title = 'Mon compte'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>

<p><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<div>
    <h1>MON COMPTE</h1>
    <p>Mes informations personnelles</p>
</div>
<div>
    <form action="?action=updateUser&id=<?php echo $user->getId() ?>" method="post">
        <div>
            <label for="firstname"> Prénom :</label>
            <input type="text" name="firstname" id="firstname" value="<?php echo $user->getFirstname()?>">
        </div>
        <div>
            <label for="name"> Nom :</label>
            <input type="text" name="name" id="name" value="<?php echo $user->getLastname()?>">
        </div>
        <div>
            <label for="phone"> Numéro de téléphone :</label>
            <input type="text" name="phone" id="phone" value="<?php echo $user->getPhone()?>">
        </div>
        <div>
            <label for="email"> Email :</label>
            <input type="text" name="email" id="email" value="<?php echo $user->getEmail()?>">
        </div>
        <div>
            <label for="password"> Mot de passe :</label>
            <input type="password" name="password" id="password" value="<?php echo $user->getPassword()?>">
        </div>
        <input type="submit" value="Modifier">
    </form>
</div>