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
class TestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['user-info'],
                'rules' => [
                    [
                        'actions' => ['user-info'],
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
        $identity = Yii::$app->user->identity;

        // 当前用户的ID。 未认证用户则为 Null 。
        $id = Yii::$app->user->id;

        // 判断当前用户是否是游客（未认证的）
        $isGuest = Yii::$app->user->isGuest;

        var_dump(Yii::$app->user);

        exit;

    }


    /**
     * 测试
     * @Author   lx
     * @DateTime 2017-09-22
     * @return   [type]     [description]
     */
    public function actionUserInfo()
    {
        echo 'get user info';
        exit;
    }

    /**
     * 测试
     * @Author   lx
     * @DateTime 2017-09-22
     * @return   [type]     [description]
     */
    public function actionCookieInfo()
    {
        echo 'get cookie info';
        exit;
    }

    /**
     * 测试rbac
     * @Author   lx
     * @DateTime 2017-09-22
     * @return   [type]     [description]
     */
    public function actionRbac(){
        $auth = Yii::$app->authManager;

        // 添加 "createPost" 权限
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // 添加 "updatePost" 权限
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // 添加 "author" 角色并赋予 "createPost" 权限
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // 添加 "admin" 角色并赋予 "updatePost" 
        // 和 "author" 权限
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($author, 2);
        $auth->assign($admin, 1);


    }

  
}
