<nav class="navbar navbar-expand mx-auto">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a class="nav-link <?php if ($page == "dashboard") { echo "active"; } ?>" aria-current="page" href="dashboard.php">Dashboard</a>
                <a class="nav-link <?php if ($page == "insert") { echo "active"; } ?>" href="insert.php">Insert a new car</a>
            </div>
        </div>
        <div class="logout">
            <a class="nav-link" href="logout.php">Logout</a>
        </div>
    </div>
</nav>