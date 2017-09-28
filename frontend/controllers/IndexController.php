<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class IndexController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['test'],
                'rules' => [
                    [
                        'actions' => ['test'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * 这是一个测试的内容
     * @Author   lx
     * @DateTime 2017-09-22
     * @return   [type]     [description]
     */
    public function actionIndex()
    {
        echo '暂无内容';
        exit;

    }


    public function actionTest(){
        $posts = Yii::$app->db->createCommand('SELECT * FROM fun_ssq limit 1')->queryAll();
        var_dump($posts);
        exit;
    }

    /**
     * 错误抛出
     * @Author   lx
     * @DateTime 2017-09-19
     * @return   [type]     [description]
     */
    public function actionError()
    {
        //var_dump(Yii::getLogger()->messages[0]);
        //Yii::error('abcdef');
        echo 'something error';
        exit;
    }


  
}
