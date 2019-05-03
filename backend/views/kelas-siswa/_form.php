<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\KelasSiswa */
/* @var $form yii\widgets\ActiveForm */
$angkatan_all = ArrayHelper::map($angkatan, 'id', 'angkatan');
?>

<div class="kelas-siswa-form">

    <div class="form-group col-md-3">
        <label>Angkatan</label>
        <?= Select2::widget([
            'name' => 'angkatan',
            'data' => $angkatan_all,
            'options' => ['placeholder' => 'Pilih Angkatan', 'id' => 'angkatan']
        ]); ?>
    </div>


    <div id="siswa">

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#angkatan").on("change", function () {
            $("#siswa").empty();
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl. '/index.php/kelas-siswa/get-siswa' ?>',
                type: 'post',
                data:{
                    angkatan_id: $("#angkatan").val(),
                },
                success: function (data) {
                    if(data.siswa.length != 0){
                        var inputs = '';
                        $.each(data.siswa, function (index, value) {
                            inputs += '<input type="checkbox" style="margin-left: 10px" " name="siswa'+index+'" value="'+value.nisn+'"> '+ value.nama + '<br>';
                        });
                        $("#siswa").html(
                            "<label style='margin-left: 10px'>List Siswa</label> \n" +
                            "<form action='assign-siswa?id=<?= $tahun_ajaran_kelas->id ?>' method='post'>\n" +
                            "   <input type='hidden' name='<?= Yii::$app->request->csrfParam ?>' value='<?= Yii::$app->request->getCsrfToken()?>'>\n" +
                            inputs +
                            "   <button style='margin-left: 10px; margin-top: 10px' type='submit' class='btn btn-success' style='margin-top: 10px'>Save</button>\n" +
                            "</form>"
                        );
                    }
                }
            });
        });
    });
</script>