<div>
    <a href="/admin" class="btn btn-dark button back-admin"> Retour au menu d'administration</a>
</div>
<div class="row container-fluid modComment">
    <h2 class="col-12 center">Modération des utilisateurs </h2>
    <p class="col-12 center">Vous pouvez changer le rôle d'un utilisateur</p>
    <p><?php if(isset($_SESSION['message'])) { print $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <table class="table table-responsive-sm">
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
            $userId = $user->getId();
            $userFirstname = $user->getFirstname();
            $userLastname = $user->getLastname();
            $userPhone = $user->getPhone();
            $userEmail = $user->getEmail();
            $userRole = $user->getRole(); ?>
            <tr cope="row">
                <td><?= htmlspecialchars($userId) ?></td>
                <td><?= htmlspecialchars($userFirstname) ?></td>
                <td><?= htmlspecialchars($userLastname) ?></td>
                <td><?= htmlspecialchars($userPhone) ?></td>
                <td><?= htmlspecialchars($userEmail) ?></td>
                <td>           
                    <form action="/?action=userUpdateRole&id=<?= $userId ?>" method="post">
                    <select id="role" name="role" onchange="this.form.submit()">
                        <option value="<?= htmlspecialchars($userRole) ?>"><?= htmlspecialchars($userRole) ?></option>
                        <option value="<?php if($userRole == 'admin') { print 'user'; } else { print 'admin'; }  ?>"><?php if($userRole == 'admin') { print 'user'; } else { print 'admin'; }  ?></option>
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
<div class="full-height">
</div>