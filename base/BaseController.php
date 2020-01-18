<?php


namespace app\base;


use yii\web\Controller;
use yii\web\HttpException;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest){
            throw new HttpException(401,'Not Authorized');
        }

        $this->view->params['lastPage'] = \Yii::$app->session->getFlash('lastPage');
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function afterAction($action, $result)
    {
        \Yii::$app->session->setFlash('lastPage',\Yii::$app->request->url);
        return parent::afterAction($action, $result); // TODO: Change the autogenerated stub
    }
}