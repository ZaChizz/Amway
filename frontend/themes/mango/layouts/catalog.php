<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;
use frontend\widgets\OfferByProduct;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    
    <?= Html::csrfMetaTags() ?>
    
    <?php $this->head() ?>
    <meta http-equiv="content-type" content="text/html; charset= <?= Yii::$app->charset ?>" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui"/>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
    <!--[if IE 9]>
        <link href="css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon-2.ico" />
    <title><?= Html::encode($this->title) ?></title>

</head>
<body class="style-10">
    <?php $this->beginBody() ?>
    
    <?= $this->render('//layouts/loader') ?>

    <div id="content-block">
        <div class="content-center fixed-header-margin">
            <?= $this->render('//layouts/header') ?>            
            <div class="content-push">
                <div class="breadcrumb-box">
                    <?= Breadcrumbs::widget([
                        'itemTemplate' => "{link}\n",
                        'tag' => '',
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'homeLink' => [
                                    'label' => 'Главная',
                                    'url' => ['site/index'],
                                    'template' => "{link}\n", // template for this link only
                                ]
                    ]) ?>
                </div>

                <?= $content ?>

        
                <?= OfferByProduct::widget([
                    'type'=>'colomns',

                ])
            ?>
                <?= $this->render('//layouts/footer') ?>
            </div>
        </div>        
    </div>
    
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

