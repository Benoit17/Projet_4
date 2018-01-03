$('#ticket_email div label').remove();

// $('div.form-group label').attr('style', 'display: none;');
//
// $('.checkbox').attr('class', 'checkbox border');
// $('.checkbox label').attr('style', 'margin-bottom: 15px;');

$('.stripe-button-el').attr('class', 'btn btn-success');

$('button span').attr('style', '');

// if(document.URL.indexOf("/en/") >= 0) {
//     $('<p>Ticket n°1</p>').insertBefore('#ticket_customers_0_name');
//     $('<p>Ticket n°2</p>').insertBefore('#ticket_customers_1_name');
//     $('<p>Ticket n°3</p>').insertBefore('#ticket_customers_2_name');
//     $('<p>Ticket n°4</p>').insertBefore('#ticket_customers_3_name');
//     $('<p>Ticket n°5</p>').insertBefore('#ticket_customers_4_name');
//     $('<p>Ticket n°6</p>').insertBefore('#ticket_customers_5_name');
//     $('<p>Ticket n°7</p>').insertBefore('#ticket_customers_6_name');
//     $('<p>Ticket n°8</p>').insertBefore('#ticket_customers_7_name');
//     $('<p>Ticket n°9</p>').insertBefore('#ticket_customers_8_name');
//     $('<p>Ticket n°10</p>').insertBefore('#ticket_customers_9_name');
// }
//
// if(document.URL.indexOf("/fr/") >= 0) {
//     $('<p>Billet n°1</p>').insertBefore('#ticket_customers_0_name');
//     $('<p>Billet n°2</p>').insertBefore('#ticket_customers_1_name');
//     $('<p>Billet n°3</p>').insertBefore('#ticket_customers_2_name');
//     $('<p>Billet n°4</p>').insertBefore('#ticket_customers_3_name');
//     $('<p>Billet n°5</p>').insertBefore('#ticket_customers_4_name');
//     $('<p>Billet n°6</p>').insertBefore('#ticket_customers_5_name');
//     $('<p>Billet n°7</p>').insertBefore('#ticket_customers_6_name');
//     $('<p>Billet n°8</p>').insertBefore('#ticket_customers_7_name');
//     $('<p>Billet n°9</p>').insertBefore('#ticket_customers_8_name');
//     $('<p>Billet n°10</p>').insertBefore('#ticket_customers_9_name');
// }


// // fonction permettant d'ajouter un message flash dynamiquement avec un message
// // et une couleur (couleur bootstrap (danger,primary...)) variables
// function addFlashMsgAccount(type, message) {
//     // construit le html pour le message flash
//     var appendCode = '<div class="flash-msg alert alert-'+type+'">'+message+'</div>';
//     // ajoute le message flash dans la div dédiée
//     $('#flashMsgAccount').html(appendCode);
//     if(type != 'danger') {
//         // efface le message flash apres 5 secondes
//         function removeFlagMsg(){
//             $('.flash-msg').replaceWith("");
//         }
//         setTimeout(removeFlagMsg, 5000);
//     }
// }
// $(document).ready(function () {
//     // MODIFICATION DU NOM
//     $('form[name="ticket"]').on('submit', function (e) {
//         e.preventDefault();
//         var $form = $(this);
//         var url = $('.btn-success').attr('url');
//         $.ajax({
//             type: 'POST',
//             url: url,
//             data: $form.serialize(),
//             success: function (data) {
//                 addFlashMsgAccount('success', data);
//             },
//             error: function (jqxhr) {
//                 addFlashMsgAccount('danger', jqxhr.responseText);
//
//             }
//         })
//     });
// });

