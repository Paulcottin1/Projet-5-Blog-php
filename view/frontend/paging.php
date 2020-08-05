<?php
if($numberPages > 1 ) {
?>
    <nav aria-label="" class="paging">
    <ul class="pagination">
        <li class="page-item">
            <a href="<?php print $paging; ?>/page/1" class="btn btn-dark page-link"> << </a>
        </li>
        <?php 
        if(!empty($_GET['page']) && $_GET['page'] > 1) {
        ?>
            <li class="page-item">
                <a href="<?php print $paging; ?>/page/<?php print $_GET['page'] - 1; ?>" class="btn btn-dark page-link"> < </a>
            </li>
        <?php
        }
        for($i = 1; $i <= $numberPages; $i++) { 
        ?> 
            <li class="page-item"><a href="<?php print $paging; ?>/page/<?php print $i; ?>" class="page-link btn btn-dark"><?php print $i; ?></a></li>
        <?php
        }
        if(!empty($_GET['page']) && $_GET['page'] < $numberPages) { 
        ?>
            <li class="page-item">
                <a href="<?php print $paging; ?>/page/<?php if(!empty($_GET['page'])) { print $_GET['page'] + 1; } else { print 2; } ?>" class="btn btn-dark page-link"> > </a>
            </li>
        <?php
        }
        ?>
        <li class="page-item">
            <a href="<?php print $paging; ?>/page/<?php print $numberPages; ?>" class="btn btn-dark page-link"> >></a>
        </li>
    </ul>
    </nav>
<?php
}
?> 