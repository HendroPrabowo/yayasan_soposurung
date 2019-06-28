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
                        ['label' => 'Semua Kelas', 'icon' => 'cog', 'url' => ['kelas-r/index']],
                        ['label' => 'Semua Mata Pelajaran', 'icon' => 'book', 'url' => ['mata-pelajaran-r/index']],
                        ['label' => 'Semua Guru', 'icon' => 'users', 'url' => ['guru/index']],
                        [
                            'label' => 'Tahun Ajaran',
                            'icon' => 'list-alt',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Tahun Ajaran', 'icon' => 'laptop', 'url' => ['tahun-ajaran-semester/index']],
                                ['label' => 'List Assign Guru', 'icon' => 'users', 'url' => ['assign-guru/index']],
                                ['label' => 'Assign Siswa', 'icon' => 'send', 'url' => ['kelas-siswa/index']],
                                ['label' => 'Nilai Siswa', 'icon' => 'check', 'url' => ['siswa-nilai/index']],
                            ]
                        ],
                        ['label' => 'Aturan Asrama', 'icon' => 'tags', 'url' => ['aturan-asrama/index']],
                        ['label' => 'Kesehatan', 'icon' => 'heart', 'url' => ['kesehatan/index']],
                        ['label' => 'Kedisiplinan', 'icon' => 'warning', 'url' => ['kedisiplinan/index']],
                        [
                            'label' => 'Security',
                            'icon' => 'book',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Log Tamu', 'icon' => 'inbox', 'url' => ['log-tamu/index']],
                                ['label' => 'Barang Masuk', 'icon' => 'bookmark', 'url' => ['log-masuk-barang/index']],
                                ['label' => 'Barang Keluar', 'icon' => 'bookmark', 'url' => ['log-keluar-barang/index']],
                            ]
                        ],
                        [
                            'label' => 'Penilaian',
                            'icon' => 'book',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Komponen Nilai', 'icon' => 'inbox', 'url' => ['penilaian/index']],
                            ]
                        ],
                        [
                            'label' => 'Jurnal Piket',
                            'icon' => 'book',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Apel Senam Pagi', 'icon' => 'inbox', 'url' => ['sw-senam-apl-pgi/index']],
                                ['label' => 'Apel Makan Pagi', 'icon' => 'inbox', 'url' => ['sw-apl-mkn-pgi/index']],
                            ]
                        ],
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
