<!doctype html>
<html lang="en">

<head>
    <title>THÀNH AN GROUP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
<style type="text/css">
    .dropdown-menu>li>a:hover{
background-color:rgba(216,216,216,1);
background-image:none;
color:#000;
}
.divider{
background-color:#fff;
}
.dropdown-submenu{
position:relative;
}
.dropdown-submenu>.dropdown-menu{
top:0;
left:100%;
margin-top:-6px;
margin-left:-1px;
-webkit-border-radius:0 6px 6px 6px;
-moz-border-radius:0 6px 6px 6px;
border-radius:0 6px 6px 6px;
}
.dropdown-submenu>a:after{
display:block;
content: " ";
float:right;
width:0;
height:0;
border-color:transparent;
border-style: solid;
border-width:5px 0 5px 5px;
border-left-color: #cccccc;
margin-top:5px;
margin-right: -10px;
}
.dropdown-submenu:hover>a:after{
border-left-color: #555;
}
.dropdown-submenu.pull-left{
float:none;
}
.dropdown-submenu.pull-left>.dropdown-menu{
left:100%;
margin-left:1-0px;
-webkit-border-radius:6px 0 6px 6px;
-moz-border-radius:6px 0 6px 6px;
border-radius:6px 0 6px 6px;
}
.rev{
left:auto !important;
right:100% !important;
top:8px !important;
margin-right:-12px !important;
}    
</style>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">LOGO HERE!</a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Categories</a></li>
                            <li><a href="#">Blog Post</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Search Engines</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Google</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="https://adwords.google.com" target="_blank">Google Adwords</a></li>
                                            <li><a href="https://analytics.google.com" target="_blank">Google Analytics</a></li>
                                            <li><a href="https://www.google.com/webmaster/" target="_blank">Webmaster Tools</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="http://www.yahoo.com">Yahoo</a></li>
                                    <li><a href="http://www.msn.com">MSN</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">All Tags</a></li>
                        </ul>
                    </li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>           
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
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
    <script type="text/javascript">
        (function($){
  
        $.fn.visible = function(partial,hidden,direction,container){

            if (this.length < 1)
                return;

            var $t          = this.length > 1 ? this.eq(0) : this,
                            isContained = typeof container !== 'undefined' && container !== null,
                            $w                = isContained ? $(container) : $(window),
                            wPosition        = isContained ? $w.position() : 0,
                t           = $t.get(0),
                vpWidth     = $w.outerWidth(),
                vpHeight    = $w.outerHeight(),
                direction   = (direction) ? direction : 'both',
                clientSize  = hidden === true ? t.offsetWidth * t.offsetHeight : true;

            if (typeof t.getBoundingClientRect === 'function'){

                // Use this native browser method, if available.
                var rec = t.getBoundingClientRect(),
                    tViz = isContained ?
                                                    rec.top - wPosition.top >= 0 && rec.top < vpHeight + wPosition.top :
                                                    rec.top >= 0 && rec.top < vpHeight,
                    bViz = isContained ?
                                                    rec.bottom - wPosition.top > 0 && rec.bottom <= vpHeight + wPosition.top :
                                                    rec.bottom > 0 && rec.bottom <= vpHeight,
                    lViz = isContained ?
                                                    rec.left - wPosition.left >= 0 && rec.left < vpWidth + wPosition.left :
                                                    rec.left >= 0 && rec.left <  vpWidth,
                    rViz = isContained ?
                                                    rec.right - wPosition.left > 0  && rec.right < vpWidth + wPosition.left  :
                                                    rec.right > 0 && rec.right <= vpWidth,
                    vVisible   = partial ? tViz || bViz : tViz && bViz,
                    hVisible   = partial ? lViz || rViz : lViz && rViz;

                if(direction === 'both')
                    return clientSize && vVisible && hVisible;
                else if(direction === 'vertical')
                    return clientSize && vVisible;
                else if(direction === 'horizontal')
                    return clientSize && hVisible;
            } else {

                var viewTop                 = isContained ? 0 : wPosition,
                    viewBottom      = viewTop + vpHeight,
                    viewLeft        = $w.scrollLeft(),
                    viewRight       = viewLeft + vpWidth,
                    position          = $t.position(),
                    _top            = position.top,
                    _bottom         = _top + $t.height(),
                    _left           = position.left,
                    _right          = _left + $t.width(),
                    compareTop      = partial === true ? _bottom : _top,
                    compareBottom   = partial === true ? _top : _bottom,
                    compareLeft     = partial === true ? _right : _left,
                    compareRight    = partial === true ? _left : _right;

                if(direction === 'both')
                    return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop)) && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
                else if(direction === 'vertical')
                    return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop));
                else if(direction === 'horizontal')
                    return !!clientSize && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
            }
        };

    })(jQuery);

    $(document).ready(function(){
        $('a[data-toggle=dropdown]').on('click', function(e){

            e.stopPropagation();
            e.preventDefault();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');

            if($(window).width() > 767){

                if($(this).parent('li').hasClass('open')){

                    if(!$(this).next('ul').visible()){

                        console.log('not visible');
                        $(this).next('ul').addClass('rev');

                    }

                }else{
                    $(this).next('ul').removeClass('rev');
                }

            }

        });

    });
</script>
</body>

</html>