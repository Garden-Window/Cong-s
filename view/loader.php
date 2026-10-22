<div class="loader"><img src="view/img/loader.svg"></div>
        <style>
          .loader{
              display: flex;
              justify-content: center;
              align-items: center;
              min-height: 100vh;
              width: 100vw;
          }
          .loader img{
              width:150px;
              height: 150px;
            }
        </style>
        <script>
            document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                  "body").style.visibility = "hidden";
                document.querySelector(
                  ".loader").style.visibility = "visible";
            } else {
                document.querySelector(
                  ".loader").style.display = "none";
                document.querySelector(
                  "body").style.visibility = "visible";
            }
        };
        </script>