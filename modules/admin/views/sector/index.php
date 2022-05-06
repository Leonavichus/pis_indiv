<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\Sector;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SectorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Участок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sector-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            // 'id_workshop', 
            [
                'attribute' => 'id_workshop',
                'value' => function ($data) {
                    return $data->workshop->name;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sector $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>