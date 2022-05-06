<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\ProdWork;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProdWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Работа по изделию';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prod-work-index">

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
            // 'id_work',
            [
                'attribute' => 'id_work',
                'value' => function ($data) {
                    return $data->work->name;
                }
            ],
            // 'id_sector',
            [
                'attribute' => 'id_sector',
                'value' => function ($data) {
                    return $data->sector->name;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProdWork $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>