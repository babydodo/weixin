<?php

use common\models\ImmigrationInstruction;
use kartik\form\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ImmigrationInstruction */
/* @var $form kartik\form\ActiveForm */

$this->title = '新增-移民介绍';
$this->params['breadcrumbs'][] = ['label'=>'移民介绍列表', 'url'=>['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="immigration-instruction-create">
    <div class="immigration-instruction-form">

        <?php $form = ActiveForm::begin([
                'type' => 'horizontal',
                'options' => [
                    'enctype' => 'multipart/form-data'
                ]
        ]); ?>

            <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                'options' => ['multiple' => false],
                'pluginOptions' => [
                    'showUpload' => false,
                ]
            ]) ?>

            <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'minHeight' => 500,
                    'imageManagerJson' => ['/redactor/upload/image-json'],
                    'imageUpload' => ['/redactor/upload/image'],
                    'fileUpload' => ['/redactor/upload/file'],
                    'lang' => 'zh_cn',
                    'plugins' => ['fontcolor','imagemanager'],
                ]
            ]) ?>

            <?= $form->field($model, 'sort')->input('number') ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-primary">提交</button>
                    <button type="reset" class="btn btn-danger">重置</button>
                </div>
            </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

