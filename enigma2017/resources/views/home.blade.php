@extends('app')

@section('title')
COMPOSIT 2016
@stop

@section('head')
<link rel="stylesheet" href="{{ asset('/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('/css/owl.theme.css') }}">
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
 <style type="text/css">
               @font-face {
                font-family: myFirstFont;
                src: url({{ URL::asset('batmanforeveralternate.ttf') }});
            }
            @font-face {
                font-family: mySecondFont;
                src: url({{ URL::asset('anirb___.ttf') }});
    .customNavigation{
      text-align: center;
    }
    


.full{
  width: 1250px;
}

footer{
  width: 1365px;
}
body{
    font-family: myFirstFont;
}
  
  </style>

@stop


@section('content')
<main style="background-image: url({{ URL::asset('images/enigma1.jpg') }}); background-size: cover;min-height:560px;min-width:900px;background-repeat: no-repeat;">
<div class="full" >

        <!--====================================
        Tabs
        =====================================-->
                <div class="row">
        <div class="col s10 offset-s1">
        <div style="min-height: 500px;">
        <div class="col s12 light-blue-text text-darken-4">
            <ul class="tabs " style="font-family: mySecondFont;background-color: transparent;">
                <li class="tab col s3 "><a class="active" href="#quiz" style="color: white;">Take the quiz</a></li>
                <li class="tab col s3 "><a  href="#about" style="color: white;">About</a></li>
                <li class="tab col s3 "><a  href="#rules" style="color: white;">Rules</a></li>
                <li class="tab col s3 "><a  href="#info" style="color: white;">Forum</a></li>
            </ul>
        </div>   
        <!--====================================
        Overview Tab
        =====================================-->

            <div class="col s8 offset-s2" style="letter-spacing: 2px;color: white;">
                <div id="quiz">
                    <div class="row">
                        <div class="col s4 offset-s4">
                            <p><a href = "{{ action('QuestionController@viewQuestion') }}"><button class="btn light-blue darken-2 waves-effect waves-light" type="submit" name="action">Start</button></a></p>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col s8 offset-s2" style="letter-spacing: 2px;color: white;">
                <div id="about">
                    <div class="row">
                        <div class="col s10 offset-s1">
                            <p>COMPOSIT 2016 proudly presents Enigma, the online quiz hunt which will baffle and bemuse you to the very core. </p>
                            <p>The answers are not so hard, just need the right mind to look at the right place.</p>
                            <p>Just observe and connect the clues.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s8 offset-s2" style="letter-spacing: 2px;color: white;">                
                <div id="rules">
                    <div class="row">
                        <div class="col s10 offset-s1">
                            <p>
                                <ol class="rules">
                                    <li>If you are a movie maniac, this game can be addictive beyond imagination. Participate at your own risk.</li>
                                    <li>Be as observant and imaginative as you can.</li>
                                    <li>At most times, you may have to blackmail/threaten/beg other people for the answer to next level. We do not have anything against that.</li>
                                    <li>Answers are not case or space sensitive, i.e, there won't be any space in the answer and it'll be small letters. There are no special characters to be used.</li>
                                    <li>The answers are to be found out from the images given in every question and thinking about them like a <b>'Metallurgist'</b>.</li>
                                    <li>We may distract, deviate or confuse you once in a while.</li>
                                    <li>For a better experience use Google Chrome.</li>
                                    <li>Get hints, if you're stuck => <a href="https://www.facebook.com/composit.enigma/app/202980683107053/" target="_blank">Forum</a></li>
                                </ol>  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s8 offset-s2" style="letter-spacing: 2px;color: white;">                
                <div id="info">
                    <div class="row">    
                        <div class="col s6 offset-s4">
                            <p><a href="https://www.facebook.com/composit.enigma/app/202980683107053/" target="_blank"><button class="btn light-blue darken-2 waves-effect waves-light" type="submit" name="action">Forum</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
           
    </div> 
    </div>  
    </div>   
    </div>         
        
              




@stop