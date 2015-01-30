<?php

namespace app\controllers;

use Yii;
use app\models\SchoolCls;
use app\models\SchoolClsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;

/**
 * SchoolClsController implements the CRUD actions for SchoolCls model.
 */
class SchoolClsController extends Controller
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
     * Lists all SchoolCls models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolClsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SchoolCls model.
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
     * Creates a new SchoolCls model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SchoolCls();
        $studentMods = [];
        
        if ($model->load(Yii::$app->request->post())){            
            
            $studentMods = Model::createMultiple(\app\models\Student::classname(), $studentMods);
            Model::loadMultiple($studentMods, Yii::$app->request->post());
            
                
            $valid = $model->validate();
                        $valid = Model::validateMultiple($studentMods) && $valid;
                        
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {            
                    if ($flag = $model->save(false)) {
                                   
                        foreach ($studentMods as $studentMod) {
                            $studentMod->st_class_id = $model->cl_id;
                            if (!($flag = $studentMod->save(false))) {
                                break;
                            }
                        }                
                    
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
            'studentMods' => $studentMods,

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
     * Updates an existing SchoolCls model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $studentMods = $model->students;
        
        if ($model->load(Yii::$app->request->post())){            
                    $oldstudentIDs = \yii\helpers\ArrayHelper::map($studentMods, 'st_id', 'st_id');
            $studentMods = Model::createMultiple(\app\models\Student::classname(), $studentMods);
            Model::loadMultiple($studentMods, Yii::$app->request->post());
            $deletedstudentIDs = array_diff($oldstudentIDs, array_filter(\yii\helpers\ArrayHelper::map($studentMods, 'st_id', 'st_id')));
            
                
            $valid = $model->validate();
                        $valid = Model::validateMultiple($studentMods) && $valid;
                        
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                                        if (! empty($deletedstudentIDs)) {
                        \app\models\Student::deleteAll(['st_id' => $deletedstudentIDs]);
                    }                
                    foreach ($studentMods as $studentMod) {
                        if (!($flag = $studentMod->save(false))) {
                            break;
                        }
                    }                
                    
                
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
            'studentMods' => $studentMods,

        ]);
        
    }

    /**
     * Deletes an existing SchoolCls model.
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
     * Finds the SchoolCls model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SchoolCls the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolCls::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
