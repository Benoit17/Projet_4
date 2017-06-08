$(document).ready(function(){
    if(document.URL.indexOf("/en/") >= 0) {
        banner_text = 'By continuing on this site, you agree to the use of cookies. <button class="btn btn-success btn-gradient btn-sm" id="accept-cookie">OK</button>';
    }
    else
        banner_text = 'En poursuivant sur ce site, vous acceptez l’utilisation de cookies. <button class="btn btn-success btn-gradient btn-sm" id="accept-cookie">OK</button>';
        $("body").prepend('<div id="cookies-banner" class="alert alert-warning text-center">' + banner_text + '</div>');
        $("body").css({"top": $("#cookies-banner").outerHeight() + "px", "position": "relative"});

        // si on accepte, le cookie avec la valeur 'set' est créée, sinon, la valeur 'not'
        $("#accept-cookie").click(function(){
            id_button     = $(this).attr("id");
            action_button = (id_button == "accept-cookie")? 'set' : 'not';
            $("#cookies-banner").slideUp(350).remove();
            $("body").css({"top" : "0", "position" : ""});
        });

        // si aucune action au bout de 10 secondes (implicite)
        setTimeout(function(){
            $("#cookies-banner").slideUp(350).remove();
            $("body").css({"top" : "0", "position" : ""});
        }, 10000); // 10 sec
    
});
