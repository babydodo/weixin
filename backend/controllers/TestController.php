<?php

namespace backend\controllers;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        mkdir('aaaaaaa');
//        rmdir('aaaaaaa');
        @unlink('../../upload/immigration/135216.jg');
    }

}
