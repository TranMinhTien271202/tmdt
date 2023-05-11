@extends('shop::layout.app')
@section('style')
    @parent
    <style>
        .vnd{
            font-size:8px
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách sản phẩm</h3>
                        </div>
                        <div class="card-body">
                            <table class="table" id="data-table">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Name</th>
                                        <th>price <span class="vnd">Đơn vị: Nghìn Đồng</span></th>
                                        <th>sale <span class="vnd">Đơn vị: Nghìn Đồng</span></th>
                                        <th>brand</th>
                                        <th>category</th>
                                        <th>code</th>
                                        <th>view</th>
                                        <th>quantity</th>
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
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/dataRender/number_format.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('product.index') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'price',
                        render: $.fn.dataTable.render.number('.', '.')
                    },
                    {
                        data: 'sale',
                    },
                    {
                        data: 'brand_id',
                    },
                    {
                        data: 'category_id',
                    },
                    {
                        data: 'code_product',
                    },
                    {
                        data: 'view',
                    },
                    {
                        data: 'quantity',
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
                            url: "{{ route('product.index') }}" + '/' + _id,
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
