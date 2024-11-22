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
            omitZeroMinute: false
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
        }
    });
    calendar.render();
});