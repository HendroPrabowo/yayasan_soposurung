<?php
    $user = \app\models\User::findOne(Yii::$app->user->id);
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?php
            $menuItems = [];
            if(Yii::$app->user->isGuest == false){

                // Menu jika user ADMIN
                if($user->role == 'admin'){
                    $menuItems = [
                        [
                            'label' => 'User',
                            'icon' => 'address-book',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Semua User', 'icon' => 'user', 'url' => ['user/index']],
                                ['label' => 'Jenis Akun', 'icon' => 'drivers-license-o', 'url' => ['auth-item/index']],
                            ]
                        ],
                        ['label' => 'Data Siswa', 'icon' => 'user', 'url' => ['siswa/index']],
                        ['label' => 'Semua Kelas', 'icon' => 'users', 'url' => ['kelas-r/index']],
                        ['label' => 'Semua Mata Pelajaran', 'icon' => 'book', 'url' => ['mata-pelajaran-r/index']],
                        ['label' => 'Semua Guru', 'icon' => 'users', 'url' => ['guru/index']],
                        [
                            'label' => 'Tahun Ajaran',
                            'icon' => 'users',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Tahun Ajaran', 'icon' => 'users', 'url' => ['tahun-ajaran-semester/index']],
                                ['label' => 'List Assign Guru', 'icon' => 'users', 'url' => ['assign-guru/index']],
                            ]
                        ],
                        ['label' => 'Aturan Asrama', 'icon' => 'fa fa-book', 'url' => ['aturan-asrama/index']],
                        ['label' => 'Kesehatan', 'icon' => 'glyphicon glyphicon-plus', 'url' => ['kesehatan/index']],
                        ['label' => 'Kedisiplinan', 'icon' => 'user', 'url' => ['kedisiplinan/index']],
                    ];
                }elseif ($user->role == 'siswa'){
                    $menuItems = [
                        ['label' => 'Akun', 'icon' => 'user', 'url' => ['user/show']],
                        ['label' => 'Data Diri', 'icon' => 'user', 'url' => ['siswa/view-by-siswa']],
                    ];
                }
            }
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
