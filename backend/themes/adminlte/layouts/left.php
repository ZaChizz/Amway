<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    /*
                    [
                        'label' => 'Опции',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Цвет', 'icon' => 'paint-brush', 'url' => ['/color'],],
                            ['label' => 'Объем', 'icon' => 'hourglass-o', 'url' => ['/volume'],],
                            ['label' => 'Вес', 'icon' => 'hourglass-o', 'url' => ['/weight'],],
                        ],
                    ],
                    */
                    ['label' => 'Отделы', 'icon' => 'object-group', 'url' => ['/department']],
                    ['label' => 'Группы', 'icon' => 'object-ungroup', 'url' => ['/group']],
                    ['label' => 'Категории', 'icon' => 'object-ungroup', 'url' => ['/category']],
                    ['label' => 'Товары', 'icon' => 'barcode', 'url' => ['/product']],
                    ['label' => 'Картинки', 'icon' => 'picture-o', 'url' => ['/product-image']],
                    ['label' => 'Пользователи', 'icon' => 'users', 'url' => ['/user']],
                    //['label' => 'Импорт картинок', 'icon' => 'file-code-o', 'url' => ['/product/image-import']],
                    ['label' => 'Заказы', 'icon' => 'file-code-o', 'url' => ['/order']],

                ],
            ]
        ) ?>

    </section>

</aside>
