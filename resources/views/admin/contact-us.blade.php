@extends('layout.admin.admin-layout')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                List of Feedbacks
                            </h3>
                            <div class="panel-body">
                                <table class="table table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Sender</th>
                                        <th>Reciever</th>
                                        <th>Subject</th>
                                        <th>Feedback</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feedback as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->department_name}}</td>
                                            <td>{{$data->subject}}</td>
                                            <td>{{$data->feedback}}</td>

                                            <td>
                                        <span>
                                            <a  href=""
                                                class="btn btn-primary btn-circle"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="View">
                                                <i
                                                    class="fas fa-eye">
                                                </i>
                                            </a>
                                        </span>
                                                <span>
                                            <a href="{{route('map.edit', $data->id)}}" class="btn btn-success"><i class="lnr lnr-pencil"></i></a>
                                        </span>
                                                <span data-id="{{$data->id}}"
                                                      data-target="#DeleteModal"
                                                      data-toggle="modal" >
                                            <a
                                                class="btn btn-danger btn-circle"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Delete">
                                                <i
                                                    class="fas fa-trash-alt">
                                                </i>
                                            </a>
                                        </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
