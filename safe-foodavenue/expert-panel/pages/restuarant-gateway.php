    
    <style> 
        /* 
            * This is a nice full CSS3 loader made with LESS 
            */
            /* u can custom almost everything u need with these variables just bellow */
            /* but from here u'll have to understand what u'r dealing with */
            /* mixins */
            /* animations */
            .spin {
            -webkit-animation: spin 750ms infinite linear;
            -moz-animation: spin 750ms infinite linear;
            animation: spin 750ms infinite linear;
            }
            @-webkit-keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
            }
            @-moz-keyframes spin {
            to {
                -moz-transform: rotate(360deg);
            }
            }
            .rspin {
            -webkit-animation: rspin 2250ms infinite linear;
            -moz-animation: rspin 2250ms infinite linear;
            animation: rspin 2250ms infinite linear;
            }
            @-webkit-keyframes rspin {
            to {
                -webkit-transform: rotate(-360deg);
            }
            }
            @-moz-keyframes rspin {
            to {
                -moz-transform: rotate(-360deg);
            }
            }
            /* let's style that thing */
            .loader {
            background-color: #eee;
            border-radius: 100%;
            position: relative;
            height: 75px;
            width: 75px;
            overflow: hidden;
            }
            .loader .c {
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -34% 0 0 -34%;
            width: 68%;
            height: 68%;
            background-color: #fff;
            border-radius: 100%;
            z-index: 3;
            }
            .loader .d {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            }
            .loader .d .e {
            position: absolute;
            top: 1%;
            left: 50%;
            margin: 0 0 0 -7.5px;
            height: 14px;
            width: 15px;
            -webkit-transform: rotate(10deg) skew(20deg);
            -moz-transform: rotate(10deg) skew(20deg);
            border-radius: 3px;
            background: #999;
            }
            .loader .r {
            z-index: 2;
            position: absolute;
            left: 50%;
            top: -1px;
            bottom: -1px;
            margin-left: -3.75px;
            background-color: #fff;
            width: 7.5px;
            }
            .loader .r1 {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            }
            .loader .r2 {
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            }
            .loader .r3 {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            }
            .loader .r4 {
            -webkit-transform: rotate(135deg);
            -moz-transform: rotate(135deg);
            }
    </style>
                     <div class="row">
                         <div class="col-12">
                             <div class="card" onload="getLocation()">
                                 <div class="card-body">
                                    
                                 <center style="margin-top:100px">
  
                                        <div class="loader rspin">
                                            <span class="c"></span>
                                            <span class="d spin"><span class="e"></span></span>
                                            <span class="r r1"></span>
                                            <span class="r r2"></span>
                                            <span class="r r3"></span>
                                            <span class="r r4"></span>
                                        </div>
                                            
                                        </center>
                                 <form id="posForm" method="POST" action="?content=list-restaurant-near-by">
                                    <input type="hidden" value="" id="lat" name="lat">
                                    <input type="hidden" value="" id="long" name="long">
                                 </form>  
                                 </div>
                             </div>
                         </div>
                     </div>
                     <script>
                         //var x = document.getElementById("demo");
                         function getLocation() { 
                             if (navigator.geolocation) {
                                 navigator.geolocation.getCurrentPosition(showPosition);
                             } 
                             else {
                                 x.innerHTML = "Geolocation is not supported by this browser.";
                             }
                         }
     
                         function showPosition(position) {
                             //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
                             document.getElementById("lat").value = position.coords.latitude; 
                             document.getElementById("long").value = position.coords.longitude; 
                             setTimeout(redirect_me, 3000);
                             //document.getElementById("posForm").submit();
                         }
                         function redirect_me(){
                            document.getElementById("posForm").submit();
                         }
                     </script>
     
                   