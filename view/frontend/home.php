<?php $title = 'Mon blog'; ?>
<?php require('template.php'); ?>

<?php ob_start(); ?>

<?php if(isset($_SESSION['message'])) { echo '<p>'.$_SESSION['message'].'</p>'; unset($_SESSION['message']);} ?>
<div class="container-fluid name">
    <h2 class="center"> Paul Cottin, développeur web</h2></br>
    <p class="center">Phrase d'accroche</p>
</div>
<div class="container-fluid center">
    <h3 class=""> Quelques réalisations</h3>
    <div class="row">
        <?php
        foreach($posts as $post) { 
        ?>
            <div class="news col-12 col-sm-6 col-md-3">
                <h3>
                    <?= htmlspecialchars($post->getTitle()) ?>
                </h3>
                <img src="./public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="Image article" class="img-fluid">
                <p>
                    <?= nl2br(htmlspecialchars($post->getChapo())) ?>
                </p>
                <div class="view-comments">
                    <a href="index.php?action=post&amp;id=<?= $post->getId() ?>">Voir les commentaires</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <a href="index.php?action=blog" class="btn btn-secondary button"> Voir plus de mes réalisations </a>
</div>
<div class="container-fluid center cv background">
    <h3 class="center"> Consultez mon curriculum vitae </h3>
    <a href="/Projet5/P5_Blog/public/pdf/cv.pdf" class="btn btn-secondary"> CV </a>
</div>
<div class="center social-media">
    <h3 class=""> Mes reseaux sociaux professionnel</h3>
    <div class="">
        <a href="https://github.com/Paulcottin1"> <img src="./public/image/github.png" alt=""> Github</a>
        <a href="https://www.linkedin.com/in/paulcottin/"> <img src="./public/image/linkedin.jpg" alt=""> Linkedin</a>
    </div>

</div>