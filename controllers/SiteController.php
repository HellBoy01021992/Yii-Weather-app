<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Weather;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Weather();
        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $data = $model->getForecast($model->location);
            if($data['cod'] == 404)
            {
                die("Error: ".$data['message']);
            }
            $date = date('l, j F Y', $data['dt']);
            $time = date('h:i A', $data['dt']); 
            $temp = $data['main']['temp'];
            $description = $data['weather'][0]['description'];
            $city = $data['name'];
            return $this->render('forecast',['temp'=>$temp,'desc'=>$description, 'city'=>$city, 'date'=>$date, 'time'=>$time]);
        }
        
        return $this->render('index',['model'=>$model]);
      
    }
}
