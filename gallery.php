<?php
$page = "gallery";
include "header.php"; 
include 'adminpanel/config.php';

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

?> 

<!-- Create the content here -->
<main>
    <div class="container-content d-block d-lg-block mx-auto">
        
        <!-- row -->
        <div class="row mx-auto">

            <!-- left column -->
            <div class="col-7 col-sm-7 col-md-7 col-lg-6 col-xl-7 justify-content-evenly">

                <!-- title city -->
                <div class="div-title d-block d-lg-block col-12">
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

                <?php
                $i = 0;
                if ($result->num_rows > 0 && $result->num_rows % 2 == 0){
                    while ($row = $result->fetch_assoc()){
                        $i++;
                        if ($i == 1 || $i%2 == 1){
                ?>
                        <!-- row -->
                        <div class="row justify-content-evenly">
                            
                            <!-- Car<?php echo $i; ?> -->
                            <div class="col-12 col-lg">
                                <div class="div-card mx-auto">
                                    <div class="div-card-header">
                                        <h2><?php echo $row['brand']; ?></h2>
                                        <p><?php echo $row['type']; ?></p>
                                        <div class="div-card-type">
                                            <p><?php echo $row['category']; ?></p>
                                        </div>
                                    </div>
                                    <div class="div-card-img">
                                        <img src="<?php echo "uploads/".$row['picturename']; ?>" alt="<?php echo $row['brand']; ?>">
                                    </div>
                                    <div class="div-card-footer">
                                        <div class="div-card-extra">
                                            <img src="<?php echo "uploads/".$row['featurename']; ?>" alt="">
                                        </div>
                                        <div class="div-card-price">
                                            <p>from </p><h2><?php echo $row['price']; ?>€</h2>
                                        </div>
                                        <div class="div-card-button">
                                            <a href="#" class="card-button">Rent in 1 click</a>
                                        </div>
                                    </div>
                                </div>
                            </div>                         
                            <!-- end car<?php echo $i; ?> -->
                <?php
                        }
                        if ($i%2 == 0){
                ?>

                            <!-- car<?php echo $i; ?> -->
                            <div class="col-12 col-lg">
                                <div class="div-card mx-auto">
                                    <div class="div-card-header">
                                        <h2><?php echo $row['brand']; ?></h2>
                                        <p><?php echo $row['type']; ?></p>
                                        <div class="div-card-type">
                                            <p><?php echo $row['category']; ?></p>
                                        </div>
                                    </div>
                                    <div class="div-card-img">
                                        <img src="<?php echo "uploads/".$row['picturename']; ?>" alt="<?php echo $row['brand']; ?>">
                                    </div>
                                    <div class="div-card-footer">
                                        <div class="div-card-extra">
                                            <img src="<?php echo "uploads/".$row['featurename']; ?>" alt="">
                                        </div>
                                        <div class="div-card-price">
                                            <p>from </p><h2><?php echo $row['price']; ?>€</h2>
                                        </div>
                                        <div class="div-card-button">
                                            <a href="#" class="card-button">Rent in 1 click</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end car<?php echo $i; ?> -->

                        </div>
                        <!-- end row -->
                <?php
                        }
                    }
                }
                ?>

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