<?php
if($numberPages > 1 ) {
?>
    <nav aria-label="" class="paging">
    <ul class="pagination">
        <li class="page-item">
            <a href="<?php echo $paging; ?>/page/1" class="btn btn-dark page-link"> << </a>
        </li>
        <?php 
        if(!empty($_GET['page']) && $_GET['page'] > 1) {
        ?>
            <li class="page-item">
                <a href="<?php echo $paging; ?>/page/<?php echo $_GET['page'] - 1; ?>" class="btn btn-dark page-link"> < </a>
            </li>
        <?php
        }
        for($i = 1; $i <= $numberPages; $i++) { 
        ?> 
            <li class="page-item"><a href="<?php echo $paging; ?>/page/<?php echo $i; ?>" class="page-link btn btn-dark"><?php echo $i; ?></a></li>
        <?php
        }
        if(!empty($_GET['page']) && $_GET['page'] < $numberPages) { 
        ?>
            <li class="page-item">
                <a href="<?php echo $paging; ?>/page/<?php if(!empty($_GET['page'])) { echo $_GET['page'] + 1; } else { echo 2; } ?>" class="btn btn-dark page-link"> > </a>
            </li>
        <?php
        }
        ?>
        <li class="page-item">
            <a href="<?php echo $paging; ?>/page/<?php echo $numberPages; ?>" class="btn btn-dark page-link"> >></a>
        </li>
    </ul>
    </nav>
<?php
}
?> 