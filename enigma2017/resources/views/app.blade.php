<!DOCTYPE html>
<html lang="en">
    <head>
	      <meta charset="utf-8">
	      <meta http-equiv="X-UA-Compatible" content="IE=edge">
	      <meta name="viewport" content="width=device-width, initial-scale=1">
	      <!--Including the title-->
	      <title>@yield('title')</title>

 
      	<!--Common CSS Files-->
	
	      <link rel="stylesheet/less" href="{{ asset('/materialize/css/materialize.min.css') }}">
          <link rel="stylesheet" type="text/css" href="{{ asset('/css/tabulous.css') }}">
	      <!--Common JS Scripts -->	
	      <script src="{{ asset('/js/less-1.6.1.min.js') }}"></script>
	      <script src="{{ asset('/js/jquery-1.9.1.min.js') }}"></script> 
	      <script src="{{ asset('/materialize/js/materialize.min.js') }}"></script>
          <script type="text/javascript" src="{{ asset('/js/js.js') }}"></script>
          <script type="text/javascript" src="{{ asset('/js/tabulous.js') }}"></script>


	      <!--===============================
	      Including the head consisting of css and js files
	      =================================-->
	      <script type="text/javascript">

            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();});
            
            $(document).ready(function(){
                //dropdown code
                $(".dropdown-browse").dropdown({ hover: false });
                $(".dropdown-account").dropdown({ hover: false });
                $(".button-collapse").sideNav({
                    menuWidth: 300, // Default is 240
                    edge: 'left', // Choose the horizontal origin
                    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
                });
            });

       </script>

       <style type="text/css">

            #profile.modal img, #edit_profile.modal img {
                background-repeat: no-repeat;
                background-position: 50%;
                border-radius: 50%;
                width:150px;
                height: 150px;
            }

            #profile.modal, #edit_profile.modal{
                max-width: 270px;
                border-radius: 5px;
                margin-bottom: 0px;
            }

            #profile.modal-content, #edit_profile.modal-content{
                padding-bottom: 0px;
            }

            #notification.modal img{
                width:50px;
                height:50px;
            }

            #notification.modal{
                max-width:30%;
                max-height: 60%;
                border-radius: 5px;
                box-shadow:0 3px 7px rgba(0,0,0,.25); 
            }

            @font-face {
                font-family: myFirstFont;
                src: url({{ URL::asset('fonts/batmanforeveralternate.ttf') }});
            }
            @font-face {
                font-family: mySecondFont;
                src: url({{ URL::asset('fonts/anirb___.ttf') }});
            }
              
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
                font-family: myFirstFont;
            }

            main {
                flex: 1 0 auto;
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

          .nav-wrapper, #grad
                {
    background: #FE1800; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#0175A6, black); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#0175A6, black); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#0175A6, black); /* For Firefox 3.6 to 15 */
    background: linear-gradient(    #0175A6, black); /* Standard syntax (must be last */
            }

        </style> 

	  @yield('head')
	
    </head>

    <body class="grey lighten-4">
        <!--===============================
        Including the Header body
        ===============================-->
        <header>


            <ul id="my-account" class="dropdown-content" >
                <li><a href="#"  class="black-text">Sign Out<span class="badge black-text"><img src="{{ asset('images/logout.jpg') }}" style="height:25px;width:25px;position:relative;bottom:5px;right:-3px;"></span></a></li>
            </ul>

            <nav>
                <div class="nav-wrapper" style="background-color: #087E8B">

                        <a href="http://www.iitkgp.ac.in" title="IIT Kharagpur"><img class="responsive-img brand-logo-2" src="{{ asset('/images/kgp_logo.png') }}"></a>
                        <a href="http://www.composit.in" class="brand-logo" title="COMPOSIT 2016"><img class="responsive-img" src="{{ asset('/images/composit_logo.png') }}"></a>
                    <!--Mobile Sidebar button-->
                    
                    <!--================================
                    Menu for Desktops purple
                    =================================-->
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ url('/') }}"><i class="mdi-action-home"></i> </a></li>
                        <li style="width:240px;"><a class="dropdown-account" href="#!" data-activates="my-account"><b>My Account</b><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                    </ul>
                    <!--================================
                    Menu for Mobile and Tablets
                    =================================-->
                    <ul class="side-nav" id="mobile-menu">
                        <li><a href="{{ url('/') }}"><b>Home</b></a></li>
                        <li class="divider"></li>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li>
                                    <a class="collapsible-header">My Account<i class="mdi-navigation-arrow-drop-down"></i></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
	

      	<!--===============================
	       Including the Main Body
	      ===============================-->
    
      	    @yield('content')
      

        <main>  </main>


    </body>
</html>
