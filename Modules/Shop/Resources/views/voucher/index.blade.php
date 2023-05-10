@extends('shop::layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
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
                                <div class="form-group">
                                    <label>Ngày bắt đầu</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date"
                                        placeholder="Mời nhập tên thương hiệu">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                                <div class="form-group">
                                    <label>Ngày kết thúc</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date"
                                        placeholder="Mời nhập tên thương hiệu">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                                <div class="form-group">
                                    <label>Loại giảm giá</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="1">Giảm theo %</option>
                                        <option value="2">Giảm theo giá</option>
                                    </select>
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                                <div class="form-group">
                                    <label>giá trị muốn giảm</label>
                                    <input type="text" class="form-control" name="value" id="value"
                                        placeholder="nhập giá trị muốn giảm">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả mã giảm giá</label>
                                    <input type="text" class="form-control" name="info" id="info"
                                        placeholder="nhập giá trị muốn giảm">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="btn-save" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col">
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
                                        <th>giá trị</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
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
                    url: "{{ route('voucher.index') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'value',
                    },
                    {
                        data: 'start_date',
                    },
                    {
                        data: 'end_date',
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
            $('#btn-save').click(function(e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var url = "{{ route('voucher.store') }}"
                var name = $('#name').val();
                var type = $('#type').val();
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                var info = $('#info').val();
                var value = $('#value').val();
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        name: name,
                        type: type,
                        start_date: start_date,
                        end_date: end_date,
                        info: info,
                        value: value
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
