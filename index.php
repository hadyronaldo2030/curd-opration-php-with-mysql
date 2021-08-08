<?php
//  php ربط قاعدة البيانات مع ال 
$host       = "localhost";
$user       = "root";
$password   = "";
$dbName     = "market";
$conn       = mysqli_connect($host, $user, $password, $dbName);
// ==============================================================

// ___________________________ create ___________________________
// عند الضغط على زر تسجيل الدخول يتم تنفيذ الشرط
if (isset($_POST['send'])) {
    $name       = $_POST['custName'];
    $address    = $_POST['custAddress'];
    $phone      = $_POST['custPhone'];
    // جملة الانشاء داخل قاعدة البيانات
    $insert = "INSERT INTO `customers` VALUES(NULL, '$name', '$address', '$phone')";
    // تشغيل جملة الانشاء
    $i=  mysqli_query($conn, $insert);
}
// _______________________________________________________________


// _____________________________ Read ____________________________
// جملة العرض داخل الفورم
$select = "SELECT * FROM `customers`";
// تشغيل جملة العرض
$s =mysqli_query($conn, $select);
// _______________________________________________________________


// _____________________________ Delete ____________________________
// بميثود الجيت id عند الضغط على زرالحذف نأخذ ال
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // id جملة الحذف ونضع لها 
    $delete = "DELETE FROM `customers` WHERE id = $id";
    // تشغيل جملة الحذف 
    $d =mysqli_query($conn, $delete);
    // اعادة تحميل الصفحة
    header("location: /start/index.php");
}
// _______________________________________________________________


// _____________________________ Edit ____________________________
// بميثود الجيت id عند الضغط على زر الايديت نأخذ ال
$name       = "";
$address    = "";
$phone      = "";
$update     = false;
if (isset($_GET['edit'])) {
    // قم بأظهار الزرار عند الضغط على زرار التعديل
    $update   = true;
    $id       = $_GET['edit'];
    // id جملة العرض ونضع لها 
    $select   = "SELECT * FROM `customers` WHERE id = $id";
    // تشغيل جملة العرض 
    $s        = mysqli_query($conn, $select);
    // عرض البيانات بنفس طريقةالفورايتش
    $row      = mysqli_fetch_assoc($s);
    $name     = $row['name'];
    $address  = $row['address'];
    $phone    = $row['phone'];
// _________________________________________
    // عند الضغط على زر التعديل
    if (isset($_POST['update'])) {
        // اعطاء متغيرات للمدخلات
        $name       = $_POST['custName'];
        $address    = $_POST['custAddress'];
        $phone      = $_POST['custPhone'];
        // جملة التعديل داخل قاعدة البيانات
        $update = "UPDATE `customers` SET name='$name', address='$address', phone='$phone' where id=$id";
        // تشغيل جملة التعديل
        $u=  mysqli_query($conn, $update);
        // اعادة تحميل الصفحة
        header("location: /start/index.php");
    }
}

// _______________________________________________________________



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!-- Start navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End navbar -->

    <!-- End Form -->
    <div class="container">
        <form method="POST" class="m-5 p-5">
            <div class="form-group">
                <div class="form-group">
                    <label for="inputEmail4">Name</label>
                    <!-- name اطبع داخل الفاليو قيمة ال -->
                    <input name="custName" value="<?php echo $name ?>" type="text" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <!-- address اطبع داخل الفاليو قيمة ال -->
                <input name="custAddress" value="<?php echo $address ?>" type="text" class="form-control" placeholder="city">
            </div>
            <div class="form-group">
                <label for="inputPhone">Phone</label>
                <!-- phone اطبع داخل الفاليو قيمة ال -->
                <input name="custPhone" value="<?php echo $phone ?>" type="text" class="form-control" placeholder="+20">
            </div>
            <?php if($update): ?>
            <button name="update" type="submit" class="btn btn-primary w-100">Update</button>
            <?php else: ?>
            <button name="send" type="submit" class="btn btn-info w-100">Sign in</button>
            <?php endif; ?>
        </form>
    </div>
    <!-- End Form -->


    <!-- Start Table -->
    <div class="container">
        <table class="table table-striped m-5 p-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
                <?php foreach($s as $customer){ ?>
                <tr>
                    <th> <?php echo $customer['id']?> </th>
                    <th> <?php echo $customer['name']?> </th>
                    <th> <?php echo $customer['address']?> </th>
                    <th> <?php echo $customer['phone']?> </th>
                    <th>
                        <!-- اظهار رسالة تاكيد الحذف -->
                        <!-- واضافة اللينك الخاص بالصفحة بشكل اختيارى id سحب ال -->
                        <a onclick="return confirm('Are You Sure Delete')"
                        href="index.php?delete=<?php echo $customer['id'] ?>" class="btn btn-danger">Delete</a>
                    </th>
                    <th>    
                        <a href="index.php?edit=<?php echo $customer['id'] ?>" class="btn btn-primary">Edit</a>
                    </th>
                </tr>
                <?php } ?>
            </thead>
        </table>

    </div>
    <!-- End Table -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>