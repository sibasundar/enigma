<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Including the title-->
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="img/favicon.ico" />
    
    <!--Common CSS Files-->
    
    <link rel="stylesheet/less" href="{{ asset('/materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/tabulous.css') }}">
    
    <!--Common JS Scripts -->   
    <script src="{{ asset('/js/less-1.6.1.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-1.9.1.min.js') }}"></script> 
    <script src="{{ asset('/materialize/js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/js.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/tabulous.js') }}"></script>
    @yield('head')

<script type="text/javascript">
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            });

            $(document).ready(function(){
                //dropdown code
                $(".dropdown-browse").dropdown({ hover: false });
                $(".button-collapse").sideNav({
                    menuWidth: 300, // Default is 240
                    edge: 'left', // Choose the horizontal origin
                    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
               });
            });
            
</script>

<style> 
    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    font-family: myFirstfont;
}
            @font-face {
                font-family: myFirstFont;
                src: url({{ URL::asset('fonts/batmanforeveralternate.ttf') }});
            }
            @font-face {
                font-family: mySecondFont;
                src: url({{ URL::asset('fonts/anirb___.ttf') }});
            }


            main {
                flex: 1 0 auto;
            }
            
            #sign_in.modal{
                max-width: 400px;
            }
            /* label color */
            .input-field label {
                color: #000;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color:#0288d1;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #0288d1;
                box-shadow: 0 1px 0 0 #0288d1;
            }
             .input-field input[type=password]:focus + label {
                color:#0288d1;
            }
            /* label underline focus color */
            .input-field input[type=password]:focus {
                border-bottom: 1px solid #0288d1;
                box-shadow: 0 1px 0 0 #0288d1;
            }
             .input-field input[type=tel]:focus + label {
                color:#0288d1;
            }
            /* label underline focus color */
            .input-field input[type=tel]:focus {
                border-bottom: 1px solid #0288d1;
                box-shadow: 0 1px 0 0 #0288d1;
            }
             .input-field input[type=email]:focus + label {
                color:#0288d1;
            }
            /* label underline focus color */
            .input-field input[type=email]:focus {
                border-bottom: 1px solid #0288d1;
                box-shadow: 0 1px 0 0 #0288d1;
            }
            /* valid color */
           .input-field input[type=text].valid {
                border-bottom: 1px solid #0288d1;
                box-shadow: 0 1px 0 0 #0288d1;
            }
            /* invalid color */
            .input-field input[type=text].invalid {
                border-bottom: 1px solid #0288d1;
                box-shadow: 0 1px 0 0 #0288d1;
            }
            /* icon prefix focus color */
            .input-field .prefix.active {
                color: #0288d1;
            }
            /* brand-logo */
            .brand-logo{
                width: 75px;
                height: 75px;
                position: relative;
                left: 20px;
            }


            .brand-logo-2{
                width: 55px;
                height: 55px;
                position: relative;
                left: 120px;                
            }
        
            .rules li{
                padding: 10px;
                color: blue;
            }
            .nav-wrapper, #grad
                {
    background: #FE1800; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#FE1800, yellow); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#FE1800, yellow); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#FE1800, yellow); /* For Firefox 3.6 to 15 */
    background: linear-gradient(    #0175A6, black); /* Standard syntax (must be last */
            }
        </style>
     </head>     


<body>
        <?php $error=''; ?>
        <!--===============================
        Including the Header body
        ===============================-->
        <header>

            <ul id="sign_in" class="modal">
                <li>
                    <div class="modal-header header black darken-3" style=" padding:4px" id="grad">
                        <h5 class="white-text" style="margin-left:20px;font-family:mySecondFont;" >Log In</h5>
                    </div>
                    <div class="row">
                    <form  class="col s12" action="{{ url('/login') }}" method="post">
                    <div class="modal-content" style="margin-top:-40px">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
                            <div class="row" style="margin-top:30px">
                                @if($error != '')
                                    <span class="red-text">{{ $error }}</span>
                                @endif
                            </div>                 
                            
                            <div class="row">
                                <div class="input-field s12 m12 l12" style="margin-top:10px">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input id="icon_prefix" name="email" type="email" class="validate" required>
                                    <label for="icon_prefix"> Email</label>
                                </div>
                            </div>
                            <div class="row">    
                                <div class="input-field s12 m12 l12">
                                    <i class="mdi-hardware-security prefix"></i>
                                    <input id="icon_secure" name="password" type="password" class="validate" required>
                                    <label for="icon_secure"> Password</label>
                                </div>
                            </div>    
                        <!--    <div class="row">    
                                <div class="input-field s12 m12 l12">
                                    <input type="checkbox" name="ambassador" id="ambassador" value="ambassador" />
                                    <label for="ambassador">I am a Ambassador</label>
                                </div>
                            </div>    -->
                    </div>  
                   <div class="modal-footer ">
                        <a href="https://www.facebook.com/composit.iitkgp?fref=ts" target="_blank"><img src="{{ asset('images/fb_log.png') }}" ></a>
                        <button class="modal-action modal-close btn waves-effect waves-light header black darken-1" type="submit" name="action" style="font-family:mySecondFont;" id="grad">Log In</button>
                    </div>
                    </form>
                    </div>
                </li>
            </ul>

            <ul id="sign_up" class="modal">
                <li>
                    <div class="modal-header header black darken-3" style=" padding:4px" id="grad">
                        <h5 class="white-text" style="margin-left:20px;font-family:mySecondFont;">Register</h5>
                    </div>
                    <div class="modal-content" style="margin-top:0px">
                        <div class="row">
                            <form class="col s12" action="{{ url('/register') }}" method="post">     {{csrf_field()}}                    
                                <div class="row">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <div class="row" style="">
                                        @if($error != '')
                                            <span class="red-text">{{ $error }}</span>
                                        @endif
                                    </div> 
                                    <div class="input-field col s12 m12 l6" >
                                        <i class="mdi-action-account-circle prefix"></i>
                                        <input id="icon_prefix" name="name" type="text" class="validate" required>
                                        <label for="icon_prefix"> Username</label>
                                    </div>
                                    <div class="input-field col s12 m12 l6 ">
                                        <i class="mdi-communication-phone prefix"></i>
                                        <input id="icon_telephone" name="mobile" type="tel" class="validate " required>
                                        <label for="icon_telephone">Telephone</label>
                                    </div>
                                    <div class="input-field col s12 m12 l6">
                                        <i class="mdi-communication-email prefix"></i>
                                        <input id="icon_mail" name="email" type="email" class="validate" required>
                                        <label for="icon_mail">Email</label>
                                    </div>
                                    <div class="input-field col s12 m12 l6">
                                        <i class="mdi-hardware-security prefix"></i>
                                        <input id="icon_secure" name="password" type="password" class="validate" required>
                                        <label for="icon_secure"> Password</label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="modal-action modal-close btn waves-effect waves-light  header black darken-1" type="submit" name="action" style="font-family:mySecondFont;" id="grad">Register</button>
                                </div>

                            </form>
                        </div>
                   
                     
                    </div>
                </li>
            </ul>

                <nav>
                    <div class="nav-wrapper ">
                        <a href="http://www.iitkgp.ac.in" title="IIT Kharagpur"><img class="responsive-img brand-logo-2" src="{{ asset('/images/kgp_logo.png') }}"></a>
                        <a href="http://www.composit.in" class="brand-logo" title="COMPOSIT 2016"><img class="responsive-img" src="{{ asset('/images/composit_logo.png') }}"></a>
                        <!--Mobile Sidebar button-->
                        <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                        <!--================================
                        Menu for Desktops purple
                        =================================-->
                        <ul class="right hide-on-med-and-down">
           
                            <li><a class=" modal-trigger " data-target="sign_in" style="cursor:pointer"><b>Log In</b></a></li>
    
                            <li><a class="modal-trigger" data-target="sign_up" style="cursor:pointer"><b>Register</b></a></li>
                        </ul>
                        <!--================================
                        Menu for Mobile and Tablets
                        =================================-->
                        <ul class="side-nav" id="mobile-menu">
           
                            <li class="divider"></li>

                            <li class="no-padding">
                                <ul class="collapsible collapsible-accordion">
                                    <li>
                                        <a class=" collapsible-header modal-trigger " data-target="sign_in">Sign In</a>
                                           
                                    </li>
                                </ul>
                            </li>
                            <li class="divider"></li>

                            <li class="no-padding">
                                <ul class="collapsible collapsible-accordion">
                                    <li>
                                        <a class=" collapsible-header modal-trigger " data-target="sign_up">Sign Up</a>
                                            
                                               
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <main style="background-image: url({{ URL::asset('images/enigma.jpg') }}); background-size: cover;min-height:560px;background-repeat: no-repeat;">
            @if($error != '')
                <script type="text/javascript">
                    
                    alert('{{ $error }}') ;   
                    
                </script>
            @endif
            <!--===============================
            Including the Main Body
            ===============================-->
                    @if(Session::has('message'))
                    <div class="row">
        <div class="flash" style="padding:10px;border:1px solid black;color: red;">
            {{ Session::get('message') }}
        </div>
    </div>
    @endif
                @yield('content')
        <div class="row" style="color: white;font-weight: bold;">
        <div class="col s10 offset-s1">
        <div style="min-height: 500px;left:55px;">
        <div class="col s10 offset-s1 ">
            <ul class="tabs" style="background-color: transparent;">
                <li class="tab col s3 " style="font-family:mySecondFont;letter-spacing: 2px;"><a class="active" style="color:#0175A6" href="#quiz">About</a></li>
                <li class="tab col s3 " style="font-family:mySecondFont;letter-spacing: 2px;"><a style="color:#0175A6" href="#rules">Rules</a></li>
                <li class="tab col s3 " style="font-family:mySecondFont;letter-spacing: 2px;"><a style="color:#0175A6" href="#info">Forum</a></li>
                <li class="tab col s3 " style="font-family:mySecondFont;letter-spacing: 2px;"><a style="color:#0175A6" href="#credits">Credits</a></li>                
            </ul>
        </div>   
        <!--====================================
        Overview Tab
        =====================================-->
        
            <div class="col s8 offset-s2" style="letter-spacing: 2px;">
                <div id="quiz">
                    <div class="row">
                        <div class="col s10 offset-s1">
                           <br/><br/> <p>COMPOSIT 2016 proudly presents Enigma, the online quiz hunt which will baffle and bemuse you to the very core. </p>
                            <p>The answers are not so hard, just need the right mind to look at the right place.</p>
                            <p>Just observe and connect the clues.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s8 offset-s2" style="letter-spacing: 2px;">                
                <div id="rules">
                    <div class="row">
                        <div class="col s10 offset-s1">
                            <p>
                                <ol>
                                    <li>If you are a movie maniac, this game can be addictive beyond imagination. Participate at your own risk.</li>
                                   <br/> <li>Be as observant and imaginative as you can.</li>
                                    <br/><li>Answers are not case or space sensitive, i.e, there won't be any space in the answer and it'll be small letters. There are no special characters to be used.</li>
                                    <br/><li>The answers are to be found out from the images given in every question and thinking about them like a <b>'Metallurgist'</b>.</li>
                                    <br/><li>We may distract, deviate or confuse you.</li>
                                    <br/><li>For a better experience use Google Chrome.</li>
                                    <br/><li>Get hints, if you're stuck => <a href="https://www.facebook.com/composit.enigma/app/202980683107053/" target="_blank">Forum</a></li>
                                </ol>  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s8 offset-s2" style="letter-spacing: 2px;">                
                <div id="info">
                    <div class="row">    
                        <div class="col s6 offset-s4">
                          <br/><br/>  <p><a href="https://www.facebook.com/composit.enigma/app/202980683107053/" target="_blank"><button class="btn light-blue darken-2 waves-effect waves-light" type="submit" name="action">Forum</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s8 offset-s2" style="letter-spacing: 2px;">                
                <div id="credits">
                     <br/> <div class="row">
        <div class="col s5">
          <div class="card" style="border-radius: 10px;">
            <div class="card-image">
              <img src="{{ asset('images/singhal.jpg') }}" height: 750px; width: 75px; style="border-radius: 10px;">
            </div>
            <div class="card-content">
              <p style="color:#0175A6">Shubham Singhal</p>
            </div>
            <div class="card-action">
              <a href="https://www.facebook.com/shubham.singhal3" target="_blank"><img src="{{ asset('images/fb_icon.png') }}" style="height: 70px; width: 70px;"></a><a href="https://in.linkedin.com/in/shubham12
" target="_blank"><img src="{{ asset('images/linked_in_icon.png') }}" style="height: 70px; width: 70px;"></a>
            </div>
          </div>
        </div>
                <div class="col s5 offset-s1">
          <div class="card" style="border-radius: 10px;">
            <div class="card-image">
              <img src="{{ asset('images/swaraj.jpg') }}" height: 75px; width: 75px; style="border-radius: 10px;">
            </div>
            <div class="card-content">
              <p style="color:#0175A6">Nikhil Swaraj</p>
            </div>
            <div class="card-action">
              <a href="https://www.facebook.com/nikhil.swaraj?fref=ts" target="_blank"><img src="{{ asset('images/fb_icon.png') }}" style="height: 70px; width: 70px;"></a><a href="https://in.linkedin.com/in/nikhil-swaraj-929b24a6" target="_blank"><img src="{{ asset('images/linked_in_icon.png') }}" style="height: 70px; width: 70px;"></a>
            </div>
          </div>
        </div>
      </div>
            
        </div>
        </div>   
        </div>
        </div>                         
           
    </div> 
 

            </main>
               
    

            
</body>
</html>