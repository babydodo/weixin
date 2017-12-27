<?php

namespace backend\controllers;

use backend\models\ImmigrationInstructionSearch;
use Yii;
use common\models\ImmigrationInstruction;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * ImmigrationInstruction 模型控制器.
 */
class ImmigrationInstructionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete'      => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * 首页（显示记录列表）ImmigrationInstruction.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new ImmigrationInstructionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 查看详情 ImmigrationInstruction.
     * @param integer $id
     * @return mixed
     * @throws \Exception
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title'   => '移民介绍',
                'size'    => 'large',
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('<i class="glyphicon glyphicon-ban-circle"></i> 关闭', [
                    'class'        => 'btn btn-danger',
                    'data-dismiss' => 'modal',
                ])
            ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * 插入一条记录 ImmigrationInstruction.
     * 只允许Ajax请求
     * @return mixed
     * @throws \Exception
     */
    public function actionCreate()
    {
        $model   = new ImmigrationInstruction();
        $model->sort = 0;

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->image = UploadedFile::getInstance($model, 'image');

            //文件上传存放的目录
            // '../../upload/'
//            $dir = '.'.Yii::getAlias('@upload/immigration');
            $dir = '../../upload/immigration';
//            echo $dir;die;
            if (!is_dir($dir))
                mkdir($dir, '0777', true);
            if ($model->validate()) {
                //文件名
                $fileName = date('His') . '.' . $model->image->extension;
                $dir = $dir.'/'. $fileName;
                $model->image->saveAs($dir);
                $model->image = $fileName;
//                var_dump($model);die;
                if($model->save(false)) {
                    Yii::$app->getSession()->setFlash('info', '添加成功...');
                    return $this->redirect(['index']);
                }

            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * 修改记录：ImmigrationInstruction .
     * 只允许Ajax请求
     * @param integer $id
     * @return mixed
     * @throws \Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost) {
            $model->setScenario('update');
            $image = $model->image; // 临时保存image的值
            $model->load(Yii::$app->request->post());

            // 如果有文件上传
            if(!empty($_FILES['ImmigrationInstruction']['name']['image'])) {
                // 保存上传文件
                $model->image = UploadedFile::getInstance($model, 'image');
                $dir = '../../upload/immigration'; // 文件上传存放的目录
                if (!is_dir($dir))
                    mkdir($dir, '0777', true);
                $fileName = date('Ymd-His') . '.' . $model->image->extension;
                $dir = $dir.'/'. $fileName;
                if($model->image->saveAs($dir)) {
                    // 删除旧的图片
                    @unlink('../../upload/immigration/'.$image);
                };
                $model->image = $fileName;

            } else {
                $model->image = $image;
            }

            if ($model->save()) {
                Yii::$app->getSession()->setFlash('info', '更新成功...');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 删除记录 ImmigrationInstruction (从列表删除，删除后刷新列表页面).
     * @param integer $id
     * @return mixed
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // 删除旧的图片
        @unlink('../../upload/immigration/'.$model->image);
        $model->delete();

        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceClose'  => true,
                'forceReload' => '#crud-datatable-pjax'
            ];
        }else{
            return $this->redirect(['index']);
        }

    }

    /**
     * 批量删除记录 ImmigrationInstruction.
     * @return mixed
     * @throws \Exception
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks     = explode(',', $request->post( 'pks' ));
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            // 删除旧的图片
            @unlink('../../upload/immigration/'.$model->image);
            $model->delete();
        }

        if($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceClose'  => true,
                'forceReload' => '#crud-datatable-pjax'
            ];
        } else {
            return $this->redirect(['index']);
        }
       
    }

    /**
     * 根据 ImmigrationInstruction 模型主键查询一行记录.
     * 如果记录不存在, 抛出404异常.
     * @param integer $id
     * @return ImmigrationInstruction
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = ImmigrationInstruction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('页面不存在~');
        }
    }
}
