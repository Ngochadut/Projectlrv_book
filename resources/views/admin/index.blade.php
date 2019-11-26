@extends('admin.layouts.master')

@section('page-title','Admin')

@section('custom-css')

@endsection

@section('content')
<div class="container">
    <div class="col-lg-12">	
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->        
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                            <div class="large">120</div>
                            <div class="text-muted">New Orders</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                            <div class="large">52</div>
                            <div class="text-muted">Comments</div>
                        </div>
                    </div>
                </div> 
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                            <div class="large">24</div>
                            <div class="text-muted">New Users</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                            <div class="large">25.2k</div>
                            <div class="text-muted">Page Views</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="panel panel-container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">  MEMBER</h1>
        </div>
        <div class="row col-lg-12">
        <div class="col-md-12">
            <div class="card  card-box">
                <div class="card-body ">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table display product-overview mb-30" id="support_table5">
                                <thead>
                                <form action=" /search" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-md" name="search" placeholder="Search for..." />
                                        <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-md" >Search</button></span>
                                    </div>
                                </form>
                                    <tr>
                                        <th>No</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    @foreach($users as $user)
                                    <tr data-row="">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                        <button><a href="{{ route('detailUser',$user->id) }}">view</a></button>
                                        <form action="{{ route('deleteUser',$user->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button>Delete</button>
                                        </form> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <button type="button" class="btn btn-danger"><a href="{{route('create_user')}}"> CREATE NEW MEMBER</a></button>
                            </table>

                        </div>
                    </div>
                    <div class="text-center">
                         {{ $users->links() }}
                    </div>	
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- end Payment Details -->

@endsection

@section('cutom-js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
   var path = "{{ route('seachapi') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>

   
</body>
</html>
@endsection
