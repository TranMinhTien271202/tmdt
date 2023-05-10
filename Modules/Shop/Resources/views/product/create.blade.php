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
            <form method="post" name="ProductForm" id="ProductForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="name" id="name" class="form-control"
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
                                    <label>Thương hiệu</label>
                                    <select class="select2" name="brand_id" id="brand_id" style="width: 100%;">
                                        <option value="">Mời chọn</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Loại hàng</label>
                                    <select class="select2" name="category_id" id="category_id" style="width: 100%;">
                                        <option value="">Mời chọn</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image[]" id="image" class="custom-file-input"
                                                id="exampleInputFile">
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Thông số sản phẩm</h3>
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
                                <h3 class="card-title">Chi tiết sản phẩmiii</h3>
                            </div>
                            <div class="card-body">
                                <label for="">Thông tin mô tả</label>
                                <input type="text" name="info" id="info">
                            </div>
                            <div class="card-body">
                                <label for="">Thông tin chi tiết</label>
                                <input type="text" name="desc" id="desc">
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
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
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
        // $("#ProductForm").submit(function(e) {
        //     e.preventDefault();
        //     var data = $(this).serialize();
        //     var info = CKEDITOR.instances.info.getData();
        //     var desc = CKEDITOR.instances.desc.getData();
        //     data += '&info=' + info + '';
        //     data += '&desc=' + desc + '';
        //     // var formData = new FormData(this);
        //     // formData.append('data', data);
        //     // var file_data = $('#image').prop('files')[0];

        //     $.ajax({
        //         url: "{{ route('product.store') }}",
        //         method: 'POST',
        //         data: data,
        //         cache: false,
        //         processData: false,
        //         success: function(data) {
        //             console.log(data);
        //         }
        //     })
        // });
        $('#ProductForm').submit(function(e) {
            e.preventDefault();
            var file_data = $('#image').prop('files')[0];
            var name = $('#name').val();
            var sale = $('#sale').val();
            var price = $('#price').val();
            var info = CKEDITOR.instances.info.getData();
            var desc = CKEDITOR.instances.desc.getData();
            var quantity = $('#quantity').val();
            var brand_id = $('#brand_id').val();
            var category_id = $('#category_id').val();
            var value1 = $('input[name="value1[]"]').map(function() {
                return $(this).val();
            }).get();
            var name1 = $('input[name="name1[]"]').map(function() {
                return $(this).val();
            }).get();

            var form_data = new FormData();

            form_data.append('name', name);
            form_data.append('sale', sale);
            form_data.append('price', price);
            form_data.append('info', info);
            form_data.append('desc', desc);
            form_data.append('sale', sale);
            form_data.append('quantity', quantity);
            form_data.append('sale', sale);
            form_data.append('brand_id', brand_id);
            form_data.append('category_id', category_id);
            for (var i = 0; i < name1.length; i++) {
                form_data.append('name1[]', name1[i]);
            }
            for (var a = 0; a < value1.length; a++) {
                form_data.append('value1[]', value1[a]);
            }
            console.log(name1, value1);
            $.ajax({
                type: 'post',
                url: "{{ route('product.store') }}",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(res) {
                    // alert('Success');
                    console.log(res);
                    // location.reload();
                },
            })
        })
    </script>
@endsection
