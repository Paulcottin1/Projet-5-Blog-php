<div class="row title-blog-page justify-content-center">
    <h1 class="col">Mes réalisations</h1>
</div>
<div class="postbackground center">
    <div class ="posts">
        <p class="postp center"> Décourvrez les projets auxquels j'ai donné mon coeur à l'ouvrage ! </p>
        <div class="row justify-content-center">
                <?php
                foreach($posts as $post) { ?>
                    <div class="news col-sm-6 col-md-6 col-lg-3">
                        <img src="/public/image/<?= htmlspecialchars($post->getImg())  ?>" alt="Image article" class="img-fluid">
                        <div class="desc">
                            <h3>
                                <?= htmlspecialchars($post->getTitle()) ?>
                            </h3>
                            <p>
                                <?= nl2br(htmlspecialchars($post->getChapo())) ?>
                            </p>
                            <div class="view-comments">
                                <a href="/post/<?= $post->getId() ?>" class="btn btn-dark">Voir plus</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
    </div>
</div>