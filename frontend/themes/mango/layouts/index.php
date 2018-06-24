<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\InfoBlocks;
use frontend\widgets\ShoppingCart;
use frontend\widgets\ProductPopup;
use frontend\widgets\SearchPopup;

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
<body class="style-9">
    <?php $this->beginBody() ?>

    <?= $this->render('//layouts/loader') ?>

    <div id="content-block">
        
        <?= $this->render('//layouts/headerFullWidth') ?>
        
        <div class="content-push">
            <div class="wide-center fixed-header-margin">
                <?= $content ?>
            </div>       
            <?= $this->render('//layouts/footerSimple') ?>
        </div>

    </div>
    
    <?= SearchPopup::widget([
        
    ]);?>
    
    
    <?= ShoppingCart::widget([
        ])
    ?>
    
    <?php /*ProductPopup::widget([
        
        ])*/
    ?>
    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

