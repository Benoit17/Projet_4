$(".datepicker").datepicker({
    minDate: 0,
    beforeShowDay: DisableSpecificDates,
    onSelect: function() {
        var now = new Date();
        var hour = now.getHours();
        var currentDateAsObject = $(this).datepicker("getDate"); //the getDate method
        var currentDate = $.datepicker.formatDate("yy-mm-dd", currentDateAsObject);
        var todayDate = $.datepicker.formatDate("yy-mm-dd", now);

        if (currentDate == todayDate && hour >= 14) {
            $('#ticket_type_0').checkboxradio({disabled: true})
        }
        else{
            $('#ticket_type_0').checkboxradio({disabled: false})
        }
    }
});

jQuery(function($){
    $('.spinner').spinner({
        min: 0,
        max: 10
    });
});

jQuery(function($){
    $('.checkboxradio').checkboxradio({
    });
});

$('#ticket_number').attr('readonly', 'readonly');



