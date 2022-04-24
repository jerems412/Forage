function addFacture(Element,Element1) {
        $.ajax({
            type: "get",
            data: {
                idAddFacture: Element,
                conso: Element1
            },
            dataType: "html",
            success: function(data) {
                window.location.replace("../GesCommerciale/ListFacture");
            },
        });
}

function regler(Element) {
    $.ajax({
        type: "get",
        data: {
            idRegler: Element
        },
        dataType: "html",
        success: function(data) {
            window.location.reload(true);
        },
    });
}

function bloquer(Element1,Element) {
    $.ajax({
        type: "get",
        data: {
            idUser: Element,
            etat: Element1
        },
        dataType: "html",
        success: function(data) {
            window.location.reload(true);
        },
    });
}