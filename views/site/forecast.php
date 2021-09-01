<?php

/* @var $this yii\web\View */

$this->title = 'Weather Forecast';
?>
<style>
body {
    color: #fff;
    overflow-x: hidden;
    height: 100%;
    background-color: #CFD8DC;
    background-repeat: no-repeat
}

.card {
    background-image: url("https://i.imgur.com/dpqZJV5.jpg");
    background-size: cover;
    width: 600px;
    height: 350px;
    border-radius: 20px;
    box-shadow: 0px 8px 16px 4px #9E9E9E;
    margin-top: 50px;
    margin-bottom: 50px
}

.time-font {
    font-size: 50px
}

.sm-font {
    font-size: 18px
}

.med-font {
    font-size: 28px
}

.large-font {
    font-size: 60px
}
</style>
<div class="site-index">

    <div class="main-content">

    <div class="container-fluid px-1 px-md-4 py-5 mx-auto">

    <div id= "forecast" class="row d-flex justify-content-center px-3">

        <div class="card">
            <h2 class="ml-auto mr-4 mt-3 mb-0"><?= $city;?></h2>
            <p class="ml-auto mr-4 mb-0 med-font"><?=$desc?></p>
            <h1 class="ml-auto mr-4 large-font"><?= $temp?>&#176;C</h1>
            <p class="time-font mb-0 ml-4 mt-auto"><?= $time?></p>
            <p class="ml-4 mb-4"><?=$date?></p>
        </div>

    </div>

    </div>
    
    </div>
    
    
</div>