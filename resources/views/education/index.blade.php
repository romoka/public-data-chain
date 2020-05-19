@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Education Institution TPS
                        <button type="button" class="btn btn-outline-dark float-right" data-toggle="modal"
                                data-target="#addEduRecord">Add Student Record
                        </button>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Number</th>
                                <th scope="col">Institution</th>
                                <th scope="col">Level</th>
                                <th scope="col">Began</th>
                                <th scope="col">Completed</th>
                                <th scope="col">Grade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($education as $key=>$edu)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{$edu->person->id_number}}</td>
                                    <td>{{$edu->institution}}</td>
                                    <td>{{$edu->level}}</td>
                                    <td>{{$edu->start_date}}</td>
                                    <td>{{$edu->end_date}}</td>
                                    <td>{{$edu->grade}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addEduRecord" tabindex="-1" role="dialog" aria-labelledby="addEduRecordLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEduRecordLabel">Add Education Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('education.store') }}">
                        @csrf
                        <input hidden name="ACTION" value="addEduRecord">
                        <div class="form-group">
                            <label for="idNumber">Student Number</label>
                            <input type="number" id="idNumber" name="idNumber"
                                   class="form-control" placeholder="Enter the PDC ID Number" required>
                        </div>
                        <div class="form-group">
                            <label for="institution">Institution</label>
                            <select class="form-control" id="institution" name="institution" required>
                                @foreach($institutions as $institution)
                                    <option>{{ $institution }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" id="level" name="level" required>
                                @foreach($levels as $level)
                                    <option>{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start_date">Student Number</label>
                                    <input type="date" id="start_date" name="start_date"
                                           class="form-control" placeholder="Start Date" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="end_date">Student Number</label>
                                    <input type="date" id="end_date" name="end_date"
                                           class="form-control" placeholder="End Date" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="text" id="grade" name="grade"
                                   class="form-control" placeholder="Enter Grade" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>

            </div>
        </div>
    </div>
@endsection
