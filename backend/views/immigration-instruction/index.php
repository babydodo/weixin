<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use shmilyzxt\kartikcrud\CrudAsset;
use shmilyzxt\kartikcrud\BulkButtonWidget;
use shmilyzxt\kartikcrud\ShmilyzxtHelper;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImmigrationInstructionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '移民介绍';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="immigration-instruction-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id'           => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
//            'pjax'         => true,
            'condensed'    => true,
            'hover'        => true,
            'bordered'     => false,

            // 布局设定
            'panel' => [
                'type'    => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> 移民介绍列表',
                'before'  => BulkButtonWidget::widget([
                    'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; 删除选中项', ['bulk-delete'], [
                        'class'                => 'btn btn-danger',
                        'role'                 => 'modal-remote-bulk',
                        'data-confirm'         => false,
                        'data-method'          => false,   // 覆盖Yii默认实现的方法
                        'data-request-method'  => 'post',
                        'data-confirm-title'   => '确认操作',
                        'data-confirm-message' => '你确定要执行删除操作吗？'
                    ]),
                ]),
                'after' => false,
            ],

            // 工具组件
            'toolbar' => [
                [
                    'content' =>
                        Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                            'title' => '添加移民介绍',
                            'class' => 'btn btn-default'
                        ])
                        .Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], [
                            'data-pjax' => true,
                            'class'     => 'btn btn-default',
                            'title'     => '重置'
                    ])
                    .'{toggleData}'
                    .'{export}'
                ],
            ],

            // 主体内容
            'columns' => [
                // 复选框列
                [
                    'class' => 'kartik\grid\CheckboxColumn',
                    'width' => '40px',
                ],

                // 序号列
                [
                    'class' => 'kartik\grid\SerialColumn',
                ],

                // 数据列
                [
                    'attribute' => 'country_name',
                    // 'label'  => 'country_name',
                ],
//                [
//                    'attribute' => 'image',
//                    // 'label'  => 'image',
//                ],
                [
                    'attribute' => 'sort',
                    // 'label'  => 'sort',
                ],
                'created_at:datetime',
                'updated_at:datetime',

                // 动作列按钮设定
                [
                    'class' => 'kartik\grid\ActionColumn', 'header' => '操作',
                    'template' => ShmilyzxtHelper::filterActionColumn(['view', 'update', 'delete']),
//                    'template' => Helper::filterActionColumn('{view} {update} {delete}'),

                    // 额外自定义按钮
                    // 'buttons'  => [
                    //    'audit' => function($url, $model) {
                    //        $options = [
                    //            // 可参照'deleteOptions'写
                    //        ];
                    //        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                    //    },
                    // ],

                    'viewOptions'   => ['role'=>'modal-remote', 'title'=>'查看', 'data-toggle' =>'tooltip'],
//                    'updateOptions' => ['role'=>'modal-remote', 'title'=>'更新', 'data-toggle' =>'tooltip'],
                    'deleteOptions' => [
                        'role'                  => 'modal-remote',
                        'title'                 => '删除',
                        'data-confirm'          => false,
                        'data-method'           => false, // 覆盖yii默认实现的方法
                        'data-request-method'   => 'post',
                        'data-toggle'           => 'tooltip',
                        'data-confirm-title'    => '确认操作',
                        'data-confirm-message'  => '你确定要删除该记录吗？'
                    ],
                ],
            ],
        ])?>
    </div>
</div>

<!-- modal框 -->
<?php Modal::begin([
    'id'      => 'ajaxCrudModal',
    'footer'  => '', // 请不要删除
    'options' => [
        'data-backdrop' => 'static', // 点击空白处不隐藏
    ],
])?>
<?php Modal::end(); ?>

<?php CrudAsset::register($this); ?>


