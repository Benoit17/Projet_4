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
                    // /*alert('Il y a trop de réservation pour cette date');*/

                    if(document.URL.indexOf("/en/") >= 0) {
                        $('input#ticket_date').val('Date');
                        $('div#Date .input-group').after('<span class="help-block"><ul class="list-unstyled"><li><span class="glyphicon glyphicon-exclamation-sign"></span> There is too much reservation for this date. Please choose another one.</li>');
                        $('input#ticket_date').click(function() {
                            $('span.help-block').hide();
                        });
                    }
                    else{
                        $('input#ticket_date').val('Date');
                        $('div#Date .input-group').after('<span class="help-block"><ul class="list-unstyled"><li><span class="glyphicon glyphicon-exclamation-sign"></span> Il ya trop de réservation pour cette date. Veuillez en choisir une autre.</li>');
                        $('input#ticket_date').click(function() {
                            $('span.help-block').hide();
                        });
                    }
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

$(document).ready(function(){
    $('div#item1 span').attr('id', '1');
    $('div#test span').attr('id', '2');
    $('div#item3 span').attr('id', '3');
    $('div#item4 span').attr('id', '4');
    $('div#item5 span').attr('id', '5');
    $('div#item6 span').attr('id', '6');

    if($("#1").hasClass('help-block')){
        $('a[href="#item1"]').trigger('click');
    }
    if($("#2").hasClass('help-block')){
        $('a[href="#item2"]').trigger('click');
    }
    if($("#3").hasClass('help-block')){
        $('a[href="#item3"]').trigger('click');
    }
    if($("#4").hasClass('help-block')){
        $('a[href="#item4"]').trigger('click');
    }
    if($("#5").hasClass('help-block')){
        $('a[href="#item5"]').trigger('click');
    }
    if($("#6").hasClass('help-block')){
        $('a[href="#item6"]').trigger('click');
    }
});

//Enlève lka validation des erreurs par le navigateur
$('form[name="ticket"]').attr('novalidate', 'novalidate');

$('div.form-group label').attr('style', 'display: none;');

if(document.URL.indexOf("/en/") >= 0) {
    $('<p>Ticket n°1</p>').insertBefore('#ticket_customers_0_name');
    $('<p>Ticket n°2</p>').insertBefore('#ticket_customers_1_name');
    $('<p>Ticket n°3</p>').insertBefore('#ticket_customers_2_name');
    $('<p>Ticket n°4</p>').insertBefore('#ticket_customers_3_name');
    $('<p>Ticket n°5</p>').insertBefore('#ticket_customers_4_name');
    $('<p>Ticket n°6</p>').insertBefore('#ticket_customers_5_name');
    $('<p>Ticket n°7</p>').insertBefore('#ticket_customers_6_name');
    $('<p>Ticket n°8</p>').insertBefore('#ticket_customers_7_name');
    $('<p>Ticket n°9</p>').insertBefore('#ticket_customers_8_name');
    $('<p>Ticket n°10</p>').insertBefore('#ticket_customers_9_name');
}

if(document.URL.indexOf("/fr/") >= 0) {
    $('<p>Billet n°1</p>').insertBefore('#ticket_customers_0_name');
    $('<p>Billet n°2</p>').insertBefore('#ticket_customers_1_name');
    $('<p>Billet n°3</p>').insertBefore('#ticket_customers_2_name');
    $('<p>Billet n°4</p>').insertBefore('#ticket_customers_3_name');
    $('<p>Billet n°5</p>').insertBefore('#ticket_customers_4_name');
    $('<p>Billet n°6</p>').insertBefore('#ticket_customers_5_name');
    $('<p>Billet n°7</p>').insertBefore('#ticket_customers_6_name');
    $('<p>Billet n°8</p>').insertBefore('#ticket_customers_7_name');
    $('<p>Billet n°9</p>').insertBefore('#ticket_customers_8_name');
    $('<p>Billet n°10</p>').insertBefore('#ticket_customers_9_name');
}












   
