@extends('admin.layouts.master')

@section('page-title','CartManager')

@section('custom-css')

@section('content')
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
<!-- start page content -->
<div class="container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <h1>CART MANAGER</h1>
                    </div>
                    @if(session('class'))
						<div class="alert bg-{{session('class')}}" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
					@endif
                    <div class="card-body ">
                        <div class="table-scrollable">
                        <form action=" /searchType" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-md" name="search" placeholder="Search for..." />
                                        <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-md" >Search</button></span>
                                    </div>
                                </form>
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                            
                                <tr>
                                    <th class="center">User Name</th>
                                    <th class="center">Date Purchase</th>
                                    <th class="center">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                <tr class="odd gradeX">
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td class="center">
                                        <button><a href="">view</a></button>
                                        <form action="" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        
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
