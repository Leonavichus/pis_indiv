<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'О нас', 'url' => ['/site/about']],
                ['label' => 'Контакты', 'url' => ['/site/contact']],
                ['label' => 'Запросы', 'items' => [
                    ['label' => 'Запрос 1', 'url' => ['/request/req1', 'tag' => 'req1']],
                    ['label' => 'Запрос 2', 'url' => ['/request/req2', 'tag' => 'req2']],
                    ['label' => 'Запрос 3', 'url' => ['/request/req3', 'tag' => 'req3']],
                    ['label' => 'Запрос 4', 'url' => ['/request/req4', 'tag' => 'req4']],
                    ['label' => 'Запрос 5', 'url' => ['/request/req5', 'tag' => 'req5']],
                    ['label' => 'Запрос 6', 'url' => ['/request/req6', 'tag' => 'req6']],
                    ['label' => 'Запрос 7', 'url' => ['/request/req7', 'tag' => 'req7']],
                    ['label' => 'Запрос 8', 'url' => ['/request/req8', 'tag' => 'req8']],
                    ['label' => 'Запрос 9', 'url' => ['/request/req9', 'tag' => 'req9']],
                    ['label' => 'Запрос 10', 'url' => ['/request/req10', 'tag' => 'req10']],
                    ['label' => 'Запрос 11', 'url' => ['/request/req11', 'tag' => 'req11']],
                    ['label' => 'Запрос 12', 'url' => ['/request/req12', 'tag' => 'req12']],
                    ['label' => 'Запрос 13', 'url' => ['/request/req13', 'tag' => 'req13']],
                    ['label' => 'Запрос 14', 'url' => ['/request/req14', 'tag' => 'req14']],
                ]],
                Yii::$app->user->isGuest ? (['label' => false]) : ['label' => 'Админка', 'url' => ['/site/admin']],
                ['label' => 'Регистрация', 'url' => ['/site/signup']],
                Yii::$app->user->isGuest ? (['label' => 'Войти', 'url' => ['/site/login']]
                ) : ('<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; My Company <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>