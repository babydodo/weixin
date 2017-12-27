<?php

namespace frontend\controllers;

use common\models\ImmigrationInstruction;

class ImmigrationController extends \yii\web\Controller
{
    /**
     * 移民介绍
     * @return string
     */
    public function actionIndex()
    {
        $model = ImmigrationInstruction::find()
            ->orderBy(['sort'=>SORT_DESC, 'updated_at'=>SORT_DESC])
            ->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * 详情页
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $model = ImmigrationInstruction::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
