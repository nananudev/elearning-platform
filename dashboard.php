<?php
session_start();

//check if user is not logged in
if (!isset($_SESSION["user"])) {
    header("location: login.php");
} //check if logged in as user
if ($_SESSION["user"]["role"] == "user") {
    header("location: index.php");
}

//header links
require "inc/header.php"; ?>

<div class="container">

    <?php
    //header content
    require './pages/header-home.php';
    include 'inc/process.php';
    ?>

    <div class="container p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4 style="color: #176B87">DASHBOARD</h4>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <ul class="list-group">
                    <div>
                        <li class="list-group-item" style="color: #176B87">
                            <a href="course.php" class="btn">
                                <i class="fas fa-grip-vertical" style="color: #176B87"></i> Department</a>
                        </li>
                        <li class="list-group-item">
                            <a href="overview.php" class="btn">
                                <i class="fas fa-boxes" style="color: #176B87"></i> Course Overview</a>
                        </li class="list-group-item">
                        <li class="list-group-item">
                            <a href="dashboard.php" class="btn text-danger">
                                <i class="fas fa-plus" style="color: #176B87"></i> Add Course </a>
                        </li>
                    </div>
                </ul>
            </div>

            <div class="col-9">
                <div class="container">
                    <h6 style="color: #176B87">New Course Overview</h6>
                    <?php
                    if (isset($error)) {
                    ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $error ?></strong>
                        </div>
                    <?php
                    } elseif (isset($success)) {
                    ?>
                        <div class="alert alert-success">
                            <strong><?php echo $success ?></strong>
                        </div>
                    <?php
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <label for="">Course Title</label>
                            <input type="text" name="course_title" placeholder="Enter course title" class="form-control" id="" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Course Code</label>
                                    <input type="text" name="course_code" placeholder="Enter course code" class="form-control" id="" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Credit Unit</label>
                                    <select name="credit_unit" class="form-control" id="">
                                        <?php
                                        $sql = "SELECT * FROM units ORDER BY id DESC";
                                        $query = mysqli_query($connection, $sql);
                                        while ($result = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option value="<?php echo $result["id"] ?>">
                                                <?php echo $result["credit_unit"] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Department</label>
                                    <select name="course_id" class="form-control" id="">
                                        <?php
                                        $sql = "SELECT * FROM courses ORDER BY id DESC";
                                        $query = mysqli_query($connection, $sql);
                                        while ($result = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option value="<?php echo $result["id"] ?>">
                                                <?php echo $result["name"] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Level</label>
                                    <select name="level" class="form-control" id="">
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                        <option value="400">400</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Course Description</label>
                                    <textarea name="desc" id="" placeholder="Enter course description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Course Overview</label>
                                    <textarea name="overview" id="" placeholder="Enter course overview" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" name="new_course" class="btn btn-sm text-light my-2" style="background-color:#176B87;">
                                <i class="fas fa-plus"> </i> Add Course</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
//footer content
require './pages/footer-home.php'; ?>

</div>


<?php
//footer script
require "inc/footer.php";  ?>