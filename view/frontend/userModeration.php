<?php $title = 'Modération des utilisateurs'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>

<div class="row container-fluid modComment">
    <h2 class="col-12 center">Modération des utilisateurs </h2>
    <p><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">PRENOM</th>
            <th scope="col">NOM</th>
            <th scope="col">TELEPHONE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ROLE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($users as $user) { 
        ?>
        <tr cope="row">
            <td><?= htmlspecialchars($user->getId()) ?></td>
            <td><?= htmlspecialchars($user->getFirstname()) ?></td>
            <td><?= htmlspecialchars($user->getLastname()) ?></td>
            <td><?= htmlspecialchars($user->getPhone()) ?></td>
            <td><?= htmlspecialchars($user->getEmail()) ?></td>
            <td>           
                <form action="?action=userUpdateRole&id=<?php echo $user->getId() ?>" method="post">
                <select id="role" name="role" onchange="this.form.submit()">
                    <option value="<?= htmlspecialchars($user->getRole()) ?>"><?= htmlspecialchars($user->getRole()) ?></option>
                    <option value="<?php if($user->getRole() == 'admin') { echo 'user'; } else { echo 'admin'; }  ?>"><?php if($user->getRole() == 'admin') { echo 'user'; } else { echo 'admin'; }  ?></option>
                </select>
            </td>

		</form>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>