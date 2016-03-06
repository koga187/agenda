var body;
//var projetos = [];
var url;
var path;
var host;

$(document).ready(function(){
    url = window.location.href;
    path = window.location.pathname;
    host = 'http://'+window.location.host;
    body = $('body');

    body.on('show.bs.modal', '#areaModal', function(){
        $.ajax({
            url: host + '/areas/',
            data: {},
            type:'GET',
            dataType: 'JSON',
            beforeSend: function() {

            },
            success: function($return, $jqHRX) {
                console($return);
            },
            error: function() {

            }
        });
    });
});