<header role="banner">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h1 class="mt-4"><a class="" href="{{route('client.home')}}">
                        <img width="95%" height="auto" src="../client/img/logo01.png" alt="">
                    </a></h1>
                </div>
                <div class="col-md-6 col-sm-12 text-left">
                    <div class="collapse navbar-collapse mt-2" id="navbarsExample05">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('client.home')}}">TRANG CHỦ</a>
                            </li>
                            <li class="nav-item ml-3">
                                <a class="nav-link text-dark" href="{{ route('client.introduce') }}">VỀ CHÚNG TÔI</a>
                            </li>
                            <li class="nav-item ml-3">
                                <a class="nav-link text-dark" href="{{ route('client.news') }}">TIN TỨC - SỰ KIỆN</a>
                            </li>
                            <li class="nav-item ml-3">
                                <a class="nav-link text-dark" href="{{route('client.contacts')}}">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row slide-nav">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="{{route('client.home')}}">TRANG CHỦ</a>
                    <a href="{{ route('client.introduce') }}">VỀ CHÚNG TÔI</a>
                    <a href="{{ route('client.news') }}">TIN TỨC - SỰ KIỆN</a>
                    <a href="{{route('client.contacts')}}">LIÊN HỆ</a>
                  </div>
                  <button onclick="openNav()" class="navbar-toggler ml-4" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>

</header>
<!-- END header -->
<section class="home-slider owl-carousel">
    @if (isset($slides))
    @foreach ($slides as $item)
    <div class="slider-item img-fluid">
        <img src="{{$item['image']}}" width="100%" height="auto" alt="">
    </div>
    @endforeach
    @endif
    {{-- <div class="slider-item img-fluid">
        <img src="../client/img/slide01.png" width="100%" height="auto" alt="">
    </div> --}}
</section>
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    console.log(dropdown);
    var i;
    for (i = 0; i < dropdown.length; i++) {
        // console.log(dropdown.length);
      dropdown[i].addEventListener("click", function() {
        // console.log(dropdown[0]);
      this.classList.toggle("actives");
      var dropdownContent = this.nextElementSibling;
      // console.log(dropdownContent);
        console.log(nextElementSibling);
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }
    
    </script>
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }
        
        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>