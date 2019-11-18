@extends('admin.layouts.master')

@section('page-title','Author')

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
                        <h1>Author</h1>
                    </div>
                    <div class="card-body ">
                        <div class="row p-b-20">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="{{route('create_author')}}" id="addRow" class="btn btn-info">
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
                                    <th class="center"> Name </th>
                                    <th class="center"> Describes </th>
                                    <th class="center"> Action </th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr class="odd gradeX">
                                    <td class="center">{{$author->id}}</td>
                                    <td class="center">{{$author->name}}</td>
                                    <td class="center">{{$author->describes}}</td>
                                    <td class="center">
                                        <button><a href="{{route('detailAuthor', $author->id)}}">view</a></button>
                                        <form action="{{ route('deleteAuthor',$author->id) }}" method="POST">
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
                <div class="text-center">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('cutom-js')

@endsection
