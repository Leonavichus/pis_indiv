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
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
                ['label' => 'Запросы', 'items' => [
                    ['label' => 'Запрос 1', 'url' => ['', 'tag' => 'info']],
                    ['label' => 'Запрос 2', 'url' => ['', 'tag' => 'lab1']],
                    ['label' => 'Запрос 3', 'url' => ['', 'tag' => 'lab2']],
                    ['label' => 'Запрос 4', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 5', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 6', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 7', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 8', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 9', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 10', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 11', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 12', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 13', 'url' => ['', 'tag' => 'lab3']],
                    ['label' => 'Запрос 14', 'url' => ['', 'tag' => 'lab3']],
                ]],
                ['label' => 'Sign up', 'url' => ['/site/signup']],
                Yii::$app->user->isGuest ? (['label' => 'Login', 'url' => ['/site/login']]
                ) : ('<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
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