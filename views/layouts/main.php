<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

$controllerId = Yii::$app->controller->id;
?>

<?php $this->beginContent('@app/views/layouts/empty.php') ?>
    <header>
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'innerContainerOptions' => [
                'class' => 'container-fluid'
            ],
            'collapseOptions' => [
                'class' => 'justify-content-end'
            ],
            'options' => [
                'class' => 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top navbar-right',
            ],
        ]);
        echo Nav::widget([
            'activateParents' => true,
            'options' => [
                'class' => 'navbar-nav',
                'encodeLabels' => false,
            ],
            'items' => [
	            [
		            'label' => Yii::t('app', 'Календарь'),
		            'url' => ['/site/index'],
	            ],
                [
                    'label' => Yii::t('app', 'Записи'),
                    'url' => ['/visit/index'],
                    'active' => $controllerId === 'visit',
                ],
                [
                    'label' => Yii::t('app', 'Клиенты'),
                    'url' => ['/client/index'],
                    'active' => $controllerId === 'client',
                ],
                [
                    'label' => Yii::t('app', 'Справочники'),
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Косметологи'),
                            'url' => ['/user/index'],
                            'active' => $controllerId === 'user',
                        ],
                        [
                            'label' => Yii::t('app', 'Процедуры'),
                            'url' => ['/service/index'],
                            'active' => $controllerId === 'service',
                        ],
                        [
                            'label' => Yii::t('app', 'Материалы'),
                            'url' => ['/material/index'],
                            'active' => $controllerId === 'material',
                        ],
                    ],
                    'active' => $controllerId === 'user' ||
                        $controllerId === 'service' ||
                        $controllerId === 'material',
                ],
	            /*'<li class="nav-item">'
	            . Html::beginForm(['/logout'])
	            . Html::submitButton(
		            Yii::t('app', 'Выйти'),
		            ['class' => 'nav-link btn btn-link logout']
	            )
	            . Html::endForm()
	            . '</li>'*/
            ],
        ]);
        NavBar::end();
        ?>
    </header>
    
    <main role="main" class="flex-shrink-0">
        <div class="main-container container-fluid">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container-fluid">
            <p class="float-left">&nbsp;</p>
            <p class="float-right">&nbsp;</p>
        </div>
    </footer>

<?php $this->endContent() ?>

