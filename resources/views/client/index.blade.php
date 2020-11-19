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
    <section class="section bg-light " style="background-image: url('../client/img/bg01.png');">
        <div class="container mb-5">
            <div class="row align-items-center mt-5">
                <div class="col-md-6 col-sm-12 stretch-left-1 element-animate text-center"
                    data-animate-effect="fadeInLeft" >
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <img width="100%" height="auto" src="../client/img/banner02.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-left-1-offset pl-md-5 pl-0 element-animate"
                    data-animate-effect="fadeInLeft">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row justify-content-center element-animate mb-3">
                                <div class="col-md-8 text-center">
                                    <h4 class="text-uppercase heading border-bottom">HỆ THỐNG PHÂN PHỐI</h4>
                                </div>
                            </div>
                    
                            <div class="row sh-page">
                                
                                <div class="accordion col-md-12 col-sm-12" id="accordionExample">
                                    @foreach ($branchesParent as $item3)
                                    <div class="card">
                                            <div class="drop-bot col-12 col-md-12 col-sm-12" data-toggle="collapse" data-target="#{{$item3['id']}}">
                                                <label class="" style="color: #F89F18"><i class="fa fa-map-marker mr-2"></i>{{$item3['name']}}</label>
                                            </div>
                                       <div id="{{$item3['id']}}" class="collapse"
                                          aria-labelledby="headingOne" data-parent="#accordionExample">
                                          <div class="pl-3" id="accordionExamples">
                                          @foreach ($branchesChild as $item4)
                                          @if ($item4['parent_id'] == $item3['id'])
                                            <div class="card">
                                               <div id="headingTwo">
                                                  <h5 class="mb-0">
                                                    <label class="btn" data-toggle="collapse" data-target="#{{$item4['id']}}">
                                                        {{$item4['name']}}
                                                        <i class="fa fa-angle-down"></i>
                                                    </label>
                                                  </h5>
                                               </div>
                                               <div id="{{$item4['id']}}" class="collapse"
                                                  aria-labelledby="headingTwo" data-parent="#accordionExamples">
                                                  <div class="row">
                                                    <div class="col-md-11 offset-md-1 content01">
                                                        <p><b>{{$item4['name']}}</b></p>
                                                        <p><b> Địa chỉ :</b> {{$item4['address']}}</p>
                                                        <p> <b>Hotline :</b> {{$item4['phone']}}</p>
                                                        <p> <b>Website :</b> <a href="" style="color: #007bff">{{$item4['web']}}</a></p>
                                                    </div>
                                                </div>
                                               </div>
                                            </div>
                                          @endif   
                                      @endforeach
                                    </div>
                                       </div>
                                    </div>
                                    @endforeach
                                </div>
                                {{-- @foreach ($branchesParent as $item3)
                                   <div class="drop-bot col-12 col-md-12 col-sm-12" data-toggle="collapse" data-target="#{{$item3['id']}}">
                                        <label class="" style="color: #F89F18"><i class="fa fa-map-marker mr-2"></i>{{$item3['name']}}</label>
                                    </div>
                                <div class="collapse col-md-12 col-sm-12" id="{{$item3['id']}}" data-parent="#accordionExample" >
                                    @foreach ($branchesChild as $item4)
                                        @if ($item4['parent_id'] == $item3['id'])
                                                <label class="btn" data-toggle="collapse" data-target="#{{$item4['id']}}">
                                                    {{$item4['name']}}
                                                    <i class="fa fa-angle-down"></i>
                                                </label>
                                                <div id="{{$item4['id']}}" class="collapse">
                                                    <div class="row">
                                                        <div class="col-md-11 offset-md-1 content01">
                                                            <p>{{$item3['name']}}</p>
                                                            <p>Địa chỉ : {{$item4['address']}}</p>
                                                            <p>Hotline: {{$item4['phone']}}</p>
                                                            <p>Website: <a href="" style="color: #007bff">{{$item4['web']}}</a></p>
                                                        </div>
                                                    </div>
                                                 </div>
                                        @endif   
                                    @endforeach
                                </div>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- END section -->

    <section class="section bg-white">
        <div class="container">
            <div class="row justify-content-center element-animate">
                <div class="col-md-8 text-center">
                  <div class="row justify-content-center">
                      <div class="col-md-2 col-sm-12 justify-content-center" style="border-bottom: 2px solid #030059">
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
                                    <img width="100%" height="auto" src="{{$item2['cover']}}"/>
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
                                            <a href="{{ route('client.post.detail', $item2->slug) }}">
                                                <img width="100%" height="auto" src="{{$item2['cover']}}" alt="">  
                                            </a>
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
                                        <a style="color: blue" href="{{ route('client.post.detail', $item2->slug) }}">Chi tiết <i class="fa fa-angle-double-right"></i></a>
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
    <section>
        <div class="img-fluid">
            <a href="tel:0981481368" class="call-icon" rel="nofollow">
                <img src="../client/img/banner12.png" width="100%" height="auto" alt="">
            </a>
        </div>
    </section>
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
    {{-- <script>
        $(document).ready(function() {
            $('.user-support').click(function(event) {
                $('.social-button-content').slideToggle();
            });
        });
    </script> --}}
    <script>
        // var drop = document.getElementsByClassName("drop-bot");
        // var y = document.getElementsByClassName("dropdown-btn");
        // for (var x = 0; x < drop.length; x++){
        //     console.log(drop[x]);
        //     drop[x].addEventListener("click", function(){
        //         var dropContent = this.nextElementSibling;
        //         console.log(dropContent);
        //         if(dropContent.style.display == "block"){
        //             dropContent.style.display = "none";
        //         }
        //         else{
        //             dropContent.style.display = "block";
        //         }
        //     })
        // }
        // $('.dropdown-btn').click(function(){
        //     var id = $(this).attr('id');
        //     $.each($(".dropdown-container"),function(index,value){
        //         $(this).fadeOut();
        //         if(index==id){
        //             $('.'+index).fadeIn();
        //         }
        //     })
        // })
        function closeModal(){
            $('#banner').hide();
        }
        // var dropdown = document.getElementsByClassName("dropdown-btn");
        // var i;
        // for (i = 0; i < dropdown.length; i++) {
        //     // console.log(dropdown[i]);
        //     dropdown[i].addEventListener("click", function() {
        //     var dropdownContent = this.nextElementSibling;
        //     console.log(dropdownContent);
        //     if (dropdownContent.style.display == "block") {
        //     dropdownContent.style.display = "none";
        //     } else {
        //     dropdownContent.style.display = "block";
        //     }
        //     });
        // }
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
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