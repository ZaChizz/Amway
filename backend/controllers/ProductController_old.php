<?php

namespace backend\controllers;

use Yii;
use backend\models\product;
use backend\models\ProductImage;
use backend\models\ProductSearch;
use backend\models\ProductImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\imagine\Image;

/**
 * ProductController implements the CRUD actions for product model.
 */
class ProductController extends Controller
{
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
     * Lists all product models.
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
     * Displays a single product model.
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
     * Creates a new product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $searchModel = new ProductImageSearch();
        $dataProvider = $searchModel->search(['ProductImageSearch' =>['id_product' =>$id]]);
                
        $model = $this->findModel($id);
        
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
            ]);
        }
    }

    /**
     * Deletes an existing product model.
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
     * Finds the product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private function findAllModel($id=0)
    {
        if($id)
        {
            if (($model = product::find()->where(['id_department' => $id])->all()) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
        else {
            if (($model = product::find()->all()) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }
    
    protected function cropper($filename)
    {
        Image::thumbnail('img/temp/'.$filename, 210, 290)
            ->save('../../img/210/'.$filename, ['jpeg_quality' => 50]);
        Image::thumbnail('img/temp/'.$filename, 570, 765)
            ->save('../../img/570/'.$filename, ['jpeg_quality' => 50]);
    }
    
    public function actionImageDelete($name)
    {
        $directory = Yii::getAlias('@backend/web/img/temp') . DIRECTORY_SEPARATOR . Yii::$app->session->id;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }

        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file) {
            $fileName = basename($file);
            $path = '@backend/web/img/temp' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
            $output['files'][] = [
                'name' => $fileName,
                'size' => filesize($file),
                'url' => $path,
                'thumbnailUrl' => $path,
                'deleteUrl' => 'product/image-delete?name=' . $fileName,
                'deleteType' => 'POST',
            ];
        }
        return Json::encode($output);
    }
    
    public function actionImageImport()
    {   
        $models = $this->findAllModel();
        foreach($models as $model)
        {
            $uid = uniqid(time(), true);
            $Newfilename = $uid . '.' .'jpeg';
            $filename = $model->vendor_code.'_';
            if($this->cropperImport($filename,$Newfilename))
            {
                $modelImage = new ProductImage();
                $modelImage->id_product = $model->id;
                $modelImage->title = $Newfilename;
                $modelImage->save();                    
            }
            else
            {
                $uid = uniqid(time(), true);
                $Newfilename = $uid . '.' .'jpeg';
                $filename = $model->vendor_code;
                if($this->cropperImport($filename,$Newfilename))
                {
                    $modelImage = new ProductImage();
                    $modelImage->id_product = $model->id;
                    $modelImage->title = $Newfilename;
                    $modelImage->save();                    
                }
                
            }
            $uid = uniqid(time(), true);
            $Newfilename = $uid . '.' .'jpeg';
            $filename = $model->vendor_code.'_1';
            if($this->cropperImport($filename,$Newfilename))
            {
                $modelImage = new ProductImage();
                $modelImage->id_product = $model->id;
                $modelImage->title = $Newfilename;
                $modelImage->save();                    
            }
            $uid = uniqid(time(), true);
            $Newfilename = $uid . '.' .'jpeg';
            $filename = $model->vendor_code.'_2';
            if($this->cropperImport($filename,$Newfilename))
            {
                $modelImage = new ProductImage();
                $modelImage->id_product = $model->id;
                $modelImage->title = $Newfilename;
                $modelImage->save();                    
            }
            $uid = uniqid(time(), true);
            $Newfilename = $uid . '.' .'jpeg';
            $filename = $model->vendor_code.'_3';
            if($this->cropperImport($filename,$Newfilename))
            {
                $modelImage = new ProductImage();
                $modelImage->id_product = $model->id;
                $modelImage->title = $Newfilename;
                $modelImage->save();                    
            }
            
        }
        
        return $this->render('importSuccess');
    }
    
    private function cropperImport($filename,$Newfilename)
    {
        
        $path = '../../img/import/';
        $ext1='.jpeg';
        $ext2='.jpg';
        $ext3='';
        if(file_exists($path.$filename.$ext1))
        {
            Image::thumbnail('../../img/import/'.$filename.$ext1, 210, 290)
                ->save('../../img/210/'.$Newfilename, ['jpeg_quality' => 50]);
            Image::thumbnail('../../img/import/'.$filename.$ext1, 570, 765)
                ->save('../../img/570/'.$Newfilename, ['jpeg_quality' => 50]);
            return true;
        }
        elseif(file_exists($path.$filename.$ext2))
        {
            Image::thumbnail('../../img/import/'.$filename.$ext2, 210, 290)
                ->save('../../img/210/'.$Newfilename, ['jpeg_quality' => 50]);
            Image::thumbnail('../../img/import/'.$filename.$ext2, 570, 765)
                ->save('../../img/570/'.$Newfilename, ['jpeg_quality' => 50]);
            return true;
        }
        elseif(file_exists($path.$filename.$ext3))
        {
            Image::thumbnail('../../img/import/'.$filename.$ext3, 210, 290)
                ->save('../../img/210/'.$Newfilename, ['jpeg_quality' => 50]);
            Image::thumbnail('../../img/import/'.$filename.$ext3, 570, 765)
                ->save('../../img/570/'.$Newfilename, ['jpeg_quality' => 50]);
            return true;
        }
        else
            return false;
    }
}
