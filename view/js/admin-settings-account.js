
           
               
        let e = document.getElementById("uploadedAvatar");
        alert("hhhhhhh");
        const l = document.querySelector(".account-file-input")
          , c = document.querySelector(".account-image-reset");
        if (e) {
            const r = e.src;
            l.onchange = ()=>{
                l.files[0] && (e.src = "view/img/avatars/"+ l.files[0].name)
            }
            ,
            c.onclick = ()=>{
                l.value = "",
                e.src = r
            }
        }
   