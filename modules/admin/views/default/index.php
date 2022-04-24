<?php

use yii\helpers\Url; ?>

<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <div class="row" style="display: flex;">
        <div class="column">
            <ul>
                <li><a href="<?php echo Url::to(['brigasssssde/index']); ?>" class="btn btn-dark">Бригады</a></li>
                <li><a href="<?php echo Url::to(['books/index']); ?>" class="btn btn-dark">Работа бригад</a></li>
                <li><a href="<?php echo Url::to(['category/index']); ?>" class="btn btn-dark">Категории изделий</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Компании</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Лаборатории</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Информация о лабораториях</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Инструменты в лаборатории</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Должности</a></li>
            </ul>
        </div>
        <div class="column">
            <ul>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Изделия</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Участки</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Рабочие</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Работы по изделию</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Информация о работе по изделию</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Цехи</a></li>
                <li><a href="<?php echo Url::to(['genre/index']); ?>" class="btn btn-dark">Журнал</a></li>
                <br><br>
            </ul>
        </div>
    </div>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>