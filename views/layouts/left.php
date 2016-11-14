<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    // ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Stock', 'icon' => 'fa fa-bar-chart', 'url' => ['/master/master-stock']],                    
                    ['label' => 'Jenis', 'icon' => 'fa fa-file-o', 'url' => ['/master/master-jenis']],
                    ['label' => 'Customer', 'icon' => 'fa fa-users', 'url' => ['/master/master-customer']],
                    ['label' => 'Helper', 'icon' => 'fa fa-user', 'url' => ['/master/master-helper']],
                    ['label' => 'Harga Customer', 'icon' => 'fa fa-usd', 'url' => ['/master/harga-customer']],
                    ['label' => 'Harga Helper', 'icon' => 'fa fa-usd', 'url' => ['/master/harga-helper']],
                    ['label' => 'SO', 'icon' => 'fa fa-mail-reply', 'url' => ['/transaction/soh']],
//                    ['label' => 'Orderan', 'icon' => 'fa fa-pencil-square-o', 'url' => ['/transaction/order-h']],
                    ['label' => 'Setoran', 'icon' => 'fa fa-money', 'url' => ['/transaction/setoran-h']],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
