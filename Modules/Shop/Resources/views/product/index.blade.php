@extends('shop::layout.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form method="post" name="ProductForm" id="ProductForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin sản phẩm</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="name" name="name" id="name" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Giá</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            id="exampleInputPassword1" placeholder="Giá">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Giảm giá</label>
                                        <input type="text" name="sale" id="sale" class="form-control"
                                            id="exampleInputPassword1" placeholder="Giảm giá">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                            id="exampleInputPassword1" placeholder="Giảm giá">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <select class="select2" name="" id="">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" id="image" name="image[]"
                                                    class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Chọn File</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Different Width</h3>
                            </div>
                            <div class="card-body" id="item">
                                <div class="row">
                                    <div class="col-3">
                                        <input type="text" name="name1[]" id="name1" class="form-control"
                                            placeholder="name">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="value1[]" id="value1" class="form-control"
                                            placeholder="value">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success add" id="add"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Different Height</h3>
                            </div>
                            <div class="card-body">
                                <input type="text" name="info" id="info" name="" id="">
                            </div>
                            <div class="card-body">
                                {{-- <textarea name="" name="desc" id="desc" id="" cols="30" rows="10"></textarea> --}}
                                <input type="text" name="desc" id="desc" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    @parent
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('info');
        CKEDITOR.replace('desc');
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $(".add").click(function(e) {
                e.preventDefault();
                $("#item").prepend(`<div class="row" style="padding-bottom: 8px;">
                                <div class="col-3">
                                    <input type="text" name="name1[]" id="name1" class="form-control" placeholder="name">
                                </div>
                                <div class="col">
                                    <input type="text" name="value1[]" id="value1" class="form-control" placeholder="value">
                                </div>
                                <div class="col">
                                    <button class="btn btn-danger remove" id="remove"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>`);
            });
        });
        $(document).on('click', '.remove', function(e) {
            e.preventDefault();
            let item = $(this).parent().parent();
            $(item).remove();
        })
        $("#ProductForm").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            var info = CKEDITOR.instances.info.getData();
            var desc = CKEDITOR.instances.desc.getData();
            data += '&info=' + info + '';
            data += '&desc=' + desc + '';
            console.log(info);
            $.ajax({
                url: "{{ route('product.store') }}",
                method: 'POST',
                data: data,
                success: function(data) {
                    console.log(data);
                }
            })
        });
    </script>
@endsection
