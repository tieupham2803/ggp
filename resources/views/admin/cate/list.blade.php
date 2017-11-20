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
                                <td>@if($ct->parent_id==0)
                                    {!!"NULL"!!}
                                    @else

                                    <?php
                                    $parent = DB::table('cates')->where('id',$ct->parent_id)->first();
                                    echo $parent->name;
                                ?>
                                    @endif
                                </td>
                                <td>{{$ct->description}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Ban co chac muon xoa category khong')" href="delete/{{$ct->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a  href="edit/{{$ct->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            @endsection()