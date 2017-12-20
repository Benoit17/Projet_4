$('#ticket_email div label').remove();

$('div.form-group label').remove();

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


