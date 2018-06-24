<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        /*    
        $row = 1;
        $grouping = 1; //группировка вариация одного продукта
        $flag = 0; //флаг для $grouping
        $stack = null;
        $department = array();
        $group = array();
        $category = array();
        $product = array();
        $handle = fopen("../../console/files/product.csv", "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if($this->isDepartment($data))
            {
                $department[] = array(
                    'title'=>$this->trimData($data[1]),
                    'id'=>count($department)+1,
                    );
            }
            if($this->isGroup($data))
            {
              $g_d = end($department);
              $group[] = array(
                  'title' =>$this->trimData($data[2]), 
                  'department' => $g_d['title'],
                  'id_department' => count($department),
                  'id' => count($group)+1
                  );  
            }
            if($this->isCategory($data))
            {
              $c_g = end($group);
              $category[] = array(
                  'title'=>$this->trimData($data[3]), 
                  'group'=>$c_g['title'],
                  'id_group'=>count($group),
                  'department'=>end($department), 
                  'id_department'=>count($department),
                  'id'=>count($category)+1
                  );
            }
            if(!empty($data[4]) && empty($data[2]))
            {
              if($this->isProduct($data))
              {
                  if($this->checkStar($data[4]))
                  {
                    $p_d = end($department); 
                    $p_g = end($group);
                    $p_c = end($category);
                    
                    $product[] = array(
                        'id'=>count($product)+1,
                        'title'=>$this->trimData($data[4]), 
                        'group'=>$p_g['title'],
                        'id_group'=>count($group),
                        'department'=>$p_d['title'], 
                        'id_department'=>count($department),
                        'category'=>$p_c['title'],
                        'id_category'=>count($category),
                        'vendor'=>$this->trimData($data[5]),
                        'price'=>$this->trimData($data[6]),
                        'variant_title'=>'',
                        'grouping'=>0,
                        'title'=>$this->trimData($data[4]),
                        'display'=>1, //показывать продукт в каталоге
                        );
                     
                    if($flag) //флаг выхода из группы
                    {
                        $grouping++;
                        $flag = 0;
                    }    
                  }
                  else
                  {
                    if(!$flag)
                        $display = 1;//показывать продукт в каталоге
                    else
                        $display = 0;//не показывать продукт в каталоге
                    $p_d = end($department); 
                    $p_g = end($group);
                    $p_c = end($category);
                    $product[] = array(
                        'id'=>count($product)+1,
                        'group'=>$p_g['title'],
                        'id_group'=>count($group),
                        'department'=>$p_d['title'], 
                        'id_department'=>count($department),
                        'category'=>$p_c['title'],
                        'id_category'=>count($category),
                        'vendor'=>$this->trimData($data[5]),
                        'price'=>$this->trimData($data[6]),                
                        'variant_title'=>trim($data[4]),
                        'grouping'=>$grouping,
                        'title'=>$this->trimData($stack), 
                        'display'=>$display,
                        'br'=>'</br>',
                        );
                    $flag = 1; //флаг захода в группу
                  }

              }
              else 
              {
                  $stack = $data[4];
                  if($flag) //флаг выхода из группы
                    {
                        $grouping++;
                        $flag = 0;
                    }  
              }
            }
            $row++;
        }
        print_r($product);
        fclose($handle);
        */
        return $this->render('index');
    }
    
    protected function trimData($data)
    {
        return str_replace("*", "", trim($data," \t\n\r\0\x0B"));
    }
    
    protected function checkStar($data)
    {
        $data = trim($data);
        if($data[0] == "*")
            return true;
        else
            return false;
    }
    
    protected function isProduct($data)
    {
        if(!(empty($data[5]) && empty($data[6])))
            return true;
        else
            return false;
    }
    
    protected function isDepartment($data)
    {
        if(!empty($data[1]) && empty($data[2]))
            return true;
        else
            return false;
    }
    
    protected function isGroup($data)
    {
        if(!empty($data[2]) && empty($data[3]))
            return true;
        else
            return false; 
    }
    
    protected function isCategory($data)
    {
        if(!empty($data[3]) && empty($data[2]))
            return true;
        else
            return false; 
        
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
