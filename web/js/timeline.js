$(document).ready(function(){

    $('#calendar').fullCalendar({
        now: '2016-02-23',
        editable: false,
        aspectRatio: 1.8,
        scrollTime: '00:00',
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'timelineDay,timelineTenDay,timelineMonth,timelineYear'
        },
        defaultView: 'timelineDay',
        views: {
            timelineDay: {
                buttonText: ':10 slots',
                slotDuration: '00:15'
            },
            timelineTenDay: {
                type: 'timeline',
                duration: { days: 10 }
            }
        },
        resourceAreaWidth: '25%',
        resourceLabelText: 'Tarefas',
        resources: [
            { id: 'a', title: 'task 1' },
            { id: 'b', title: 'task 2', eventColor: 'green' },
            { id: 'c', title: 'task 3', eventColor: 'orange' },
        ],
        events: [
            { id: '1', resourceId: 'a', start: '2016-02-23T02:00:00', end: '2016-02-24T07:00:00', title: 'task 1' },
            { id: '2', resourceId: 'b', start: '2016-02-24T05:00:00', end: '2016-02-25T22:00:00', title: 'task 2' },
            { id: '3', resourceId: 'c', start: '2016-02-26', end: '2016-02-28', title: 'task 3' },
        ]
    });
});