<?php

namespace app\models;

use yii\base\Model;

/**
 * Weather is the model behind the weather forcast.
 */
class Weather extends Model
{
    public $location;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // location is required
            [['location'], 'required'],
            
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'location' => 'Location',
        ];
    }
    public function getForecast($location)
    {
        $apiKey      = "appid=cd3a164d4f94b740d045a87ead169fb6";
        $apiURL		 = "https://api.openweathermap.org/data/2.5/weather?q=".$location."&".$apiKey."&units=metric";
		
        
		$ch					 = curl_init($apiURL);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json')
		);
		$jsonResponse		 = curl_exec($ch);
		$responseParamList	 = json_decode($jsonResponse, true);
		return $responseParamList;
    }

}
