// resources/js/fullcalendar.js
import { Calendar } from '@fullcalendar/core'
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import momentTimezonePlugin from '@fullcalendar/moment-timezone';
import listPlugin from '@fullcalendar/list';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar');
  
  const calendar = new Calendar(calendarEl, {
    allDaySlot: false,
    plugins: [dayGridPlugin, timeGridPlugin, listPlugin],
    timeZone: 'Asia/Tokyo', // momentTimezonePlugin
    initialView: 'dayGridMonth',
    locale: 'ja',
    navLinks: 'true',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,'
    },
    
    events: '/admin/reservation/events',
  });
  const calendarElmonth = document.getElementById('calendarmonth');

  const calendarmonth = new Calendar(calendarElmonth, {
    allDaySlot: false,
    plugins: [dayGridPlugin],
    timeZone: 'Asia/Tokyo', // momentTimezonePlugin
    initialView: 'dayGridMonth',
    locale: 'ja',
    navLinks: 'true',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth'
    },

    events: '/admin/reservation/events/month',
  });

  calendar.render();

  calendarmonth.render();
});