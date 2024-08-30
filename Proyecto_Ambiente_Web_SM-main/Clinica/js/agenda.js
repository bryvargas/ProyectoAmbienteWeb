$(document).ready(function () {

    $.ajax({
        url: "php/Calendario/calendario.php",
        type: 'GET',
        contentType: false,
        processData: false,
        success: function (data) {
            var json = JSON.parse(data);
            var events = [];
            debugger;
            $.each(json, function (idx, element) {
                events.push({
                    'id': element.id,
                    'title': element.nombre,
                    'start': element.fechaInicio,
                    'end': element.fechaFinal,
                    'allDay': false,
                    'color': '#2C3E50',
                    'textColor': "white"
                });
            });

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                themeSystem: 'bootstrap5',
                locale: 'es',
                navLinks: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,listMonth'
                },
                dayMaxEvents: true,
                events: events
            });
            
            calendar.render();
        }
    })

});