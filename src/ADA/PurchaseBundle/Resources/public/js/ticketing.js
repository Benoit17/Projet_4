$('.datepicker').datepicker({
    minDate: 0,
    dateFormat: "dd-mm-yy",
    beforeShowDay: DisableSpecificDates,
    onSelect: function() {
        var now = new Date();
        var hour = now.getHours();
        var currentDateAsObject = $(this).datepicker("getDate"); //the getDate method
        var currentDate = $.datepicker.formatDate("dd-mm-yy", currentDateAsObject);
        var todayDate = $.datepicker.formatDate("dd-mm-yy", now);

        if (currentDate == todayDate && hour >= 14) {
            $('#ticket_type_0').checkboxradio({disabled: true})
        }
        else{
            $('#ticket_type_0').checkboxradio({disabled: false})
        }
        $.ajax({
            url: '/projet_4/web/app_dev.php/fr/ticketing/date',
            data: {date: $.datepicker.formatDate("yy-mm-dd", currentDateAsObject)},
            type: 'post',
            success: function (output) {
                if (output > 4) {
                    /*alert('Il y a trop de réservation pour cette date');*/
                    $('input#ticket_date').val('Date');
                    $('#Date').after('<p class="red">Il ya trop de réservation pour cette date. Veuillez en choisir une autre</p>');
                    $('input#ticket_date').click(function() {
                        $('p.red').hide();
                    });
                }
            }
        });
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

//Ids des input text et erreurs a afficher

$(function(){
    $('.btn').click(function(){
        $('input[id="ticket_date"]').each(function(){
            //Si le input est vide
            if($(this).val()===""){
                $('a[href="#item1"]').trigger('click');
            }
        });

        $('input[name="ticket[type]"]:checked').each(function(){
            //Si le input est vide
            if($(this).val()===""){
                $('a[href="#item2"]').trigger('click');
            }
        });

        $('input[id="ticket_number"]').each(function(){
            //Si le input est vide
            if($(this).val()===""){
                $('a[href="#item3"]').trigger('click');
            }
        });

        $('input[id="ticket_email_first"]').each(function(){
            //Si le input est vide
            if($(this).val()===""){
                $('a[href="#item4"]').trigger('click');
            }
        });

        $('input[id="ticket_email_second"]').each(function(){
            //Si le input est vide
            if($(this).val()===""){
                $('a[href="#item4"]').trigger('click');
            }
        });
    });
});













   
