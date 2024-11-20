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
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'ru',
            initialView: 'dayGridMonth',
            events: '/v1/visit/list',
            firstDay: 1,
            slotDuration: '01:00:00',
            height: '100%',
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                omitZeroMinute: false,
            },
            headerToolbar: {
                left: '',
                center: 'title',
                right: 'today prev,next'
            },
            buttonText: {
                today:    'Сегодня',
                month:    'Месяц',
                week:     'Неделя',
                day:      'День',
                list:     'Список'
            },
        });
        calendar.render();
    });

</script>

<?php
echo ModalAjax::widget([
	'selector' => 'a.fc-event',
]);
?>