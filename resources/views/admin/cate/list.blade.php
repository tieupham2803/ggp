@extends('admin.master')
@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
               @if(session('thongbao'))
                 <div class="alert alert-success">
                     
                     {{session('flash_message')}}
                 </div>
               @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category Parent</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach($cate as $ct)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ct->id}}</td>
                                <td>{{$ct->name}}</td>
                                <td>{{$ct->description}}</td>
                                <td>{{$ct->parent_id}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cate/delete"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cate/edit/{{$ct->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            @endsection()