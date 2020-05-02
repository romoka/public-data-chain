@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-3">
        <a href="{{ route('birth.index')}}">
            <div class="card"> 
                <div class="card-body">
                <h2>Births TPS</h2>
                    <img src="birth.jpg" class="img-fluid" alt="Birth" />
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
           <a href="{{ route('education.index')}}">
           <div class="card"> 
                <div class="card-body">
                <h2>Education TPS</h2>
                    <img src="education.jpg" class="img-fluid" alt="education" />
                </div>
            </div>
           </a>
        </div>
   
    </div>
</div>
@endsection
