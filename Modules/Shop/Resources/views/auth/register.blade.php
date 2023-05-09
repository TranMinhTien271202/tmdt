<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('dist/css/login.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        <style>
        .text-danger {
            color: red;
        }
        .error {
            font-size: 12px;
            color: red;
        }
    </style>
</head>

<body>
    <h2>Đăng nhập sinh viên</h2>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form id="myForm">
                <h1>Tạo tài khoản</h1>
                <span>Vui lòng sử dụng email của bạn để đăng ký</span>
                <input type="text" name="name" id="name" placeholder="Name" />
                <span class="text-danger error-text name_err"></span>
                <input type="email" name="email" id="email" placeholder="Email" />
                <span class="text-danger error-text email_err"></span>
                <input type="password" name="password" id="password" placeholder="Password" />
                <span class="text-danger error-text password_err"></span>
                <button type="submit" id="btn-create">Đăng ký</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Nếu bạn đã có tài khoản</h1>
                    <p>Hãy đăng nhập để đồng hành cùng chúng tôi.</p>
                    <a href=""><button class="ghost" id="signUp">Đăng nhập</button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                    name: {
                        required: true,
                    }
                },
                messages: {
                    email: {
                        required: "Email không để trống",
                        email: "Email vui lòng nhập đúng định dạng",
                    },
                    password: {
                        required: "Mật khẩu không được để trống.",
                        minlength: "Mật khẩu tối thiểu 6 ký tự",
                    },
                    name: {
                        required: "Tên không được để trống",
                    }
                }
            });
        });
        $(function() {
            /*Pass Header Token*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btn-create').click(function(e) {
                e.preventDefault();
                $(this).html('loading...');
                var _token = $("input[name='_token']").val();
                var url = "{{ route('register.post') }}"
                var email = $('#email').val();
                var password = $('#password').val();
                var name = $('#name').val();
                console.log(url, email, password, name);
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        email: email,
                        password: password,
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
                            setTimeout(() => {
                                window.location = '/shop/';
                            }, 800);
                        } else {
                            printErrorMsg(data.message);
                        }
                        // alert(data.success);

                    }

                })
            });

            function printErrorMsg(msg) {
                $.each(msg, function(key, value) {
                    console.log(key);
                    $('.' + key + '_err').text(value);
                });
            }
        });
    </script>
</body>

</html>
