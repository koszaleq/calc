$(document).ready(function(){
    var operator = null;

    if(czyWyzerowac === 1){
        $("#operacja").val("");
    }

    $("#operacja").keydown(function(){
        console.log("zmiana");
    });

    $(".liczba").click(function (event) {
        let wartosc = $(this).text();

        addToField(wartosc);
    });

    $(".kropka").click(function () {
        let wartosc = $(this).val();

        addToField(wartosc);
    });

    $(".set-operator").click(function () {
        let wartosc = $(this).val();

        if(operator === null){
            addToField(wartosc)
        }
    });

    $(".wyczysc").click(function () {
        wyczyscPoleOperacji();
        operator = null;
    });

    $(".usun-znak").click(function () {
        let poleOperacji = $("#operacja"),
            wartosc = poleOperacji.val();

        poleOperacji.val(poleOperacji.val().slice(0, -1));
    });

    function addToField(wartosc) {
        let poleOperacji = $("#operacja");

        poleOperacji.val(poleOperacji.val() + wartosc);
    }

    function wyczyscPoleOperacji() {
        let poleOperacji = $("#operacja");

        poleOperacji.val("");
    }


    $('button').click(function (event) {
        event.preventDefault(); //blokuje wywołanie formularza po kliknięciu button
    });
});
