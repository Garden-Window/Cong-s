function initPASSWORDtoggle(){
    var t=document;
    
        var n=t.querySelector(".pwd"),
        i=n.querySelector("#pwdi"),
        o=n.querySelector("input");
        if (o.getAttribute("type")=="password") {
            o.setAttribute("type","text"),
            i.classList.replace("bx-hide","bx-show");

        } else if (o.getAttribute("type")=="text"){
            o.setAttribute("type","password"),
            i.classList.replace("bx-show","bx-hide");
        }
        }
        