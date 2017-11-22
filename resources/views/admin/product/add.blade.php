@extends('admin.master')
@section('content')
                 <form action="{!!route('admin.product.postAdd')!!}" method="POST" enctype="multipart/form-data">

                    <div class="col-lg-7" style="padding-bottom:120px">

                        <?php echo "</br>";?>

                         @include('admin.blocks.error')
                        {{-- <form action="" method="POST"> --}}
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                               <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="sltParent">
                                    <option value="">Please Choose Category</option>
                                 {{--    @foreach($parent as $item)
                                    <option value="">{{$item["name"]}}</option>
                                    @endforeach --}}
                                 <?php cate_parent($cate,0,"--",old('sltParent'));?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{old('txtName')}}" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
              <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{{old('txtPrice')}}" />
                            </div>
                           {{--  <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" id="editor1" name="txtIntro">
                                    
                                </textarea>
                            </div> --}}
                                 <div class="form-group">
                                        <label for="input-id">Intro</label>
                                        <textarea name="txtIntro" id="inputTxtre_Intro" class="form-control" value="{{ old('txtIntro') }}" rows="2" required="required">{{ old('txtIntro') }}</textarea>
                                        <script type="text/javascript">
                                            var editor = CKEDITOR.replace('txtIntro',{
                                                language:'vi',
                                                filebrowserImageBrowseUrl : '../../public/plugin/ckfinder/ckfinder.html?Type=Images',
                                                filebrowserFlashBrowseUrl : '../../public/plugin/ckfinder/ckfinder.html?Type=Flash',
                                                filebrowserImageUploadUrl : '../../public/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                filebrowserFlashUploadUrl : '../../public/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            });
                                        </script>
                                    </div>
                                         <div class="form-group">
                                        <label for="input-id">Content</label>
                                        <textarea name="txtContent" id="inputTxtre_Intro" class="form-control" value="{{ old('txtContent') }}" rows="2" required="required">{{ old('txtContent') }}</textarea>
                                        <script type="text/javascript">
                                            var editor = CKEDITOR.replace('txtContent',{
                                                language:'vi',
                                                filebrowserImageBrowseUrl : '../../public/plugin/ckfinder/ckfinder.html?Type=Images',
                                                filebrowserFlashBrowseUrl : '../../public/plugin/ckfinder/ckfinder.html?Type=Flash',
                                                filebrowserImageUploadUrl : '../../public/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                filebrowserFlashUploadUrl : '../../public/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            });
                                        </script>
                                    </div>
                       {{--      <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" id="editor" name="txtContent">
                                    
                                </textarea>
                            </div> --}}

                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages" accept="image/gif, image/jpg, image/jpeg, image/png" value= "{!!old('fImages')!!}">
                            </div>
                       
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeywords" value="{{old('txtKeywords')}}" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" name="txtDescription" value="{{old('textDescription')}}" rows="3">{!!old('textDescription')!!}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                       
                    </div>
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-4">
                        
                            <div class="form-group">
                                <label for="input-id">Image detail</label>
                                <div class="row">
                                    @for( $i=1; $i<=12; $i++)
                                    <div >
                                        Hình ảnh {!!$i!!} : <input type="file" name="fProductDetail[]" value="{{ old('txtdetail_img[]') }}" accept="image/gif, image/jpg, image/jpeg, image/png" id="inputtxtdetail_img" class="form-control">
                                    </div>
                                    @endfor
                                </div>                              
                            </div>
                    </div>
                     <form>
      @endsection()
