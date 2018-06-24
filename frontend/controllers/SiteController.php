<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;

use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\data\ActiveDataProvider;

use common\models\LoginForm;

use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\SearchForm;
use frontend\models\ShoppingCart;
use frontend\models\ProductSearch;
use frontend\models\Product;
use frontend\models\Order;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    protected $session;
    
    public function beforeAction($action)
    {
        $this->session = Yii::$app->session;
        $this->enableCsrfValidation = false;
        Yii::$app->params['offers']['dataProvider'] = 0;
        Yii::$app->params['department']['model'] = 0;
        Yii::$app->params['shoppingCart'] = $this->session->get('shoppingCart');
        Yii::$app->params['shoppingCartTotal'] = $this->session->get('shoppingCartTotal');
        if(empty(Yii::$app->params['shoppingCartTotal']))
            Yii::$app->params['shoppingCartTotal'] = 0;

        return parent::beforeAction($action);
    }
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "index";
        return $this->render('index');
    }
    
    public function actionSearch()
    {
        
        $model = new SearchForm;
        
        if($model->load(Yii::$app->request->post())){
            if($model->validate())
                return $this->redirect(['site/catalog',
                    'ProductSearch[description]'=>$model->query, 
                    'ProductSearch[title]'=>$model->query,
                //    'ProductSearch[short_description]'=>$model->query,
                //    'ProductSearch[variant_title]'=>$model->query,
                    'ProductSearch[id_department]'=>1]);
                
        }
        else
        {
            return $this->redirect(Yii::$app->request->referrer);
        }
        
       
    }
    
    public function actionCatalog()
    {
        $this->layout = "catalog";
        
        $searchModel = new ProductSearch();

        if ($searchModel->load(Yii::$app->request->queryParams)) {
                Yii::$app->params['filter'] = $searchModel->search(Yii::$app->request->queryParams);
 
        }
        else
        {
            $query = Product::find();

            // add conditions that should always apply here

            Yii::$app->params['filter'] = new ActiveDataProvider([
                 'query' => $query,
                 'pagination' => [
                     'pageSize' => 12,
                 ],
                 'sort' => [
                     'defaultOrder' => [
                         'created_at' => SORT_DESC,
                         'title' => SORT_ASC, 
                     ]
                 ],
            ]);
        }
      
        return $this->render('catalog', [
                    'dataProvider' => Yii::$app->params['filter'],
        ]);
        
    }
    
    public function actionProduct($id)
    {
        $this->layout = "catalog";
        $shoppingCart = new ShoppingCart;
        return $this->render('product', [
            'model' => $this->findProductModel($id),
            'shoppingCart' => $shoppingCart->initialized($id)
        ]);
    }

    public function actionShoppingCart()
    {
        $this->layout = "catalog";
        
        $model = new Order();
        $model->display = Order::STATUS_NEW;
        $model->shopping_cart = json_encode(Yii::$app->params['shoppingCart']);
        $model->created_at = time();
        $model->updated_at = time();
        
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $this->clearCart();
             return $this->render('order',[
            'model'=>$model,
            ]);
        }
        else
        {
            return $this->render('shoppingCart',[
                'shoppingCart'=>Yii::$app->params['shoppingCart'],
                'model'=>$model,
                'total'=>Yii::$app->params['shoppingCartTotal']]
            );
        }
    }

    public function actionAdCart()
    {
        $model = new ShoppingCart;
        if($model->load(Yii::$app->request->post())&&$model->validate())
        {
                       
            $product = Product::findOne(['id'=>$model->id]);
            if(!$this->setCart($product,$model->id,$model->amt))
                Yii::$app->session->setFlash('error', 'Ошибка карзины!!!');

            $this->getTotal();

            $this->session->set('shoppingCart',Yii::$app->params['shoppingCart']);
            $this->session->set('shoppingCartTotal',Yii::$app->params['shoppingCartTotal']);
            return $this->redirect(['site/shopping-cart']);
        }

    }

    private function getTotal()
    {
        $total = 0;
        foreach(Yii::$app->params['shoppingCart'] as $value)
        {
            $total += $value['price']*$value['count'];
        }
        Yii::$app->params['shoppingCartTotal'] = $total;

        return true;

    }

    private function setCart($model,$id,$amt=1)
    {
        if(isset($model->images[0]))
        {
            $img = $model->images[0]->title;
        }
        else
            $img = false;
        Yii::$app->params['shoppingCart'][$id] = array(
            'title'=>$model->title, 
            'count'=>$amt, 
            'price'=>$model->priceCurrent, 
            'department'=>$model->department->title, 
            'vendor_code'=>$model->vendor_code,
            'brand'=>$model->brand,
            'id'=>$model->id,
            'img'=>$img);
    }
    
    private function clearCart()
    {
        Yii::$app->params['shoppingCart'] = $this->session->get('shoppingCart');
        foreach(Yii::$app->params['shoppingCart'] as $key=>$value)
        {
            unset(Yii::$app->params['shoppingCart'][$key]);
            $this->session->set('shoppingCart',Yii::$app->params['shoppingCart']);
            $this->getTotal();
            $this->session->set('shoppingCartTotal',Yii::$app->params['shoppingCartTotal']);
        }
        return true;
    }


    public function actionDeleteCart($id)
    {
        Yii::$app->params['shoppingCart'] = $this->session->get('shoppingCart');
        if(isset(Yii::$app->params['shoppingCart'][$id]))
        {
            unset(Yii::$app->params['shoppingCart'][$id]);
            $this->session->set('shoppingCart',Yii::$app->params['shoppingCart']);
            $this->getTotal();

            $this->session->set('shoppingCartTotal',Yii::$app->params['shoppingCartTotal']);

        }
        return $this->redirect(['site/shopping-cart']);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    protected function findProductModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAjaxCartCountPlus($id)
    {
        if (Yii::$app->request->isAjax) {
            if(isset(Yii::$app->params['shoppingCart'][$id]))
            {
                Yii::$app->params['shoppingCart'][$id]['count']+=1;
                $this->session->set('shoppingCart',Yii::$app->params['shoppingCart']);
                $this->getTotal();
                $this->session->set('shoppingCartTotal',Yii::$app->params['shoppingCartTotal']);
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'total' => Yii::$app->params['shoppingCartTotal'],
                    'subtotal' => Yii::$app->params['shoppingCart'][$id]['count']*Yii::$app->params['shoppingCart'][$id]['price']
                ];
            }
            else
                return false;
        }
    }

    public function actionAjaxCartCountMinus($id)
    {
        if (Yii::$app->request->isAjax) {
            if(isset(Yii::$app->params['shoppingCart'][$id]))
            {
                Yii::$app->params['shoppingCart'][$id]['count']-=1;
                $this->session->set('shoppingCart',Yii::$app->params['shoppingCart']);
                $this->getTotal();
                $this->session->set('shoppingCartTotal',Yii::$app->params['shoppingCartTotal']);
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'total' => Yii::$app->params['shoppingCartTotal'],
                    'subtotal' => Yii::$app->params['shoppingCart'][$id]['count']*Yii::$app->params['shoppingCart'][$id]['price']
                ];
            }
            else
                return false;
        }
    }

    public function actionAjaxCartDelete($id)
    {
        if (Yii::$app->request->isAjax) {
            if(isset(Yii::$app->params['shoppingCart'][$id]))
            {
                unset(Yii::$app->params['shoppingCart'][$id]);
                $this->session->set('shoppingCart',Yii::$app->params['shoppingCart']);
                $this->getTotal();
                $this->session->set('shoppingCartTotal',Yii::$app->params['shoppingCartTotal']);
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'total' => Yii::$app->params['shoppingCartTotal'],
                ];
            }
            else
                return false;
        }

    }
}
