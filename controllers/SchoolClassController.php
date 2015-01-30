<?php

namespace app\controllers;

use Yii;
use app\models\SchoolClass;
use app\models\SchoolClassSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;

/**
 * SchoolClassController implements the CRUD actions for SchoolClass model.
 */
class SchoolClassController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SchoolClass models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolClassSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SchoolClass model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SchoolClass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SchoolClass();
                
        if ($model->load(Yii::$app->request->post())){            
                
            $valid = $model->validate();
                        
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {            
                    if ($flag = $model->save(false)) {
                    
                        if ($flag) {
                            $transaction->commit();
                            Yii::$app->session->setFlash('success', yii::t('app', 'Created <i>{attribute}</i> successfully', ['attribute' => $model->cl_name]));
                            return $this->redirect(['view', 'id' => $model->cl_id]);
                        }                
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
        }
            else{
                Yii::$app->session->setFlash('danger', yii::t('app', 'There are validation errors in your form. Please check your input details.'));
            }   
        }
        return $this->render('create', [
            'model' => $model,
            
        ]);
        
        
        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cl_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        */
    }

    /**
     * Updates an existing SchoolClass model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
                
        if ($model->load(Yii::$app->request->post())){            
                
            $valid = $model->validate();
                        
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                    
                
                    if ($flag) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', yii::t('app', 'Saved <i>{attribute}</i> successfully', ['attribute' => $model->cl_name]));
                        return $this->redirect(['view', 'id' => $model->cl_id]);
                    }                
                }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
        }
            else{
                Yii::$app->session->setFlash('danger', yii::t('app', 'There are validation errors in your form. Please check your input details.'));
            }   
        }
        return $this->render('update', [
            'model' => $model,
            
        ]);
        
    }

    /**
     * Deletes an existing SchoolClass model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SchoolClass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SchoolClass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
