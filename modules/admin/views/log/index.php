<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\Log;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Журрнал';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

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
            // 'id_product',
            [
                'attribute' => 'id_product',
                'value' => function ($data) {
                    return $data->product->name;
                }
            ],
            'count',
            // 'id_sector',
            [
                'attribute' => 'id_sector',
                'value' => function ($data) {
                    return $data->sector->name;
                }
            ],
            'date_start',
            'date_end',
            'isReady',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Log $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>