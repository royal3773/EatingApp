// resources/js/fullcalendar.js
import { Calendar } from '@fullcalendar/core'
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import momentTimezonePlugin from '@fullcalendar/moment-timezone';
import listPlugin from '@fullcalendar/list';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function () {
  const calendarElday = document.getElementById('calendarday');
  
  const calendarday = new Calendar(calendarElday, {
    allDaySlot: false,
    plugins: [listPlugin, dayGridPlugin],
    timeZone: 'Asia/Tokyo', // momentTimezonePlugin
    initialView: 'listDay',
    locale: 'ja',
    navLinks: 'true',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,listDay'
    },
    buttonText: {
      today: '今日',
      month: '月表示',
      list: 'リスト'
    },
    eventClick: function(info){
      var eventObj = info.event;
      alert('イベントの詳細  ' + eventObj.title);
    },
    events: '/admin/reservation/events',
  });

  const calendarElmonth = document.getElementById('calendarmonth');

  const calendarmonth = new Calendar(calendarElmonth, {
    // allDaySlot: false,
    plugins: [dayGridPlugin],
    timeZone: 'Asia/Tokyo', // momentTimezonePlugin
    initialView: 'dayGridMonth',
    locale: 'ja',
    buttonText: {
      today: '今日'
    },
    events: '/admin/reservation/events/month',
    
  });
  const calendarElweek = document.getElementById('calendarweek');

  const calendarweek = new Calendar(calendarElweek, {
    allDaySlot: false,
    plugins: [listPlugin],
    timeZone: 'Asia/Tokyo', // momentTimezonePlugin
    initialView: 'listWeek',
    locale: 'ja',
    navLinks: 'true',
    buttonText: {
      today: '今週'
    },
    events: '/admin/reservation/events',
    
  });

  calendarday.render();

  calendarmonth.render();

  calendarweek.render();
});
// eventDidMount: function(info) {
//   var tooltip = new Tooltip(info.el, {
//     title: info.event.extendedProps.description,
//     placement: 'top',
//     trigger: 'hover',
//     container: 'body'
//   });
// },