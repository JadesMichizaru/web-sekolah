<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../../login");
    exit;
}
?>
<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $nisn = $class = $gender = $born = $live = "";
$name_err = $nisn_err = $class_err = $gender_err = $born_err = $live_err = "";
// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // NISN
    $input_nisn = trim($_POST["nisn"]);
    if (empty($input_nisn)) {
        $nisn_err = "mohon untuk memasukan NISN yang benar.";
    } else {
        $nisn = $input_nisn;
    }

    // CLASS
    $input_class = trim($_POST["class"]);
    if (empty($input_class)) {
        $address_err = "mohon untuk memasukan nama kelas dengan benar.";
    } else {
        $class = $input_class;
    }

    $input_gender = trim($_POST["gender"]);
    if (empty($input_gender)) {
        $gender_err = "mohon untuk memasukan Jenis Kelamin yang benar.";
    } else {
        $gender = $input_gender;
    }

    $input_born = trim($_POST["born"]);
    if (empty($input_born)) {
        $born_err = "mohon untuk memasukan Tanggal Lahir yang benar.";
    } else {
        $born = $input_born;
    }

    $input_live = trim($_POST["live"]);
    if (empty($input_live)) {
        $live_err = "mohon untuk memasukan Tempat Lahir yang benar.";
    } else {
        $live = $input_live;
    }




    // Check input errors before inserting in database
    if (empty($name_err) && empty($nisn_err) && empty($class_err) && empty($gender_err) && empty($born_err) && empty($born_err)) {
        // Prepare an update statement
        $sql = "UPDATE student SET name=?, nisn=?, class=?, gender=?, born=?, live=? WHERE id=?";
        var_dump($sql);
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_name, $param_nisn, $param_class, $param_gender, $param_born, $param_live, $param_id);
            echo "masuk";
            // Set parameters
            $param_name = $name;
            $param_nisn = $nisn;
            $param_class = $class;
            $param_gender = $gender;
            $param_born = $born;
            $param_live = $live;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                // echo "test";
                header("location: ../data-siswa");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM student WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $name = $row["name"];
                    $nisn = $row["nisn"];
                    $class = $row["class"];
                    $gender = $row["gender"];
                    $born = $row["born"];
                    $live = $row["live"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nisn_err)) ? 'has-error' : ''; ?>">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control" value="<?php echo $nisn; ?>">
                            <span class="help-block"><?php echo $nisn_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($class_err)) ? 'has-error' : ''; ?>">
                            <label>Kelas</label>
                            <textarea name="class" class="form-control"><?php echo $class; ?></textarea>
                            <span class="help-block"><?php echo $class_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <textarea name="gender" class="form-control"><?php echo $gender; ?></textarea>
                            <span class="help-block"><?php echo $gender_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($born_err)) ? 'has-error' : ''; ?>">
                            <label>Tanggal Lahir</label>
                            <textarea name="born" class="form-control"><?php echo $born; ?></textarea>
                            <span class="help-block"><?php echo $born_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($live_err)) ? 'has-error' : ''; ?>">
                            <label>Tempat Lahir</label>
                            <textarea name="live" class="form-control"><?php echo $live; ?></textarea>
                            <span class="help-block"><?php echo $live_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>