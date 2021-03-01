<?php
$webtitle = "Profile";
$pagestyle = "styles/customer.css";
include 'header.php';
?>
<main>
    <div class="container-content mx-auto" id="container-content">
        <!-- sidebar -->
        <div class="sidebar-wrapper">
            <div class="sidebar-nav mx-auto">
                <div class="sidebar-link">
                    <a href="#" id="sidebar-toggle">
                        <div class="sidebar-icon"><i class="fas fa-bars"></i></div>
                    </a>
                
                </div>
                <div class="sidebar-link">
                    <a href="#">
                        <div class="sidebar-icon"><i class="fas fa-book-open"></i></div>
                        <span class="sidebar-label">Reservation</span>
                    </a>
                
                </div>
                <div class="sidebar-link">
                    <a href="#">
                        <div class="sidebar-icon"><i class="fas fa-address-card"></i></div>
                        <span class="sidebar-label">Profile</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                
                test
            </div>
        </div>
        
    </div>
    
</main>


<script>
    $("#sidebar-toggle").click( function (e) {
        e.preventDefault();
        $("#container-content").toggleClass("expand");
    });
</script>
<?php
include 'footer.php';
?>