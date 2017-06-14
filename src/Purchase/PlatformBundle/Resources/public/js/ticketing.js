jQuery(function($){
    $('#datepicker').datepicker({
        minDate: 0,
        beforeShowDay: DisableSpecificDates
    });
});


