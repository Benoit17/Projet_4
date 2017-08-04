jQuery(function($){
    $('.datepicker').datepicker({
        minDate: 0,
        beforeShowDay: DisableSpecificDates
    });
});

jQuery(function($){
    $('.spinner').spinner({
        min: 1,
        max: 10
    });
});

jQuery(function($){
    $('.checkboxradio').checkboxradio({
    });
});

/*jQuery(function($){
    var now = new Date();
    var month = (now.getMonth()+1);
    var Month = ('0'+month)
    var day = ('0'+now.getDate()).slice(-2);
    var years = now.getFullYear();
    var hour = now.getHours();
    var todayDate = (Month+'/'+day+'/'+years);
    var currentDate = $( '.datepicker' ).datepicker( 'getDate' );
    console.log(now);
    console.log(currentDate);
    console.log(todayDate);

    if ( todayDate == currentDate && hour >= 14) {
        $('#ticket_type_0').checkboxradio({
            disabled: true
        })
    }else {
        $('#ticket_type_0').checkboxradio({
        });

    }
});*/

jQuery(function($) {
    $('.datepicker').click(function () {
        $('a.ui-state-default.ui-state-highlight').bind('click', function () {
            if (hour >= 14) {
                $('#ticket_type_0').checkboxradio({
                    disabled: true
                })
            } else {
                $('#ticket_type_0').checkboxradio({});
            }
        });
    });
});

$('#ticket_number').attr('readonly', 'readonly');



