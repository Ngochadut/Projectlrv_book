@extends('admin.layouts.master')

@section('page-title','Type')

@section('custom-css')
@endsection

@section('content')
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
<!-- start page content -->
<div class="container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <h1>TYPE</h1>
                    </div>
                    @if(session('class'))
						<div class="alert bg-{{session('class')}}" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
					@endif
                    <div class="card-body ">
                        <div class="row p-b-20">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="{{route('create_type')}}" id="addRow" class="btn btn-info">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-scrollable">
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                            
                                <tr>
                                    <th class="center">ID</th>
                                    <th class="center"> Name Type </th>
                                    <th class="center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $type)
                                <tr class="odd gradeX">
                                    <td class="center">{{$type->id}}</td>
                                    <td class="center">{{$type->name}}</td>
                                    <td class="center">
                                        <button><a href="{{ route('detailType',$type->id) }}">view</a></button>
                                        <form action="{{ route('deleteType',$type->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button>Delete</button>
                                        </form>
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
@endsection

@section('cutom-js')

@endsection