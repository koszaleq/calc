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

        dodajDoPolaOperacji(wartosc);
    });

    $(".przecinek").click(function () {
        let wartosc = $(this).val();

        dodajDoPolaOperacji(wartosc);
    });

    $(".ustaw-operator").click(function () {
        let wartosc = $(this).val();

        if(operator === null){
            dodajDoPolaOperacji(wartosc)
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

    function dodajDoPolaOperacji(wartosc) {
        let poleOperacji = $("#operacja");

        poleOperacji.val(poleOperacji.val() + wartosc);
    }

    function wyczyscPoleOperacji() {
        let poleOperacji = $("#operacja");

        poleOperacji.val(0);
    }


    $('button').click(function (event) {
        event.preventDefault(); //blokuje wywołanie formularza po kliknięciu button
    });
});
