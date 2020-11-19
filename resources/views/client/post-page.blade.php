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
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>{!!$post['description']!!}</h4>
                            </div>
                        </div>
                        <div class="row mt-4">
                        <div class="col-12">
                            {{-- <i class="fa fa-clock-o "> {{PLAYEDAT->format('d-m-Y H:i:s',$post['created_at'])}}</i> --}}
                            <i class="fa fa-clock-o "> {{$post['created_at']->format('H:i, d-m-Y')}} </i>
                        </div>
                        </div>
                        <div class="row mt-4">
                            <div class="container">
                                <img width="100%" height="auto" src="{{$post['cover']}}"/>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12 mt-3">
                                    <p>{!! $post['content'] !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
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
    <section>
        <div class="img-fluid">
            <a href="tel:0981481368" class="call-icon" rel="nofollow">
                <img src="../client/img/banner12.png" width="100%" height="auto" alt="">
            </a>
        </div>
    </section>
    <!-- END section -->
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
                            <textarea name="" id="appointment_message" class="form-control" cols="30"
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
    function subFormSearch() {
        var code = $("#warranty_code").val();
        var text;
        //console.log('url',API_URL+'/schedule/getWarrantyByCode?text='+code);
        if (code == "") {
            swal({
                title: "",
                text: "Vui lòng nhập thông tin mã bảo hành!",
                icon: "warning",
                // buttons: true,
                // dangerMode: true,
            })
        } else {
            $.ajax({
                url: 'http://winds.hopto.org:3000' + '/schedule/getWarrantyByCode?text=' + code,
                type: 'GET',
                success: function(res) {
                    // $("#myModal").show();
                    $("#myModal").modal("toggle");
                    // $("#myModal").css('display','block');
                    // console.log("res",res);
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                {{-- <h4 class="modal-title">Modal Heading</h4> --}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 text-center mt-5">
                        <img width="75%" height="auto" src="../client/img/banner11.png" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="text-uppercase heading border-bottom mb-2">Thông tin bảo hành</h2>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 title">Mã bảo hành</div>
                            <div class="col-md-6 text-dark text-center" id="wcode"></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 title">Tên khách hàng</div>
                            <div class="col-md-6 text-dark text-center" id="name_cus"></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 title">Nha khoa</div>
                            <div class="col-md-6 text-dark text-center" id="clinic"></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 title">Labo</div>
                            <div class="col-md-6 text-dark text-center" id="factory"></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 title">Phục hình</div>
                            <div class="col-md-6 text-dark text-center" id="quantity"></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 title">Vật liệu</div>
                            <div class="col-md-6 text-dark text-center" id="emax"></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 title">Ngày bắt đầu</div>
                            <div class="col-md-6 text-dark text-center" id="start_date"></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 title">Ngày kết thúc</div>
                            <div class="col-md-6 text-dark text-center" id="end_date"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>