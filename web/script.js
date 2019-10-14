$(document).ready(function(){
    var operator = null;

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
        cleanField();
        operator = null;
    });

    $(".usun-znak").click(function () {
        let poleOperacji = $("#operacja");
        poleOperacji.val(poleOperacji.val().slice(0, -1));
    });

    function addToField(wartosc) {
        let poleOperacji = $("#operacja");

        poleOperacji.val(poleOperacji.val() + wartosc);
    }

    function cleanField() {
        let poleOperacji = $("#operacja");

        poleOperacji.val("");
    }


    $('button').click(function (event) {
        event.preventDefault(); //blokuje wywołanie formularza po kliknięciu button
    });

    $('form input').keydown(function (e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
});
