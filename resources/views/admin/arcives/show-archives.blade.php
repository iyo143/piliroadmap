@extends('layout.admin.admin-layout')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11 ">
                        <div class="panel justify-content-center">
                            <div class="panel-heading">
                                <h3 class="panel-title">Show Article</h3>
                            </div>
                            <div class="title" style="padding: 0 30%">
                                <h3 class="text-center text-dark" >{{$pdf->pdf_name}}</h3>
                            </div>
                            <div class="body-content" >
                                <p class="text-center">
                                    <iframe style="width: 100%; height: 900px; padding: 10px 50px" src="{{url('storage/archives/'.$pdf->pdf_file)}}" frameborder=""></iframe>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
