<?php
    $webtitle = "Login";
    $pagestyle = "styles/login.css";
?>

<?php include 'header.php'; ?>

<main>
    <div class="container-content mx-auto">
        <div class="login-form-container">
            <div class="row no-gutters">
                <div class="col-12 col-md-5 form-img-container text-end">
                    <img src="src/images/form-bg.jpg" alt="">
                </div>
                <div class="col-12 col-md-7 align-self-center">
                    <div class="login-form p-2 p-md-2 p-lg-4">
                        <form action="" method="post">
                            <h2>Sign into your account</h2>
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
        </div>
            
        
        
    </div>
</main>

<?php include 'footer.php'; ?>