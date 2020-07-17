<?php if(isset($_SESSION['message'])) { echo '<p>'.$_SESSION['message'].'</p>'; unset($_SESSION['message']);} ?>
<div class="container-fluid name">
    <h1 class="center"> Paul Cottin, Développeur Web</h1></br>
    <p class="center">"N’embauche pas un homme qui fait son travail pour de l’argent, mais celui qui le fait pour l’amour de celui-ci." Henry David Thoreau</p>
</div>
<div class="postbackground">
    <div class="container-fluid center margin-top posts">
        <h2 class=""> Dernières réalisations</h2>
        <div class="row justify-content-center">
            <?php
            foreach($posts as $post) { 
            ?>
                <div class="news col-sm-5 col-md-3">
                    <img src="/public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="Image article" class="img-fluid">
                    <div class="desc">
                        <h3>
                            <?= htmlspecialchars($post->getTitle()) ?>
                        </h3>
                        <p>
                            <?= nl2br(htmlspecialchars($post->getChapo())) ?>
                        </p>
                        <div class="view-comments">
                            <a href="post/<?= $post->getId() ?>" class="btn btn-dark">Voir plus</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <a href="/blog" class="btn btn-dark button margin-top"> VOIR PLUS DE MES RÉALISATIONS </a>
    </div>
</div>
<div class="container-fluid center cv background center margin-top">
    <h2 class="center"> Curriculum Vitae </h2>
    <img src="/public/image/cv.png" alt=""></br>
    <a href="/public/pdf/cv.pdf" class="btn btn-secondary"> Consulter </a>
</div>
<div class="center social-media margin-top">
    <h2 class=""> Réseaux sociaux professionnel</h2>
    <div class="container-fluid row justify-content-center">
        <div class="col-md-2 col-sm-12">
            <a href="https://github.com/Paulcottin1"> <img src="./public/image/github.png" alt=""></br> Voir</a>
        </div>
        <div class="col-md-2 col-sm-12">
            <a href="https://www.linkedin.com/in/paulcottin/"> <img src="./public/image/linkedin.jpg" alt=""></br> Voir</a>
        </div>
        

    </div>

</div>