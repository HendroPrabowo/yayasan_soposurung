<?php
    $user = \app\models\User::findOne(Yii::$app->user->id);
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--              <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->

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
                        ['label' => 'Data Siswa', 'icon' => 'user', 'url' => ['#']],
                    ];
                }else{
                    $menuItems = [
                        ['label' => 'User', 'icon' => 'user', 'url' => ['user/show', 'id' => $user->id]],
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
