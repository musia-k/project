<?php
    $webtitle = "Login";
    $pagestyle = "styles/login.css";
?>

<?php include 'header.php'; ?>

<main>
    <div class="container-content mx-auto">
        <div class="login-form-container">
            <div class="login-form">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-links">
                        <a href="#">New User? Register Here</a>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
            
        
        
    </div>
</main>

<?php include 'footer.php'; ?>