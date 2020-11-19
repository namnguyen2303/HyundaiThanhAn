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
        <div class="container-fluid scroll">
            <div class="row drop-nav">
                <div class="col-md-12">
                    <div id="myNav" class="overlay">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <div class="overlay-content">
                            <ul class="thumb">
                                <li id="0" class="myLi active">Về Thành An Group</li>
                                <li id="1" class="myLi">Sứ mệnh và tầm nhìn</li>
                                <li id="3" class="myLi">Giá trị cốt lõi</li>
                                <li id="2" class="myLi">Mục tiêu</li>
                            </ul>
                        </div>
                      </div>
                      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                </div>
            </div>
            <div class="row canHide">
                <div class="col-md-1 scroll_task">
                    <ul class="thumbs" style="">
                        <li class=""></li>
                        <li class=""></li>
                        <li class=""></li>
                        <li class=""></li>
                    </ul>
                </div>
                <div class="col-md-6 scroll_task_bot">
                    <ul class="thumb">
                        <li id="0" class="myLi active">Về Thành An Group</li>
                        <li id="1" class="myLi">Sứ mệnh và tầm nhìn</li>
                        <li id="3" class="myLi">Giá trị cốt lõi</li>
                        <li id="2" class="myLi">Mục tiêu</li>
                    </ul>
                </div>
            </div>
        </div>
    <section>
        @foreach ($posts as $item2)
        @if ($item2['slug'] == 've-thanh-an-group' || $item2['slug'] == 'su-menh-va-tam-nhin' || $item2['slug'] == 'gia-tri-cot-loi' || $item2['slug'] == 'muc-tieu')
        <div class="img-fluid container-fluid slide" style="background-image: url('{{$item2['cover']}}');">
            <div class="row">
                <div class="col-md-9 offset-md-3 col-sm-12 pt-5 content_03">
                    <div class="row">
                        <div class="col-md-12 text-left"><h2 class="text-white">{{$item2['name']}}</h2></div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 pt-4">
                            <p class="text-white">{{$item2['content']}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 ml-3 col-3" style="border-bottom: 3px solid #F89F18">
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        @endif
        @endforeach

    </section>
    <section>

    </section>
    <!-- END section -->
    @include('client.footer')
    <!-- END footer -->
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
        $(document).ready(function(){
            $.each($(".slide"),function(index,value){
                var i=index.toString();
                $(this).addClass(i);
            })
            $.each($(".slide"),function(index,value){
                if(index!=0){
                    $(this).hide();
                }    
            })
            $(".myLi").click(function(){
                $('.myLi').not(this).removeClass('active')
                $(this).toggleClass('active')

                var idDiv=$(this).attr('id');
                $.each($(".slide"),function(index,value){
                    $(this).fadeOut();
                    if(index==idDiv){
                        $("."+index).fadeIn();
                    }
                })
            })
        })
    </script>
    <script>
        function openNav() {
          document.getElementById("myNav").style.height = "100%";
        }
        function closeNav() {
          document.getElementById("myNav").style.height = "0%";
        }
        $( "li" ).click(function() {
            document.getElementById("myNav").style.height = "0%";
        });
    </script>
             
</body>

</html>