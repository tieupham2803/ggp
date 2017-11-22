@extends('admin.master')
@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}} Đồng</td>
                                <td>
                                    <?php
                                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans();
                                    ?>
                                </td>
                                <td> <?php
                                    $cate = DB::table('cates')->where('id',$item->cate_id)->first();
                                    echo $cate->name;

                                ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a  onclick="return xacnhanxoa('Ban co chac muon xoa category khong')" href="delete/{{$item->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="edit/{{$item->id}}">Edit</a></td>
                            </tr>
                          @endforeach 
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            @endsection()