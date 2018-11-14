@extends('layouts.app')
@section('content')
<style>
    .flex-container {
        display: flex;
        flex-direction: column;
        background-color: DodgerBlue;
    }

    .flex-container > div {
        background-color: #f1f1f1;
        width: 100px;
        margin: 10px;
        text-align: center;
        line-height: 75px;
        font-size: 30px;
    }
</style>

<p><STRONG>Wij zijn Hoopp</STRONG></p>
<div class="flexContainer flexSpaceAround">
    <div class="col"> "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
    </div>
    <div class="col">
        "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores              </div>
    <div class="col">
        "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores   </div>
</div>
    <button type="button"
            onclick="document.getElementById('demo').innerHTML = Date()">
       Klik hier voor de tijd en datum !.</button>

    <p id="demo"></p>

@endsection