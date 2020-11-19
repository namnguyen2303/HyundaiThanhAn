<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="row">
                    <div class="col-md-5 col-7">
                        <img width="100%" height="auto" src="../client/img/logo02.png" />
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-white" style="border-bottom: 1px solid #ced4da;">Hyundai Thành An - Thành An Group</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p><i class="fa fa-phone mr-2"></i>Hotline: 098 950 9292</p>
                                <p><i class="fa fa-envelope mr-2"></i>Email: CSKH@gmail.com</p>
                                <p><i class="fa fa-map-marker mr-2"></i>Địa chỉ: Tầng 7,tòa nhà HH2 Bắc Hà, 15 Tố Hữu, Thanh Xuân, Hà Nội</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 col-sm-12">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-white" style="border-bottom: 1px solid #ced4da;">Khác</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p><a class="text-white" href="{{ route('client.news') }}">Tin tức</a></p>
                                <p><a class="text-white" href="{{route('client.contacts')}}">Liên hệ</a></p>
                                <p><a class="text-white" href="{{ route('client.introduce') }}">Về chúng tôi</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-1">
                        <div class="row text-center">
                            <a href=""> <img width="100%" height="auto" src="../client/img/logo03.png" alt=""></a>
                            <a href=""> <img class="pl-2" width="100%" height="auto" src="../client/img/logo04.png" alt=""></a>
                            <a href=""> <img class="pl-2" width="100%" height="auto" src="../client/img/logo05.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->
<div class="tuvan modal_trigger" data-toggle="modal" data-target="#myModal">
    <a href="#view-baogia">
        <img width="100%" height="auto" src="../client/img/banner14.png">
    </a>
</div>
<div class="social-button">
    <div class="social-button-content">
        <a href="tel:0981481368" class="call-icon" rel="nofollow">
            {{-- <i class="fa fa-comments-o" aria-hidden="true"></i> --}}
            <div class="animated alo-circle"><img width="100%" height="auto" src="../client/img/alo.png" alt=""></div>
            <div class="animated alo-circle-fill"></div>
            <span>Hotline: 098 950 9292</span>
        </a>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        {{-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div> --}}
        <div class="modal-body">
            <div class="row">
               <div class="col-12 text-center">
                <h3>YÊU CẦU TƯ VẤN</h3>
               </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                 <img src="../client/img/banner16.png" alt="">
                </div>
             </div>
             <div class="row">
                <div class="col-12 text-center mt-4">
                    <p>nhập thông tin để nhận được sự tư vấn từ chúng tôi</p>
                </div>
             </div>
             <div class="row">
                <div class="col-12 text-center">
                 <h5>Lựa chọn đại lý tư vấn</h5>
                </div>
             </div>
             <div class="row">
                <div class="col-12 mt-4">
                    <select name="" id="txtshop" class="form-control">
                        <option value="0" selected>---</option>
                        <option value="18">Đại lý Cao Bằng</option>
                        <option value="20">Hyudai Hưng Yên</option>
                        <option value="19">Hyudai Long Biên</option>
                        <option value="1">Hyudai Tây Hồ</option>
                        <option value="2">Hyudai Lê Văn Lương</option>
                        <option value="22">Hyudai Lào Cai</option>  
                        <option value="23">Hyudai Lạng Sơn</option>
                        <option value="24">Hyudai Hòa Bình</option>
                    </select>
                </div>
             </div>
             <div class="row mt-3">
                <div class="col-md-4">
                    <input type="text" id="txtfullname" class="form-control" placeholder="Họ và tên">
                </div>
                <div class="col-md-4">
                    <input type="text" id="txtemail" class="form-control" type="email" placeholder="Địa chỉ email">
                </div>
                <span id="mailFormat" class="text-danger" style="display: none;">Vui lòng nhập đúng định dạng email</span>
                <div class="col-md-4">
                    <input type="text" id="txtphone" class="form-control" placeholder="Số điện thoại" pattern="[0-9]{10}" required>
                </div>
             </div>
             <div class="row">
                <div class="col-12 mt-3">
                    <input type="text" id="txtnote" placeholder="ghi chú yêu cầu khác" class="form-control">
                </div>
             </div>
             <span id="validateall" class="text-danger pl-1" style="font-size:small"></span>
             <div class="row">
                <div class="col-12 mt-4">
                    <div class="text-center">
                        <button class="btn btn-default btn_send" onclick="sendinfor()" style="background: #030059;color: #fff">Gửi yêu cầu</button>
                    </div>
                </div>
             </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
  
    </div>
  </div>
<script>
// $(document).ready(function() {
//     $('.user-support').click(function(event) {
//         $('.social-button-content').slideToggle();
//     });
// });

//Gửi thông tin khách hàng

function sendinfor(){
        // console.log('đây rồi!');
        var shopId = $('#txtshop').val();
        var nameCus = $('#txtfullname').val();
        var phoneCus = $('#txtphone').val();
        var emailCus = $('#txtemail').val();
        var noteCus = $('#txtnote').val();

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!emailCus.match(mailformat)){
            $('#mailFormat').fadeOut();
        }
        $.ajax({
            url: 'http://admin.hyundaithanhan.vn/api/service/'+'adviceFree',
            type: 'POST',
            data:{
                shopID:shopId,
                name:nameCus,
                phone:phoneCus,
                email:emailCus,
                note:noteCus
            },
            success: function(res){
                console.log(res);
                if(res.status == 1){
                    $('#myModal').modal('toggle');
                    swal({
                        title:'Gửi yêu cầu thành công',
                        text:'',
                        icon:'success'
                    })
                }
                else{
                    return $('#validateall').text(res.message);
                }
            }
        })
    }
</script>