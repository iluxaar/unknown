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
            'collapseOptions' => [
                'class' => 'justify-content-end'
            ],
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top navbar-right',
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
                    'label' => Yii::t('app', 'Финансы'),
                    'url' => ['/finance/index'],
                    'active' => $controllerId === 'finance',
                ],
                [
                    'label' => Yii::t('app', 'Справочники'),
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Мастера'),
                            'url' => ['/user/index'],
                            'active' => $controllerId === 'user',
                        ],
                        [
                            'label' => Yii::t('app', 'Услуги'),
                            'url' => ['/service/index'],
                            'active' => $controllerId === 'service',
                        ],
                        [
                            'label' => Yii::t('app', 'Материалы'),
                            'url' => ['/material/index'],
                            'active' => $controllerId === 'material',
                        ],
	                    [
		                    'label' => Yii::t('app', 'Статьи финансов'),
		                    'url' => ['/finance-type/index'],
		                    'active' => $controllerId === 'finance-type',
	                    ],
                    ],
                    'active' => $controllerId === 'user' ||
                        $controllerId === 'service' ||
                        $controllerId === 'material',
                ],
	            '<li class="nav-item">'
	            . Html::beginForm(['/logout'])
	            . Html::submitButton(
		            Yii::t('app', 'Выйти'),
		            ['class' => 'nav-link btn btn-link logout']
	            )
	            . Html::endForm()
	            . '</li>'
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
            <p class="float-left">&nbsp;</p>
            <p class="float-right">&nbsp;</p>
        </div>
    </footer>

<?php $this->endContent() ?>

