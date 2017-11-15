<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=\Yii::getAlias('@img_path')?>/avatar99.jpg" class="img-circle" alt="User Image"/>
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
                 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    
                    [
                        'label' => 'Каталог',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                    		['label' => 'Сторінки', 'icon' => 'archive', 'url' => ['/pages']],
                    		['label' => 'Категорії', 'icon' => 'bars', 'url' => ['/category']],
                        ],
                    ],
    				
                    ['label' => 'Користувачі', 'icon' => 'user', 'url' => ['/user']],  
                    
                    [
                        'label' => 'Система',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                    		['label' => 'Інформація', 'icon' => 'info', 'url' => ['/system/info']],
                    		['label' => 'Настройки', 'icon' => 'cog', 'url' => ['/system/setting']],
                    		['label' => 'Логи', 'icon' => 'list-alt', 'url' => ['/system/log']],
                    		['label' => 'Захист', 'icon' => 'lock', 'url' => ['/security']],
                        ],
                    ],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
