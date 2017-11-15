<?php

namespace backend\controllers\system;

use Yii;
use yii\filters\AccessControl;
use common\logic\entities\system\Security;
use common\logic\entities\search\SecuritySearch;
use backend\logic\form\system\SecurityForm;
use common\logic\services\system\SecurityServices;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\logic\entities\system\Logs;

/**
 * SecurityController implements the CRUD actions for Security model.
 */
class SecurityController extends Controller
{
    
    private $service;
    
    public function __construct($id, $module, SecurityServices $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }
    
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
            	'class' => AccessControl::className(),
            	'rules' => [
            		[
	                    'allow' => true,
	                    'roles' => ['super_admin'],
	                ],
            	]
            ]
        ];
    }

    /**
     * Lists all Security models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SecuritySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Security model.
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
     * Creates a new Security model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $form = new SecurityForm();
		if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $security = $this->service->create($form);
                return $this->redirect(['view', 'id' => $security->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', ['model' => $form]);
    }

    /**
     * Updates an existing Security model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $security = $this->findModel($id);

        $form = new SecurityForm($security);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($id, $form);
                return $this->redirect(['view', 'id' => $id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', ['model' => $form]);
    }

    /**
     * Deletes an existing Security model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
            $this->service->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Security model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Security the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Security::find()->where(['id' => $id])->andwhere(['count' => 5])->one()) !== null) {
            return $model;
        } else {
        	Logs::add('Спроба звернутись до неіснуючого заблокованого IP', __FILE__, 2); //Add log
            throw new NotFoundHttpException('Запитана сторінка не існує.');
        }
    }
}
