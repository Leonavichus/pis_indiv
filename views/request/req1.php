<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Запрс №1';
?>
<div class="site-lab2">
    <h5 class="alert alert-success"><?= Html::encode($this->title) ?></h5>
    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'findtitle')->label('Название книги') ?>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
    <br>
    <table class="table table-condensed">
        <tr>
            <th>Id</th>
            <th>Изделие</th>
            <th>Категория</th>
            <th>Цех</th>
            <th>Предприятие</th>
        </tr>
        <?php foreach ($bookList as $books) : ?>
            <tr>
                <td><?php echo $books->id_book; ?></td>
                <td><?php echo $books->name; ?></td>
                <td><?php echo $books->description; ?></td>
                <td> <?php echo $books->year_writing; ?></td>
                <td><?php echo $books->authors->name . ' ' . $books->authors->surname; ?></td>
                <td><?php echo $books->genre->name; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>