<!doctype html>
<html lang="en">

<head>
    <title>THÀNH AN GROUP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="../client/img/logowebthanhan.jpg" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">



    {{-- <link href="..\client\css\bootstrap.min.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="../client/css/bootstrap.css">
    <link rel="stylesheet" href="../client/css/animate.css">
    <link rel="stylesheet" href="../client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../client/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../client/css/jquery.timepicker.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- <link rel="stylesheet" href="../client/css/ionicons.min.css"> --}}
    <link rel="stylesheet" href="../client/css/font-awesome.min.css">
    <link rel="stylesheet" href="../client/css/flaticon.css">


    <!-- Theme Style -->
    <link rel="stylesheet" href="../client/css/style.css">
</head>

<body>

    @include('client.header')
    <section class="section bg-white" style="background-image: url('../client/img/bg01.png');">
        <div class="container">
            <div class="row justify-content-center element-animate">
                <div class="col-md-8 text-center">
                  <div class="row justify-content-center">
                      <div class="col-md-2 col-sm-12 justify-content-center" style="border-bottom: 2px solid #030059">
                      <h4 class="text-uppercase heading border-bottom">LIÊN HỆ</h4>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center mt-4" >
                            <p>vui lòng để lại thông tin để Thành An liên hệ với bạn </p>
                        </div>
                    </div>
                    <form action="{{ route('client.contact') }}" method="POST" class="clearfix" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="input form-control" required type="text"
                                    id="fullname" name="fullname" placeholder="Họ và tên" value="{{ old('fullname') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="input form-control" type="tel" required pattern="[0-9]{10}"
                                    id="phone" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" required type="email"
                            id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea required id="message" name="message" class="form-control" cols="30"
                                rows="10" placeholder="Lời nhắn" >{{ old('message') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="GỬI" class="btn btn-primary form-control col-md-2">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-sm-12">
                    <section class="section">
                        <div class="container">
                            <div class="row" style="border: 1px solid #ced4da;">
                                <div class="col-md-12">
                                    <div class="row mb-3 mt-5">
                                        <div class="col-md-12 text-center">
                                            <h5>TIN TỨC NỘI BẬT</h5>
                                        </div>
                                    </div>
                                    <?php $a=0; ?>
                                    @foreach ($posts as $item2)
                                    @if ($item2['type'] == 4)
                                    <?php $a++ ?>
                                    <a href="{{ route('client.post.detail', $item2->slug) }}">
                                        <div class="row mb-3">
                                            <div class="col-md-4 mt-2">
                                                <img width="100%" height="auto" src="{{$item2['cover']}}"/>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$item2['name']}}</p>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                    @if($a==2)
                                        @break
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            
        </div>
    </section>
    <!-- END section -->
    <section>
        <div class="img-fluid">
            <img src="../client/img/banner12.png" width="100%" height="auto" alt="">
        </div>
    </section>
    @include('client.footer')
    <!-- END footer -->


    <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <label for="appointment_name" class="text-black">Full Name</label>
                            <input type="text" class="form-control" id="appointment_name">
                        </div>
                        <div class="form-group">
                            <label for="appointment_email" class="text-black">Email</label>
                            <input type="text" class="form-control" id="appointment_email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointment_date" class="text-black">Date</label>
                                    <input type="text" class="form-control" id="appointment_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointment_time" class="text-black">Time</label>
                                    <input type="text" class="form-control" id="appointment_time">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="appointment_message" class="text-black">Message</label>
                            <textarea id="appointment_message" class="form-control" cols="30"
                                rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="../client/js/jquery-3.2.1.min.js"></script> --}}
    <script src="../client/js/jquery-3.2.1.min.js"></script>
    <script src="../client/js/popper.min.js"></script>
    <script src="../client/js/bootstrap.min.js"></script>
    <script src="../client/js/owl.carousel.min.js"></script>
    <script src="../client/js/bootstrap-datepicker.js"></script>
    <script src="../client/js/jquery.timepicker.min.js"></script>
    <script src="../client/js/jquery.waypoints.min.js"></script>
    <script src="../client/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script>
        // function send(){
        //     var appointment_name = $.trim($('#appointment_name').val());
        //     var appointment_phone = $.trim($('#appointment_phone').val());
        //     var appointment_email = $.trim($('#appointment_email').val());
        //     var appointment_message = $.trim($('#appointment_message').val());
        //     if (appointment_name == "" || appointment_phone == "") {
        //     swal({
        //         title: "",
        //         text: "Vui lòng nhập thông tin mã bảo hành!",
        //         icon: "warning",
        //     })
        // } else {
        //     $.ajax({
        //         url:'https://mandrillapp.com/api/1.0/messages/send.json'
        //         type:'POST',
        //         data: $("#frmemail").serialize()
        //         console.log(data);
        //         success: function(){
        //             $('.success').fadeIn(1000);
        //             swal({
        //                 title: "",
        //                 text: "thành công!",
        //                 icon: "success",
        //             })
        //         }
        //         });
        //     })
        // } 

        function subFormSearch() {
        var code = $("#warranty_code").val();
        var text;
        if (appointment_name == "" || appointment_phone == "") {
            swal({
                title: "",
                text: "Vui lòng nhập thông tin mã bảo hành!",
                icon: "warning",
            })
        } else {
            $.ajax({
                url: 'http://winds.hopto.org:3000' + '/schedule/getWarrantyByCode?text=' + code,
                type: 'GET',
                success: function(res) {
                    $("#wcode").text(res.data.waranty.WarrantyCode);
                    $("#name_cus").text(res.data.waranty.PatientName);
                    $("#clinic").text(res.data.waranty.Clinic);
                    $("#factory").text(res.data.waranty.Factory);
                    $("#quantity").text(res.data.waranty.Quantity);
                    $("#emax").text(res.data.waranty.Material);
                    $("#start_date").text(res.data.waranty.StartDate);
                    $("#end_date").text(res.data.waranty.ExpiredDate);

                    $('.modal').on('hidden.bs.modal', function() {
                        $(this).find("input,textarea").val('');
                    });
                },
            })
        }

        // document.getElementById("warn").innerHTML = text;
    }
    </script>
</body>

</html>