<?php
$webtitle = "Profile";
$pagestyle = "styles/customer.css";
include 'header.php';
?>
<main>
    <div class="container-content mx-auto" id="container-content">
        <!-- sidebar -->
        <div class="sidebar-wrapper">
            <ul class="sidebar-nav mx-auto">
                <li><a href="#" id="sidebar-toggle"><i class="fas fa-bars"></i></a></li>
                <li><a href="#"><i class="fas fa-book-open"></i></a></li>
                <li><a href="#"><i class="fas fa-address-card"></i></a></li>
            </ul>
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