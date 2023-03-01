@extends('layouts.app')

@section('title') History @endsection

@section('content')
    <div>
        <h3>Your 3 last games</h3>
       <ul class="">
           @foreach($games as $game)
               <li>
                   <div>
                       Result: {{ $game->result }} <br />
                       Number: {{ $game->number }} <br />
                       Sum: {{ $game->sum }} <br />
                   </div>
               </li>
           @endforeach
       </ul>
    </div>
@endsection
