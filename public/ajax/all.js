//press button part3
function buttonPart3(Element) {
    if(Element.innerText != ""){
        Element.innerText = "";
        document.getElementById("button"+Element.value).removeAttribute("disabled");
        document.getElementById("button"+Element.value).style.opacity = "1";
    }   
}

//press button part4
function buttonPart4(Element,l,mot) {
    let test = '';
    for (let i = 0; i < l; i++) {
        if(document.getElementById("but"+i).innerText == ""){
            document.getElementById("but"+i).innerText = Element.innerText;
            Element.setAttribute("disabled","disabled");
            Element.style.opacity = "0";
            document.getElementById("but"+i).value = Element.value;
            for (let i = 0; i < l; i++) {
                test += document.getElementById("but"+i).innerText;
            }
            $.ajax({
                type: "get",
                data: {
                    idlevel: test
                },
                dataType: "html",
                success: function(data) {
                    if(test == mot){
                        window.location.reload(true);
                    }
                },
            });
            break;
        }
    }   
}

//press button bonus
function bonus(Element) {
    if(document.getElementById("bonus").innerText >= 60){
        document.getElementById("bonus").innerText -= 60;
        $.ajax({
            type: "get",
            data: {
                idBonus: Element
            },
            dataType: "html",
            success: function(data) {
                let nb = Math.floor(Math.random() * (Element.length - 0)) + 0;
                document.getElementById("but"+nb).innerText = Element[nb];
                document.getElementById("but"+nb).setAttribute("disabled","disabled");
                document.getElementById("but"+nb).style.color = "#48a71c";
                for (let i = 1; i < 13; i++) {
                    if(document.getElementById("button"+i).innerText == Element[nb]){
                        document.getElementById("button"+i).setAttribute("disabled","disabled");
                        document.getElementById("button"+i).style.opacity = "0";
                        break;
                    }
                }
            },
        });
    }
}