<?php

/* @var $this yii\web\View */
/* @var $model \common\models\ImmigrationInstruction[] */

use yii\helpers\Url;

$this->title = '移民介绍';
?>

<div class="portfolio app-section app-pages">
    <div class="container">
        <div class="pages-title">
            <h3>移民介绍</h3>
        </div>
<!--        <ul class="portfolio-filter">-->
<!--            <li data-filter="all" class="active">全部</li>-->
<!--            <li data-filter="1">Nature</li>-->
<!--            <li data-filter="2">Abstract</li>-->
<!--            <li data-filter="3">Objects</li>-->
<!--        </ul>-->
        <div class="portfolio-item">

            <?php
            $i = 0;
            foreach($model as $item):
                if($i%2 == 0): ?><div class="row"><?php endif;?>
                    <div class="col s6 filtr-item" data-category="1, 2">
                        <a href="<?= Url::to(['view', 'id'=>$item->id]) ?>">
                            <img src="<?= Url::to('@upload/immigration/').$item->image ?>">
                        </a>
                    </div>
               <?php if($i%2 == 1): ?></div><?php endif;?>
            <?php $i++;endforeach; ?>

            <?php if($i%2 == 1): ?></div><?php endif;?>

        </div>
    </div>
</div>
