@extends('shop::layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới loại sản phẩm</h3>
                        </div>
                        <form id="BrandForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên loại sản phẩm</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Mời nhập tên thương hiệu">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Loại danh mục</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value="">Danh mục gốc</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text parent_id_err"></span>
                                </div> --}}
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="btn-save" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="ajaxModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modelHeading"></h4>
                            </div>
                            <div class="modal-body">
                                <form id="productForm" name="productForm" class="form-horizontal">
                                    <input type="hidden" name="_id" id="_id">
                                    <div class="form-group">
                                        <label for="name" class="col-sm control-label">Tên lớp</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Name" value="" maxlength="50" required="">
                                            <span class="text-danger error-text name_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Lưu
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách thương hiệu</h3>
                        </div>
                        <div class="card-body">
                            <table class="table" id="data-table">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Name</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @parent
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#BrandForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Tên loại sản phẩm không để trống",
                    },
                }
            });
        });
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('category.index') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                rowGroup: {
                    dataSrc: 'parent_id',
                    startRender: function(rows, group) {
                        var groupRow = $('<tr/>')
                            .addClass('parent')
                            .append($('<td colspan="5"/>').text(group));

                        return groupRow;
                    }
                }
            });
            $('#btn-save').click(function(e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var url = "{{ route('category.store') }}"
                var name = $('#name').val();
                var parent_id = $('#parent_id').val();
                console.log(url, name, _token);
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        name: name,
                        parent_id: parent_id
                    },
                    success: function(data) {
                        console.log(data);
                        if ($.isEmptyObject(data.message)) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                },
                            })
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                            $('#BrandForm').trigger("reset");
                            table.draw();
                        } else {
                            printErrorMsg(data.message);
                        }
                    }
                })
            });
            $('body').on('click', '.deleteProduct', function() {
                var _id = $(this).data("id");
                Swal.fire({
                    title: 'Bạn có muốn xóa?',
                    text: "Bạn sẽ không thể hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xóa'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('category.index') }}" + '/' + _id,
                            success: function(data) {
                                if (data.status == 1) {
                                    Swal.fire(
                                        'Deleted!',
                                        data.success,
                                        'success'
                                    )
                                    table.draw();
                                } else {
                                    Swal.fire(
                                        'Deleted!',
                                        data.error,
                                        'error'
                                    )
                                }
                                table.draw();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                })
            });
        });

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                console.log(key);
                $('.' + key + '_err').text(value);
            });
        }
    </script>
@endsection
