<?php
$webtitle = "Profile";
$pagestyle = "styles/customer.css";
include 'header.php';
?>
<main>
    <div class="container-content mx-auto" id="container-content">
        
        <?php include 'sidebar.php'; ?>

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