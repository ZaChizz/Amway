<?php

namespace backend\controllers;

use Yii;
use backend\models\product;
use backend\models\Department;
use backend\models\Category;
use backend\models\ProductImage;
use backend\models\ProductSearch;
use backend\models\ProductImageSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

use yii\filters\VerbFilter;

use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

use yii\imagine\Image;



/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    
    protected $items;
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $searchModel = new ProductImageSearch();
        $dataProvider = $searchModel->search(['ProductImageSearch' =>['id_product' =>$id]]);
                
        $model = $this->findModel($id);
        
        $this->loadDepartment();
        $this->loadGroup();
        $this->loadCategory();
        
        $modelImage = new ProductImage();
                
        $imageFile = UploadedFile::getInstance($modelImage, 'title');

        $directory = Yii::getAlias('@backend/web/img/temp') . DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = 'img/temp' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                $modelImage->id_product = $id;
                $modelImage->title = $fileName;
                if($modelImage->save())
                {
                    $this->cropper($fileName);
                    return Json::encode([
                        'files' => [
                            [
                                'name' => $fileName,
                                'size' => $imageFile->size,
                                'url' => $path,
                                'thumbnailUrl' => $path,
                                'height' => 100,
                                'deleteUrl' => 'index.php?r=product%2Fimage-delete&name=' . $fileName,
                                'deleteType' => 'POST',
                            ],
                        ],
                    ]);
                }

            }
        }
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model, 
                'modelImage' => $modelImage,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'items'=>$this->items
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionAjaxCategory($id)
    {

        if (Yii::$app->request->isAjax) {
            if($this->loadCategory($id))
            {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'category' => $this->items['category'],
                ];
            }
            else
                return false;
        }
        else
            return false;
  
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function loadDepartment()
    {
        $this->items['department'] = Department::find()->all();

        return true;
    }

    protected function loadGroup()
    {
        foreach($this->items['department'] as $model)
        {
            $this->items['group'][$model->title] = ArrayHelper::map($model->groups, 'id', 'title');
        }
        return true;
    }
    
    protected function loadCategory($id = false)
    {
         if($id){
             $arr = Category::find()->where(['id_group' => $id])->asArray()->all();
             $arr = array_reverse($arr);
             foreach($arr as $value)
             {
                 $this->items['category'][] = array($value['id']=>$value['title']);
             }
             return true;
         }
        else {
            $this->items['category'] = Category::find()->all();
            return true;
        }
    }
    
}
