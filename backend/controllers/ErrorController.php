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

    /**
     * Under Construction
     */
    public function actionUnderConstruction(){
        return $this->render('error_under_construction', [
            'name' => 'Under Construction',
            'message' => 'Fungsi ini sedang dikembangkan',
        ]);
    }

    public function actionError($name, $message) {
        return $this->render('error_page', [
            'name' => $name,
            'message' => $message,
        ]);
    }
}