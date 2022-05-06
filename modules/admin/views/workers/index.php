<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\Workers;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\WorkersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудник';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workers-index">

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
            'fullname',
            // 'id_post',
            [
                'attribute' => 'id_post',
                'value' => function ($data) {
                    return $data->post->name;
                }
            ],
            // 'id_sector',
            [
                'attribute' => 'id_sector',
                'value' => function ($data) {
                    return !empty($data->sector) ? $data->sector->name : 'Not defined';
                }
            ],
            // 'id_brigade',
            [
                'attribute' => 'id_brigade',
                'value' => function ($data) {
                    return !empty($data->brigade) ? $data->brigade->name : 'Not defined';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Workers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>