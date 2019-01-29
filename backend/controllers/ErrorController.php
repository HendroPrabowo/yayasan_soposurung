<?php

namespace backend\controllers;

use yii\web\Controller;

class ErrorController extends Controller{

    /*
     * Forbidden Error
     */
    public function actionForbiddenError(){
        return $this->render('error', [
            'name' => 'Forbidden',
            'message' => 'Akun anda dilarang untuk memasuki fungsi ini',
        ]);
    }
}