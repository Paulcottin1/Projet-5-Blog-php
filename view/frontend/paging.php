<div class="row paging">
        <a href="<?php echo $paging; ?>/page/1" class="btn btn-dark col-2"> <<</a>
        <?php if(!empty($_GET['page']) && $_GET['page'] > 1) { ?>
            <a href="<?php echo $paging; ?>/page/<?php echo $_GET['page'] - 1; ?>" class="btn btn-dark col-1"> < </a>
        <?php } 
        for($i = 1; $i <= $numberPages; $i++) {
            ?> <a href="<?php echo $paging; ?>/page/<?php echo $i; ?>" class="btn btn-dark col-1"><?php echo $i; ?></a> <?php
        }
        if(!empty($_GET['page']) && $_GET['page'] < $numberPages) { ?>
            <a href="<?php echo $paging; ?>/page/<?php if(!empty($_GET['page'])) { echo $_GET['page'] + 1; } else { echo 2; } ?>" class="btn btn-dark col-1"> > </a>
        <?php } ?>
        <a href="<?php echo $paging; ?>/page/<?php echo $numberPages; ?>" class="btn btn-dark col-2"> >></a>
</div>