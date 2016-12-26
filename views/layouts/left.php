<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                     ['label' => 'Master', 'icon' => 'fa fa-file-code-o', 'url' => ['#'],
                         'items' => [
                        ['label' => 'Stock', 'icon' => 'fa fa-bar-chart', 'url' => ['/master/master-stock']],
                        ['label' => 'Stock Helper', 'icon' => 'fa fa-line-chart', 'url' => ['/master/stock-helper/index-help']],
                        ['label' => 'Jenis', 'icon' => 'fa fa-file-o', 'url' => ['/master/master-jenis']],
                        ['label' => 'Customer', 'icon' => 'fa fa-user', 'url' => ['/master/master-customer']],
                        ['label' => 'Helper', 'icon' => 'fa fa-user', 'url' => ['/master/master-helper']],
                        ['label' => 'Harga Customer', 'icon' => 'fa fa-usd', 'url' => ['/master/harga-customer']],
                        ['label' => 'Harga Helper', 'icon' => 'fa fa-usd', 'url' => ['/master/harga-helper']],
                     ]],
                    ['label' => 'Pribadi', 'icon' => 'fa fa-file-code-o', 'url' => ['#'],
                         'items' => [
                        ['label' => 'Pengeluaran', 'icon' => 'fa fa-money', 'url' => ['/transaction/pengeluaran-pribadi']],
                     ]],
                    // ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'SO', 'icon' => 'fa fa-mail-reply', 'url' => ['/transaction/soh']],
//                    ['label' => 'Pengeluaran', 'icon' => 'fa fa-money', 'url' => ['/transaction/pengeluaran-h']],
                    ['label' => 'Bon', 'icon' => 'fa fa-pencil-square-o', 'url' => ['/transaction/bon']],
                    ['label' => 'Data Pelanggan', 'icon' => 'fa fa-users', 'url' => ['/master/master-member']],
                    ['label' => 'Setoran', 'icon' => 'fa fa-money', 'url' => ['/transaction/setoran-h']],
                    ['label' => 'Laporan', 'icon' => 'fa fa-file-code-o', 'url' => ['#'],
                         'items' => [
                        ['label' => 'Stock History', 'icon' => 'fa fa-bar-chart', 'url' => ['/transaction/default/report-stock-history']],
                        ['label' => 'Penjualan Helper', 'icon' => 'fa fa-user', 'url' => ['/transaction/default/report-helper']],
                        ['label' => 'Penjualan Customer', 'icon' => 'fa fa-truck', 'url' => ['/transaction/default/report-customer']],
                        ['label' => 'SO', 'icon' => 'fa fa-folder-open', 'url' => ['/transaction/default/report-so']],
                        // ['label' => 'Pengeluaran Pribadi', 'icon' => 'fa fa-yen', 'url' => ['/transaction/default/report-pengeluaran-pribadi']],
                     ]],

                ],
            ]
        ) ?>

    </section>

</aside>
