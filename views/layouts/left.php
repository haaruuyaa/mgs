<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    // ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Stock', 'icon' => 'fa fa-bar-chart', 'url' => ['/master/stock']],
                    ['label' => 'Tipe', 'icon' => 'fa fa-folder-o', 'url' => ['/master/tipe']],
                ],
            ]
        ) ?>

    </section>

</aside>
