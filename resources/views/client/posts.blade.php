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
    <link rel="stylesheet" href="../client/css/style.css?v=212">
    <script src="../client/js/jquery-3.2.1.min.js"></script>

</head>

<body>

    @include('client.header')
    <section class="section bg-white" style="background-image: url('../client/img/bg01.png');">
      <div class="container">
          <div class="row element-animate mt-4 mb-4">
            <div class="col-md-8 text-center">
              <div class="row">
                  <div class="col-md-2 col-sm-12" style="border-bottom: 2px solid #030059">
                  <h4 class="text-uppercase heading border-bottom">TIN TỨC</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12 col-sm-12">
                {{-- <section class="section"> --}}
                  <div class="row">
                      <div class="col-md-8 col-sm-12">
                        @foreach ($posts as $item2)
                        @if (($item2['type'] == 4) && ($item2['is_hot'] =='on'))
                            <section class="section">
                            <div class="row">
                                {{-- <a href="{{route('client.post.detail'), $item2->slug }}"> --}}
                                  <img width="100%" height="auto" src="{{$item2['cover']}}"/>
                                {{-- </a> --}}
                            </div>
                            <div class="row content02">
                                <h5>{{$item2['name']}}</h5>
                            </div>
                            </section>
                        @endif
                        @endforeach
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <?php $a = 0; ?>
                          @foreach ($posts as $item2)
                                @if ($item2['type']==4)
                                <?php $a++; ?> 
                                <section class="section">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <img width="100%" height="auto" src="{{$item2['cover']}}" alt="">  
                                    </div>
                                    </div>
                                </section>
                                @endif
                                @if ($a==3)
                                    @break
                                @endif
                          @endforeach
                      </div>
                  </div>
                {{-- </section> --}}
            </div>
            <div class="col-md-6">
                <div class="container">
                    @foreach ($posts as $item2)
                        @if (($item2['type'] == 4) && ($item2['is_hot'] =='on') )
                        <div class="section">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 mb-2">
                                    <h5>{{$item2['name']}}</h5>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-1">
                                  <img width="100%" height="auto" src="{{$item2['cover']}}"/>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p>{{$item2['content']}}</p>
                                </div>
                                <div class="col-md-12 text-right">
                                    <a class="text-primary" href="{{ route('client.post.detail', $item2->slug) }}">chi tiết <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                  
                </div>
            </div>
        </div>
      </div>
  </section>
    <!-- END section -->

    <section class="section bg-white ">
      <div class="container">
          <div class="row justify-content-center element-animate">
              <div class="col-md-8 text-center">
                <div class="row justify-content-center">
                    <div class="col-md-2 col-sm-12 justify-content-center" style="border-bottom: 2px solid #030059">
                    <h4 class="text-uppercase heading border-bottom">SỰ KIỆN</h4>
                  </div>
                </div>
              </div>
          </div>
          <div class="row element-animate">
              <div class="major-caousel js-carousel-1 owl-carousel">
                  @foreach ($posts as $item2)
                  @if ($item2['type'] === 4)
                  <div class="media d-block media-custom">
                    <a href="{{ route('client.post.detail', $item2->slug) }}" class="btn-more"><img
                            src="{{$item2['cover']}}" alt="Image Placeholder" class="img-fluid img-news">
                        <div class="media-body">
                            <div class="row">
                              <h6 class="title_01">{{$item2['name']}}</h6>
                            </div>
                            <div class="row">
                              <p class="description_1">{{$item2['content']}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                  @endif
                  @endforeach
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
        $(document).ready(function() {
            $('.user-support').click(function(event) {
                $('.social-button-content').slideToggle();
            });
        });
    </script>
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

    }
    </script>
</body>

</html>