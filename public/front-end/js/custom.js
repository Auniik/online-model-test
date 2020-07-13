var questionNo = 2;
$(document).on('click', '#nextBtn', function () {
    var data1 = $('#eventId').val();
    var data2 = $('#playerId').val();
    var data3 = $('#questionId').val();
    var data4 = $("input[name='customRadio']:checked").val();
    $.ajax({
        url: "get-new-question/" + data1 + "/" + data2 + "/" + data3 + "/" + data4,
        method: 'GET',
        dataType: 'JSON',
        success: function (response) {
            console.log(response);
            var resultRow = $('#resultRow');
            resultRow.empty();
            var div = '';
            div += '<div class="col-lg-6 col-md-6">';
            div += '<div class="custom-control custom-radio">';
            div += '<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">';
            div += '<label class="custom-control-label" for="customRadio1">' + response.one + '</label>';
            div += '</div>';
            div += '<div class="custom-control custom-radio">';
            div += '<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">';
            div += '<label class="custom-control-label" for="customRadio2"> ' + response.two + ' </label>';
            div += '</div>';
            div += '</div>';
            div += '<div class="col-lg-6 col-md-6">';
            div += '<div class="custom-control custom-radio">';
            div += '<input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">';
            div += '<label class="custom-control-label" for="customRadio3"> ' + response.three + ' </label>';
            div += '</div>';
            div += '<div class="custom-control custom-radio">';
            div += '<input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">';
            div += '<label class="custom-control-label" for="customRadio4"> ' + response.four + ' </label>';
            div += '</div>';
            div += '</div>';
            resultRow.append(div);
            $('#questionNo').text(questionNo);
            $('#questionTitle').text(response.question);
            questionNo++;
        }
    });
});



window.prettyPrint && prettyPrint();

var defaultOpts = {
    draggable: true,
    resizable: true,
    movable: true,
    keyboard: true,
    title: true,
    modalWidth: 320,
    modalHeight: 320,
    fixedContent: true,
    fixedModalSize: false,
    initMaximized: false,
    gapThreshold: 0.02,
    ratioThreshold: 0.1,
    minRatio: 0.05,
    maxRatio: 16,
    headToolbar: ['maximize', 'close'],
    footToolbar: ['zoomIn', 'zoomOut', 'prev', 'fullscreen', 'next', 'actualSize', 'rotateRight'],
    multiInstances: true,
    initEvent: 'click',
    initAnimation: true,
    fixedModalPos: false,
    zIndex: 1090,
    dragHandle: '.magnify-modal',
    progressiveLoading: true
};

var vm = new Vue({
    el: '#playground',
    data: {
        options: defaultOpts
    },
    methods: {
        changeTheme: function (e) {
            if (e.target.value === '0') {
                $('.magnify-theme').remove();
            } else if (e.target.value === '1') {
                $('.magnify-theme').remove();
                $('head').append('<link class="magnify-theme" href="{{asset('/')}}viewer/css/magnify-bezelless-theme.css" rel="stylesheet">');
            } else if (e.target.value === '2') {
                $('.magnify-theme').remove();
                $('head').append('<link class="magnify-theme" href="{{asset('/')}}viewer/css/magnify-white-theme.css" rel="stylesheet">');
            }
        }
    },
    updated: function () {
        $('[data-magnify]').magnify(this.options);
    }
});
