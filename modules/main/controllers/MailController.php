<?php

namespace app\modules\main\controllers;

use yii;

class MailController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo 'mail sended from ' . Yii::$app->params['supportEmail'] . ' ' . Yii::$app->name;
        Yii::$app->mailer->compose()
            ->setTo('nemolvlad@gmail.com')
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setSubject('subject')
            ->setTextBody('very long message about nothing')
            ->send();
        die;
        return $this->render('index');
    }

}
