<?php
include('../Assets/Config/config.php');
include('Assets/login-check.php');

error_reporting(0);
session_start();
?>
<html>

<head>
    <!-- Title & Image In Tab Website -->
    <title>Gresda Administrator</title>
    <link rel="icon" href="Assets/Images/LogoGresda.jpg">
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="style.css">
    <!-- Required Meta Tags -->
    <meta char set="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN Link  -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!-- Navbar Section Starts -->
    <div class="sidebar">
        <div class="logo-details">
            <i class='fab fa-guilded'></i>
            <span class="logo_name">Gresda Food</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="manage-admin.php">
                    <i class='bx bx-support'></i>
                    <span class="links_name">Manage Admin</span>
                </a>
            </li>
            <li>
                <a href="manage-user.php" class="active">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Manage Users</span>
                </a>
            </li>
            <li>
                <a href="manage-category.php">
                    <i class='bx bx-folder-open'></i>
                    <span class="links_name">Manage Category</span>
                </a>
            </li>
            <li>
                <a href="manage-food.php">
                    <i class='bx bx-drink'></i>
                    <span class="links_name">Manage Food</span>
                </a>
            </li>
            <li>
                <a href="manage-contact.php">
                    <i class='bx bx-envelope'></i>
                    <span class="links_name">Manage Contact</span>
                </a>
            </li>
            <li>
                <a href="manage-review.php">
                    <i class='bx bx-comment-detail'></i>
                    <span class="links_name">Manage Review</span>
                </a>
            </li>
            <li>
                <a href="manage-order.php">
                    <i class='bx bx-book'></i>
                    <span class="links_name">Manage Order</span>
                </a>
            </li>
            <li class="log_out">
                <a href="Assets/logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Navbar Section End -->

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Manage Users</span>
            </div>
        </nav>
        <br>
        <div class="home-content">
            <div class="overview-boxes">
                <?php
                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                ?>
            </div>
            <div class="overview-boxes">
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    //Query to Get all Admin
                    $sql = "SELECT * FROM tbl_users";
                    //Execute the Query
                    $res = mysqli_query($conn, $sql);
                    //CHeck whether the Query is Executed of Not
                    if ($res == TRUE) {
                        // Count Rows to CHeck whether we have data in database or not
                        $count = mysqli_num_rows($res); // Function to get all the rows in database
                        $sn = 1; //Create a Variable and Assign the value
                        //CHeck the num of rows
                        if ($count > 0) {
                            //WE HAve data in database
                            while ($rows = mysqli_fetch_assoc($res)) {
                                //Using While loop to get all the data from database.
                                //And while loop will run as long as we have data in database
                                //Get individual DAta
                                $id = $rows['id'];
                                $username = $rows['username'];
                                $email = $rows['email'];
                                //Display the Values in our Table
                    ?>
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/delete-users.php?id=<?php echo $id; ?>" class="btn-danger">Delete User</a>
                                    </td>
                                </tr>
                    <?php   }
                        } else {
                            //We Do not Have Data in Database
                        }
                    } ?>
                </table>
            </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-left");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-left", "bx-menu");
        }
    </script>
</body>

</html>