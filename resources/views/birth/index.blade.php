@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Birth Regestry TPS
                <a href="{{route('birth.create')}}" type="button" class="btn btn-outline-dark float-right">Add Birth Record</a>
                </div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Place</th>
                            <th scope="col">Hospital</th>
                            <th scope="col">Cert Serial</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($births as $key=>$birth)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{$birth->person->id_number}}</td>
                                <td>{{$birth->person->name}}</td>
                                <td>{{$birth->person->sex}}</td>
                                <td>{{$birth->date_of_birth}}</td>
                                <td>{{$birth->place_of_birth}}</td>
                                <td>{{$birth->hospital_of_birth}}</td>
                                <td>{{$birth->certificate_number}}</td>
                            </tr>
                        @endforeach
                       </tbody></table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
