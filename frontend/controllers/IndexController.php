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
                //'only' => ['logout', 'signup'],代表生效的控制器
                'rules' => [
                    [
                        'actions' => ['index','list','error','testnologin'],
                        'allow' => true,
                        'roles' => ['?','@'],//所有用户
                    ],
                    [
                        'actions' => ['testlogin'],
                        'allow' => true,
                        'roles' => ['@'],//认证用户
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
        $this->getview()->title = '这是首页';
        return $this->render('index');

    }


    public function acntionList(){
        echo 'this is list';
        exit;

    }


    public function actionTestlogin(){
        //echo 123;exit;
        $posts = Yii::$app->db->createCommand('SELECT * FROM fun_ssq limit 1')->queryAll();
        var_dump($posts);
        exit;
    }

    public function actionTestnologin(){
        echo 'no loginin';
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
        echo 'something may by error';
        exit;
    }

  
}
