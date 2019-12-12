<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/traveliaStyle.css">
  <link rel="stylesheet" href="/css/animate.css"> <!-- included in wow js -->
  <link rel="stylesheet" href="/css/all.min.css">
  <title>TRAVELIA!</title>
</head>

<style>

.col-md-2,.col-md-9{
    margin-top: 20px;
    margin-bottom: 20px;
    border: 1px solid grey;
}

</style>

<body>

  <!-- header part starts -->

  <header class="header-part">
    <div class="items container-fluid bg-dark">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/customer">
          <img class="wow rotateIn" src="/images/travelia/logo.png" data-wow-duration="3s" data-wow-iteration="40"
            height="50" width="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item active pr-4">
              <a class="" href="/customer">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="dhover1 nav-item dropdown pr-4 pb-0">
              <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                cars
              </a>
              <div class="dropdown-menu bg-dark dmenu1" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/customer/customerPrivateCar">PRIVATE CARS</a>
                <a class="dropdown-item" href="/customer/customerMicro">MICROBUS</a>
                <a class="dropdown-item" href="/customer/customerPickup">PICK-UP</a>
                
               
                
              </div>
            </li>

            <li class="nav-item pr-4">
                    <a class="" href="/customer/customerBlog">Blogs <span class="sr-only">(current)</span></a>
                  </li>

            <li class="nav-item pr-4">
              <a class="" href="/customer/customerAddBlog">Add a blog <span class="sr-only">(current)</span></a>
            </li>

            <li class="dhover2 nav-item dropdown pr-4 pb-0">
                <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Account
                </a>
                <div class="dropdown-menu bg-dark dmenu2" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/customer/customerProfile">My info</a>
                  <a class="dropdown-item" href="/customer/customerRentHistory">My rent history</a>
                                    
                </div>
              </li>


          </ul>
          <form class="form-inline my-2 my-lg-0">
           <a href="/logout" class="btn btn-outline-success mr-4">Log out</a>
        </form>
        </div>
      </nav>
    </div>
  </header>

  <!-- header part ends -->


  <!-- customer blog starts -->
  <section class="blog-part text-center">

    <h3 class=" font-weight-bolder">Blogs</h3>

    <div class="row">
        
            @foreach($result as $result)


            
                <div class="col-md-2">
                    {{ $result->usermail }}
                    
                    </div>
                    <div class="col-md-9">
                            {{ $result->blog }}
                    </div>
                    <div class="col-md-1 mt-3">
                      <a href="/customer/customerBlog/{{$result->id}}" class="btn btn-danger">Delete</a>
                    </div>
           @endforeach
        
    </div>

  </section>
  <!-- customer blog ends -->





  <!-- footer part starts -->
  <section class="footer-part">
    <div class="container">
      <div class="items text-center">
        <img src="/images/travelia/logo.png" alt="">
        <div class="info">
          <div class="row">
            <div class="col-md-7 text-white">
              <h4>More Info</h4>
              <h6>OUR AGREEMENT</h6>
              <br>
              <h6>BOOK NOW!</h6>
              <H4>Follow Us</H4>
              <div class="icons">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-google-plus"></i>
              </div>
            </div>
            <div class="col-md-5 text-white">
              <h4>Have Any Question ?</h4>
              <h6>VISIT HELP CENTER</h6>
              <br>
              <h6>CONTACT US</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- footer part ends -->









  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <!-- <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> -->
  <script src="/js/jquery-3.4.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/wow.js"></script>
  <script src="/js/jquery.hover3d.js"></script>




  <script>

    $(document).ready(function () {

    }); // document .ready ends





    $('.dhover1, .dmenu1').mouseenter(function () {
      $('.dmenu1').fadeIn();
    });
    $('.dhover1').mouseleave(function () {
      $('.dmenu1').fadeOut();
    });


    $('.dhover2, .dmenu2').mouseenter(function () {
      $('.dmenu2').fadeIn();
    });
    $('.dhover2').mouseleave(function () {
      $('.dmenu2').fadeOut();
    });

    var wow = new WOW();
    wow.init();


  </script>
  <script></script>


</body>

</html>