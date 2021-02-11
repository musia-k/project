<?php
$page = "gallery";
include "header.php"; 
?> 

<!-- Create the content here -->
<main>
    <div class="container-content d-block d-lg-block mx-auto">
        
        <!-- row -->
        <div class="row mx-auto">

            <!-- left column -->
            <div class="col-7 col-sm-7 col-md-7 col-lg-6 col-xl-7 justify-content-evenly">

                <!-- title city -->
                <div class="div-title d-block d-lg-block">
                    <h1>Rent a car in <span class="city">Helsinki</span></h1>
                </div>

                <!-- calendar -->
                <div class="d-block d-lg-none col-12 div-calendar mx-auto">
                    <div class="col-12 calendar-title mx-auto text-center">
                        <h3>Date and Time</h3>
                    </div>
                    <div class="col-12 calendar-content mx-auto">
                        <div class="row mt-4">
                            <div class="col-3 calendar-start">
                                <h4>start:</h4>
                            </div>
                            <div class="col-4 box1">
                                <img src="src/images/calendar/calendar.svg" alt="">
                                <div class="calendar-date">
                                    15
                                </div>
                                <div class="calendar-day">
                                    fr
                                </div>
                                <div class="calendar-month">
                                    jan
                                </div>
                            </div>
                            <div class="col-3 box2">
                                <img src="src/images/calendar/clock.svg" class="clock" alt="">
                                <div class="calendar-time">
                                    8:25 am
                                </div>
                            </div>
                            <div class="col-3 calendar-end">
                                <h4>end:</h4>
                            </div>
                            <div class="col-4 box3" style="">
                                <img src="src/images/calendar/calendar.svg" alt="">
                                <div class="calendar-date">
                                    17
                                </div>
                                <div class="calendar-day">
                                    su
                                </div>
                                <div class="calendar-month">
                                    jan
                                </div>
                            </div>
                            <div class="col-3 box4" style="">
                                <img src="src/images/calendar/clock.svg" class="clock" alt="">
                                <div class="calendar-time">
                                    7:00 pm
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end calendar -->

                <!-- row -->
                <div class="row justify-content-center">
                    <!-- left card -->
                    <div class="col-12 col-lg">
                        <!-- Car1 -->
                        <div class="col-12 div-card mx-auto">
                            <div class="div-card-header">
                                <h2>Skoda Fabia</h2>
                                <p>1.4 / Gasoline / Mechanic</p>
                                <div class="div-card-type">
                                    <p>ECONOM</p>
                                </div>
                            </div>
                            <div class="div-card-img">
                                <img src="src/images/car-details/skoda-fabia.jpg" alt="Skoda Fabia">
                            </div>
                            <div class="div-card-footer">
                                <div class="div-card-extra">
                                    <img src="src/images/car-details/Picture1.png" alt="">
                                </div>
                                <div class="div-card-price">
                                    <p>from </p><h2>18€</h2>
                                </div>
                                <div class="div-card-button">
                                    <a href="#" class="card-button">Rent in 1 click</a>
                                </div>
                            </div>
                        </div>
                        <!-- end car1 -->

                        <!-- car3 -->
                        <div class="col-12 div-card mx-auto">
                            <div class="div-card-header">
                                <h2>Suzuki Vitara</h2>
                                <p>1.4 / Gasoline / Auto</p>
                                <div class="div-card-type">
                                    <p style="background-color: rgb(136, 177, 255);">suv</p>
                                </div>
                            </div>
                            <div class="div-card-img">
                                <img src="src/images/car-details/grand-vitara.jpg" alt="Suzuki Vitara">
                            </div>
                            <div class="div-card-footer">
                                <div class="div-card-extra">
                                    <img src="src/images/car-details/Picture1.png" alt="">
                                </div>
                                <div class="div-card-price">
                                    <p>from </p><h2>18€</h2>
                                </div>
                                <div class="div-card-button">
                                    <a href="#" class="card-button">Rent in 1 click</a>
                                </div>
                            </div>
                        </div>
                        <!-- end car3 -->
                    </div>
                    <!-- end left card -->

                    <!-- right card -->
                    <div class="col-12 col-lg mx-auto">

                        <!-- car2 -->
                        <div class="col-12 div-card mx-auto">
                            <div class="div-card-header">
                                <h2>Hyundai Accent</h2>
                                <p>1.4 / Gasoline / Auto</p>
                                <div class="div-card-type">
                                    <p>econom</p>
                                </div>
                            </div>
                            <div class="div-card-img">
                                <img src="src/images/car-details/hyundai-accent.jpg" alt="Hyundai" style="/* margin-top: -20px; */">
                            </div>
                            <div class="div-card-footer">
                                <div class="div-card-extra">
                                    <img src="src/images/car-details/Picture2.png" alt="">
                                </div>
                                <div class="div-card-price">
                                    <p>from </p><h2>22€</h2>
                                </div>
                                <div class="div-card-button">
                                    <a href="#" class="card-button">Rent in 1 click</a>
                                </div>
                            </div>
                        </div>
                        <!-- end car2 -->

                        <!-- car4 -->
                        <div class="col-12 div-card mx-auto">
                            <div class="div-card-header">
                                <h2>Citroen C-Elysee</h2>
                                <p>1.6 / Gasoline / Auto</p>
                                <div class="div-card-type">
                                    <p>econom</p>
                                </div>
                            </div>
                            <div class="div-card-img">
                                <img src="src/images/car-details/citroen-elyssee.jpg" alt="Citroen C-Elysee" style="/* margin-top: -20px; */">
                            </div>
                            <div class="div-card-footer">
                                <div class="div-card-extra">
                                    <img src="src/images/car-details/Picture3.png" alt="">
                                </div>
                                <div class="div-card-price">
                                    <p>from </p><h2>24€</h2>
                                </div>
                                <div class="div-card-button">
                                    <a href="#" class="card-button">Rent in 1 click</a>
                                </div>
                            </div>
                        </div>
                        <!-- end car4 -->
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- end left column -->

            <!-- right column for booking -->
            <div class="col col-lg">
                <div class="d-none d-lg-block col col-lg-8 col-xl-7">

                    <!-- calendar -->
                    <div class="col-12 div-calendar mx-auto">
                        <div class="col-12 calendar-title mx-auto text-center">
                            <h3 style="">Date and Time</h3>
                        </div>
                        <div class="col-12 calendar-content mx-auto">
                            <div class="row mt-4">
                                <div class="col-3 calendar-start">
                                    <h4>start:</h4>
                                </div>
                                <div class="col-4 box1">
                                    <img src="src/images/calendar/calendar.svg" alt="">
                                    <div class="calendar-date">
                                        15
                                    </div>
                                    <div class="calendar-day">
                                        fr
                                    </div>
                                    <div class="calendar-month">
                                        jan
                                    </div>
                                </div>
                                <div class="col-3 box2">
                                    <img src="src/images/calendar/clock.svg" class="clock" alt="">
                                    <div class="calendar-time">
                                        8:25 am
                                    </div>
                                </div>
                                <div class="col-3 calendar-end">
                                    <h4>end:</h4>
                                </div>
                                <div class="col-4 box3" style="height: 60px;">
                                    <img src="src/images/calendar/calendar.svg" alt="">
                                    <div class="calendar-date">
                                        17
                                    </div>
                                    <div class="calendar-day">
                                        su
                                    </div>
                                    <div class="calendar-month">
                                        jan
                                    </div>
                                </div>
                                <div class="col-3 box4" style="height: 60px;">
                                    <img src="src/images/calendar/clock.svg" class="clock" alt="">
                                    <div class="calendar-time">
                                        7:00 pm
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                    <!-- end calendar -->

                </div>
                <div class="col col-lg">

                    <!-- background image -->
                    <div class="col div-bg-img">
                        <img src="src/images/rent_car.png" class="bg-image" alt="">
                    </div>
                    <!-- end background image -->

                    <!-- background text -->
                    <div class="bg-text">
                        <h5 id="text-1">I want it,</h5>
                        <h5 id="text-2" style="">I got it</h5> 
                    </div>
                    <!-- end background text -->

                </div>

            </div>
        </div>

    </div>

    

</main>
<!-- end of content -->

<?php include "footer.php"; ?> 