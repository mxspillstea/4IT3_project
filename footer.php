
        <!-- footer-area -->
        <footer>
            <div class="footer-top footer-bg s-footer-bg">
                <!-- newsletter-area -->
                <div class="newsletter-area s-newsletter-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="newsletter-wrap">
                                    <div class="section-title newsletter-title text-center">
                                        <h2>GET  <span>EXCLUSIVE OFFERS, TIPS, AND MORE!</span></h2>
										<br>
									<a href="signup.php">Sign up</a> for the Lost Ark Newsletter.
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- newsletter-area-end -->
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="footer-widget mb-50">
                                <div class="footer-logo mb-35">
                                    <a href="index.php"><img src="img/logo/logo1.png" alt=""></a>
                                </div>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                                    ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-6 col-sm-6"></div>
                        <div class="col-xl-3 col-lg-6 col-sm-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-title mb-35">
                                    <h5>Other Information</h5>
                                </div>
                                <div class="">
                                    <ul>
                                        <li><a href="#" class="clr">Legal</a></li>
                                        <li><a href="#" class="clr">Privacy Notice</a></li>
                                        <li><a href="#" class="clr">Cookie Preferences</a></li>
                                        <li><a href="#" class="clr">Interest-Based Ads</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-title mb-35">
                                    <h5>Follow us</h5>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="footer-fire"><img src="img/images/footer_fire.png" alt=""></div>
                <div class="footer-fire footer-fire-right"><img src="img/images/footer_fire.png" alt=""></div>
            </div>
            <div class="copyright-wrap s-copyright-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="copyright-text">
                                <p>Published by  Games under license. © 2021-2022  RPG, Inc. All rights reserved. Lost Ark and the Lost Ark</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
      
        <!-- footer-area-end -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/jquery.meanmenu.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.lettering.js"></script>
        <script src="js/jquery.textillate.js"></script>
        <script src="js/jquery.odometer.min.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        
          <script>
            var video = document.getElementById("myVideo");
            var btn = document.getElementById("myBtn");
            
            function myFunction() {
              if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
              } else {
                video.pause();
                btn.innerHTML = "Play";
              }
            }
        </script>
        <script>
           $(window).load(function(){        
   $('#Modal').modal('show');
    }); 
        </script>
  <script>
let cookie_consent = getCookie("user_cookie_consent");
if(cookie_consent != ""){
    document.getElementById("cookieNotice").style.display = "none";
}else{
    document.getElementById("cookieNotice").style.display = "block";
}


    // Create cookie
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// Delete cookie
function deleteCookie(cname) {
    const d = new Date();
    d.setTime(d.getTime() + (24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=;" + expires + ";path=/";
}

// Read cookie
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Set cookie consent
function acceptCookieConsent(){
    
    deleteCookie('user_cookie_consent');
    setCookie('user_cookie_consent', 1, 30);
    document.getElementById("cookieNotice").style.display = "none";
}
</script>
    </body>
</html>