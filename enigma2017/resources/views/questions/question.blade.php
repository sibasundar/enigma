@extends('app')
@section('title')
COMPOSIT 2016
@stop

@section('head')

<style type="text/css">
@import "http://fonts.googleapis.com/css?family=Montserrat:300,400,700";
.rwd-table {
  margin: 1em 0;
  height: 500px;
}
.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: .5em;
}
.rwd-table td:last-child {
  padding-bottom: .5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 4em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table td:before {
    display: none;
  }
}
.rwd-table th, .rwd-table td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child, .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child, .rwd-table td:last-child {
    padding-right: 0;
  }
}

body {

  text-rendering: optimizeLegibility;
  color: #444;
  background-image: url({{ URL::asset('images/qs.jpg') }});
}

h1 {
  font-weight: normal;
  letter-spacing: -1px;
  color: #34495E;
}

.rwd-table {
  background: #34495E;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table tr {
  border-color: #46637f;
}
.rwd-table th, .rwd-table td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th, .rwd-table td:before {
  color: #dd5;
}

</style>

@stop

@section('content') 
	<form action="{{ url('forum/post') }}" method="post">
  {{csrf_field()}}
		<div class="row">
        <div class="col s9">
		    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="card s12 grey lighten-2" style="height:580px;margin:10px;">
                    <div class="row">                        
                        <div class="col s10 offset-s1">
                            <div class="row">
                                <p>
                                {{ $result->question_id }}.
                                @if($result->question)
                                <div class="col s5 offset-s1">
                                @else
                                <div class="col s6 offset-s4">
                                @endif
                                  <p>{{ $result->question }}</p>
                                    <!--img class="responsive-img" src="{{ asset( $result->question ) }}" style="width:275px; height:275px; border-radius: 10px;"-->
                                </div>
                
                                </p>
                                <div class="input-field col s12" >
                                    <p>
                                        <input id="answer" name="answer" type="text" class="validate" required>
                                        <label for="answer">Your Answer</label>
                                    </p>
                                </div> 
                            </div>    
                        </div>
                        @if($qid == 3)
                        
                      
            
                        @endif
                        @if(Session::has('message'))
                        <div class="row">  
                            <div class="flash card col s8 offset-s2" style="padding:10px;border:1px solid grey">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        </div>
                        @endif    
                        <div class="col s3 offset-s9">
                            <button class="btn light-blue darken-2 waves-effect waves-light" type="submit" name="action">Submit</button>
                        </div>                        
                    </div>
            </div>
        </div><p>
        <div class="col s3">       
            <!--table class="rwd-table">
                <thead>
                    <th>Rank</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @for ($i = 1; $i < 2; $i++)
                    @foreach($leader as $leaders)
                    @if( $i<11 )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $leaders->user_name }}</td>
                    </tr>
                    @endif 
                    @endforeach
                    @endfor
                </tbody>
            </table-->
        </div>
        </p>
        </div>
    </form>
    

	    
	    
@stop