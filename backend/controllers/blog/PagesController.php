<?php

namespace backend\controllers\blog;

use Yii;
use common\logic\entities\blog\Pages;
use common\logic\entities\search\PagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\logic\services\blog\PagesServices;
use backend\logic\form\blog\PagesForm;
use common\logic\entities\system\Logs;



class PagesController extends Controller
{
    
    private $service;
    
    public function __construct($id, $module, PagesServices $service, $config = [])
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
        ];
    }

    
    public function actionIndex($id = false, $arrow = false)
    {
        $searchModel = new PagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		if($arrow)
			($arrow == 'up') ? $this->service->MoveUp($id) : $this->service->MoveDown($id);
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    public function actionCreate()
    {
        $form = new PagesForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $category = $this->service->create($form);
                return $this->redirect(['view', 'id' => $category->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', ['model' => $form]);
    }
    
    
    public function actionUpdate($id)
    {
        $page = $this->findModel($id);

        $form = new PagesForm($page);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($page->id, $form);
                return $this->redirect(['view', 'id' => $page->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', ['model' => $form]);
    }

    
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

    
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
        	Logs::add('Спроба звернутись до неіснуючої сторінки', __FILE__, 2); //Add log
            throw new NotFoundHttpException('Запитана сторінка не існує.');
        }
    }
    
}
