// Le script qui devra calculer et afficher le nombre de mots et de caractères
$(document).ready(function(e) {

    $('#message').keyup(function() {

        var nombreCaractere = $(this).val().length;

        var nombreMots = jQuery.trim($(this).val()).split(' ').length;
        if ($(this).val() === '') {
            nombreMots = 0;
        }

        var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 3000';
        $('#compteur').text(msg);
        if (nombreCaractere > 3000) { $('#compteur').addClass("mauvais"); } else { $('#compteur').removeClass("mauvais"); }

    })

});
//event on click qui renvoie sur la fonction de contrôle
$('.boutonSend').on('click', function(event, target){
    checkEmptyInputs();
});

//Controle et verification des inputs
function checkEmptyInputs(){

    $(".notempty").each(function (i, elt){//contrôle que les inputs ne sont pas vides
        if(elt.value == ""){
            toggleInputStatus("#" + elt.id);//et renvoie sur la fonction toggle
            $(elt).one('focusin', function(){
                toggleInputStatus("#" + elt.id)
            })
        }
        else if(elt.id == "email"){//contrôle la validité de l'adresse mail
            checkMailFormat("#email");
            $(elt).one('focusin', function(){
                toggleInputStatus("#" + elt.id)
            })
        }
        else if(elt.id == "passconfirm"){//contrôle que le mot de passe et sa confirmation sont identiques
            checkPasswords("#passconfirm");
            $(elt).one('focusin', function(){
                toggleInputStatus("#" + elt.id)
            })
        }
        else if(elt.id =="exampleCheck2"){//contrôle qu'un radio à été checked
            checkRadio("#exampleCheck2");
            $("#exampleCheck2").click( function(){
                if($(this).prop("checked")==true){
                    toggleInputStatus2("#" + "nomhelp7")
                }else {
                    toggleInputStatus2("#" + "nomhelp7")
                }
            })
        }
    })
}

//Les fonctions de contrôle
function checkMailFormat(selector){
    let pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    let saisie = $(selector)[0].value;
    ! saisie.match(pattern) ?
        toggleInputStatus(selector, "Votre adresse email n'est pas une adresse valide !")
        : null;
}
function toggleInputStatus(selector, message){
    $(selector).toggleClass("border-danger");
    $(selector).next().toggleClass("d-none");
    message ? $(selector).next()[0].textContent = message : null;
}
function toggleInputStatus2(selector, message){
    $(exampleCheck3).next().toggleClass("d-none");
    message ? $(exampleCheck3).next()[0].textContent = message : null;
}

function toggleInputStatus3(selector, message){
    $(uname1).next().toggleClass("d-none");
    message ? $(uname1).next()[0].textContent = message : null;
}

function checkPasswords(){
    if($("#password")[0].value != $("#passconfirm")[0].value)
    {
        toggleInputStatus("#passconfirm", "Saississez le même mot de passe !")
    }
}

function checkRadio() {
    if ($("#exampleCheck2" != true)) {
        toggleInputStatus2("#exampleCheck2", "Merci d'accepter les conditions générales d'utilisation")
    }



}// fin Controle et verification des inputs