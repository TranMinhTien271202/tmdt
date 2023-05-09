@extends('shop::layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới thương hiệu.</h3>
                        </div>
                        <form id="BrandForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên thương hiệu.</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Mời nhập tên thương hiệu">
                                    <span class="text-danger error-text name_err"></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="btn-save" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
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
                        required: "Tên thương hiệu không để trống",
                    },
                }
            });
        });
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('brand.index') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('#btn-save').click(function(e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var url = "{{ route('brand.store') }}"
                var name = $('#name').val();
                console.log(url, name, _token);
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        name: name,
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
                            url: "{{ route('brand.index') }}" + '/' + _id,
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
