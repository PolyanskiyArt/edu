<?php

use app\models\User;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\forms\UserForm
 * @var $form yii\widgets\ActiveForm
 */

$model['description'] = $model->teacherProfile->description ?? 'none';

?>

<?php
$dir = Yii::getAlias('@avatars'); // Директория - должна быть создана
if (is_null($model['avatar'])) {
    $file = 'nophoto.jpg';
} else {
    $file = $model['avatar'];
    if (!file_exists($dir . '/' . $file)) {
        $file = 'nophoto.jpg';
    }

}
if (file_exists($dir . '/' . $file)) {
    echo Html::img('../../../avatars/' . $file, ['class' => 'img-circle', 'alt' => 'Аватар']);
}
?>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js"></script>

<style>
    #newavatar {
        text-align: center;
    }
    /*img {*/
        /*width: 168;*/
        /*margin: auto;*/
        /*display: block;*/
        /*margin-bottom: 10px;*/
    /*}*/
    button {

    }</style>

<div id="newavatar">
    <div v-if="!image">
        <h2>Новый аватар</h2>
        <input type="file" @change="onFileChange">
    </div>
    <div v-else>
        <img :src="image" />
        <button @click="removeImage">Remove image</button>
    </div>
    <div class="large-12 medium-12 small-12 cell">
        <button v-on:click="submitFiles()">Заменить аватар</button>
    </div>
</div>

<div class="user-form card">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
    ]); ?>

    <div class="card-body">
        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>

<!--        --><?//= $form->field($model, 'file')->fileInput() ?>
        <?= $form->field($model, 'city')->textInput() ?>

        <?php
        if (\Yii::$app->user->can('administer')) {
            echo $form->field($model, 'status')->dropDownList(User::getStatusesList());
            echo $form->field($model, 'roles')->dropDownList(User::getRolesList(), ['multiple' => 'multiple',]);
        }
        ?>
    </div>
    <div class="card-footer text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
$csrf_param = Yii::$app->request->csrfParam;
$csrf_token = Yii::$app->request->csrfToken;
?>

<script>
    var vm = new Vue({
        el: '#newavatar',
        data: {
            image: ''
        },
        methods: {
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image(100, 100);
                image.width = 100;
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {vm.image = e.target.result;}
                reader.readAsDataURL(file);
            },
            removeImage: function (e) {
                this.image = '';
            },
            submitFiles(){
                formData = new FormData();
                formData.append('file', this.image);
                formData.append('$csrf_param', '$csrf_token');//добавляем токены
                axios.defaults.headers.common['Content-Type'] = 'multipart/form-data;';
                axios.defaults.headers.common = {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                };
                axios
                  .post("<?= Yii::$app->urlManager->createUrl('api/user-profile/set-avatar');?>",
                    formData,
                    {
                        headers: {'Content-Type': 'multipart/form-data'}
                    }
                ).then(function () {
//                        .then(response => (this.MessagesCount = response.data.cnt, this.Messages = response.data.list))
                       vm.removeImage();
                        console.log('SUCCESS!!');
                        var img = $('img[class="img-circle"]');
                        var src = img.attr('src');
                        var d = new Date();
                        img.removeAttr('src').attr('src', src + '?' + d.getTime());

                    })
                    //                    .catch(function (e) {
                    //                        this.error = e;
                    //                        console.log(e);
                    //                    });
                    .catch(function(){
                        console.log('FAILURE!!');
                    });
            },
        }
    })
    //}
</script>
