<?php

/** @var yii\web\View $this */

/**
 * @var $visits
 */

use app\assets\FullCalendarAsset;
use app\widgets\ModalAjax;

$this->title = 'ELStudio';
FullCalendarAsset::register($this);
?>
<div id='calendar-container'>
    <div id='calendar'></div>
</div>
<?= ModalAjax::widget([
	'selector' => 'a.fc-event',
]) ?>