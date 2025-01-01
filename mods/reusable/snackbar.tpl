{literal}
  <style>
      /* snackbar */
      #snackbar {
          visibility: hidden;
          min-width: 250px;
          margin-left: -125px;
          background-color: dodgerblue;
          color: white;
          text-align: center;
          border-radius: 2px;
          padding: 16px;
          position: fixed;
          z-index: 1;
          left: 50%;
          bottom: 30px;
          font-size: 17px;
      }
  
      #snackbar.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
      }
  
      @-webkit-keyframes fadein {
      from {bottom: 0; opacity: 0;} 
      to {bottom: 30px; opacity: 1;}
      }
  
      @keyframes fadein {
      from {bottom: 0; opacity: 0;}
      to {bottom: 30px; opacity: 1;}
      }
  
      @-webkit-keyframes fadeout {
      from {bottom: 30px; opacity: 1;} 
      to {bottom: 0; opacity: 0;}
      }
  
      @keyframes fadeout {
      from {bottom: 30px; opacity: 1;}
      to {bottom: 0; opacity: 0;}
      }
      /* END: snackbar */
  </style>
  <script>
      //fungsi global snackbar: menampilkan toast
      //https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_snackbar
      function snackbar(text) {
          var x = document.getElementById("snackbar");
          x.innerHTML = text;  
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
      }
  </script>
  {/literal}
  
  <div id="snackbar"></div>