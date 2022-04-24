<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Административная панель';
?>
<div class="site-lab3">
    <h5 class="alert alert-success"><?= Html::encode($this->title) ?></h5>
    <a href="<?php echo Url::to(['admin/default/index']); ?>" class="btn btn-primary">Админка</a>
</div>