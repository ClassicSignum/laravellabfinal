<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin!</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    <!-- <link rel="stylesheet" href="/public/css/admin.scss"> -->
    <link rel="stylesheet" href="/css/Chart.min.css">
</head>

<body>
    <!-- header part starts -->

    <header class="header-part">
        <div class="items container-fluid bg-dark">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img class="wow rotateIn" src="/images/travelia/logo.png" data-wow-duration="3s"
                        data-wow-iteration="40" height="50" width="60" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form class="form-inline ml-auto my-2 my-lg-0">
                        <a href="" class="bell mr-4">
                            <i class="fas fa-bell"></i>
                        </a>
                        <a href="/logout" role="button" class="btn btn-outline-success mr-4">Log out</a>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <!-- header part starts -->

    <!-- admin dash part starts -->
    <section class="admin-dash-part">

        <div class=" container-fluid">

            <div class="row">
                <div class="col-md-2">
                    <div class="items text-center">

                        <img src="/images/admin/admin.png" alt="">
                        <h4>Admin</h4>

                        <div class="row btns">
                            <div class="col-md-3">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <a href="/admin">Home</a>
                            </div>
                        </div>

                        <div class="row btns">

                            <div class="col-md-3">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <a href="/admin/adminProfile">My Info</a>
                            </div>
                        </div>

                        <div class="row btns">

                            <div class="col-md-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <a href="/admin/adminCustInfo">Customer Info</a>
                            </div>
                        </div>

                        <div class="row btns">

                            <div class="col-md-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                <a href="/admin/adminAddVehicle">Add a vehicle</a>
                            </div>
                        </div>

                        <div class="row btns">

                            <div class="col-md-3">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="col-md-9 text-center travel-font">
                                <a href="/admin/adminRentHistory">Rental History</a>
                            </div>
                        </div>
                        <div class="row btns">

                            <div class="col-md-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="col-md-9 text-center">
                                    <a href="/admin/adminBlog">All blogs</a>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-md-10">
                    <div class="items2">
                            <table class="table table-hover wow flipInX table-dark">
                                    <thead>
                                      <tr >
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Car</th>
                                        <th scope="col">Date from</th>
                                        <th scope="col">Date to</th>
                                        <th scope="col">Total Days</th>
                                        <th scope="col">Total Rent</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                             <?php
                             $count =0;
                             ?>
                             @foreach($result as $result) 
                                <?php $count++; ?>
                                 @if($result->status=="successful")
                                   <?php $btn="success"; ?>
                                 
                                 @else
                                    <?php $btn = "danger"; ?>
                                 
                            @endif
                                   
                           <form action="" method="post" >
                           <input type="hidden" name="email"  value="{{ $result->usermail }}">
                           <input type="hidden" name="cartitle"  value="{{ $result->cartitle }}">
                            
                          
                        
                               <tr>
                                   <th scope="row"><?=$count?></th>
                                   <td>{{ $result->usermail }}</td>
                                   <td>{{ $result->cartitle }}</td>
                                   <td>{{ $result->datefrom }}</td>
                                   <td>{{ $result->dateto }}</td>
                                   <td>{{ $result->rentday }}</td>
                                   <td>{{ $result->totalrent }}</td>
                                   <td>{{ $result->payment }}</td>
                                   
                                   <td> <input type="submit" class="btn btn-<?=$btn?>" name="submit" value="{{ $result->status}}"></td>
                                  
                                   
                                </tr>
                            </form> 
                        
                     @endforeach
                                    </tbody>
                                  </table>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- admin dash part ends -->









    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/Chart.min.js"></script>


</body>

</html>