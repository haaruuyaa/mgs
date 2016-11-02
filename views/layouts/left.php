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
                    ['label' => 'Jenis', 'icon' => 'fa fa-file-o', 'url' => ['/master/jenis']],
                    ['label' => 'Customer', 'icon' => 'fa fa-users', 'url' => ['/master/customer']],
                    ['label' => 'Harga', 'icon' => 'fa fa-usd', 'url' => ['/master/harga']],
                    ['label' => 'Helper', 'icon' => 'fa fa-user', 'url' => ['/master/helper']],
                    ['label' => 'SO', 'icon' => 'fa fa-mail-reply', 'url' => ['/transaction/so']],
                    ['label' => 'Orderan', 'icon' => 'fa fa-pencil-square-o', 'url' => ['/transaction/orderan']],
                    ['label' => 'Setoran', 'icon' => 'fa fa-money', 'url' => ['/transaction/setoran-h']],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
