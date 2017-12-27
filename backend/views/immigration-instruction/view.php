<?php

use kartik\detail\DetailView;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ImmigrationInstruction */
?>

<div class="immigration-instruction-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                // 'label' => 'ID',
            ],
            [
                'attribute' => 'country_name',
                // 'label' => '国家名称',
            ],
            [
                'attribute' => 'image',
                'label' => '图片',
                'format' => 'raw',
                'value' => Html::img(\yii\helpers\Url::to('@upload/immigration/').$model->image, ['width' => 200]),
//                'attribute' => 'image',
                // 'label' => '图片地址',
            ],
            [
                'attribute' => 'content',
                'format' => 'html',
            ],
            [
                'attribute' => 'sort',
                // 'label' => '排序',
            ],
//            [
//                'attribute' => 'created_at:datetime',
//                // 'label' => '创建时间',
//            ],
//            [
//                'attribute' => 'updated_at:datetime',
//                // 'label' => '修改时间',
//            ],
        ],
    ]) ?>

</div>