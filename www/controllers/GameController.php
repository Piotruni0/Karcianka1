<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

class GameController extends \yii\web\Controller
{
    public function behaviors()
    {
      return [
          'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
          ],
      ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPlay()
    {
      echo 'username: ' . Yii::$app->user->identity->username;
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionLogout()
    {
        return $this->render('logout');
    }

}
