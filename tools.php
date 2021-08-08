<?php
/*
_______________ input طباعة ________________
echo "Welcome first website";
print("Welcome first website");
============================================

_________________ data type_________________

يتم تعريف نوع البيانات تلقائى 

__ __ string __ __
$x = "hady";
var_dump($x);


__ __ int __ __
$x = 7;
var_dump($x);


__ __ float __ __
$x = 7.77;
var_dump($x);


__ __ bool __ __
$x = true;
var_dump($x);
============================================


_______________ if statement _______________

الجمل الشرطية
if (condition) {
    # code...
}elseif (condition) {
    # code...
}else {
    # code...
}
============================================


_________________ for loop _________________

الحلقات التكرارية

for (
    $i=10;
    $i > 5; 
    $i++
    ) {

    echo $i . '<br>';
}
============================================

___________________ Array ___________________

المصفوفة
$x = [10, 20, 30, 40, "hady"];
    echo $x[4];

============================================

_____________ Array_Associative ____________

key : vale تاخذ هذه المصفوفة 
وتقوم بحذف المفتاح المتكرر 

$x = array(
    'name'   => "hady",
    'id'     => 7,
    'phone'  => "01030804922"
);
    echo $x['name'];
============================================

________________ Array Multi _______________

المصفوفة المتعددة 
وهى عبارة عن مصفوفات داخل مصفوفة
يتم اخراج العناصر بأدخال رقم المصفوفة
ثم رقم العنصر المراد طباعته 
$y = array( array(1, 2, 3), array(4, 5, 6) );
    echo $y[1][2];
============================================


_____ multi_direction_Array_Associative  ___

key: vale المصفوفة المتعددة والتى تاخذ ايضا 
وهى تستخدم بكثره ف قاعدة البيانات

$cards = array( array(
    'name' => "hady"
    ,'id'     => 7
    ,'phone'  => "01030804922"
    )
    
    , array('name'   => "Othman"
    , 'id'    => 8
    ,'phone'  => "01020324043")
);

foreach ($cards as $card) {
        echo $card["name"]  . "<br>";
        echo $card["id"]    . "<br>";
        echo $card['phone'] . "<br>";
    }
============================================








/*
_________ connect php with database ________

/*


*/
// 1- ربط الداتابيز
$host       = "localhost";
$user       = "root";
$password   = "";
$dbName     = "market";
$conn       = mysqli_connect($host, $user, $password, $dbName);

// اختبار الاتصال بقاعدة البيانات
if($conn) 
     {echo "done";} 
else {echo " not";}

// ____________________________ create _____________________________

// ادخال البيانات داخل جدول الطلبات وتسمى بجملة الكويرى
$insert   = "INSERT INTO `orders` VALUES(null , 'cofe' , '200$')";

// تشغيل جملة الكويرى الخاصة بأدخال البيانات
mysqli_query($conn, $insert);

// =================================================================


// ______________________________ read _____________________________

// عرض البيانات الموجودة داخل جدول العملاء وتسمى بجملة الكويرى
$select = "SELECT * FROM `orders`";

// تشغيل جملة الكويرى الخاصة بعرض البيانات
$data = mysqli_query($conn, $select);

// يتم عرض البيانات فى هذه الداله
foreach ($data as $order) {
    echo $order['id'] . "<br>";
    echo $order['name']. "<br>";
    echo $order['price'] . "<br>";
}
// =================================================================

// _____________________________ Update ____________________________

// تعديل البيانات الموجودة داخل جدول العملاء وتسمى بجملة الكويرى
$update   = "UPDATE `orders` SET name = 'Cars' WHERE id = 1";

// تشغيل جملة الكويرى الخاصة بتعديل البيانات
mysqli_query($conn, $update);

// =================================================================
?>



<?php

// ____________________________ Git Data ___________________________

if (isset($_GET['btn'])) {
    echo $_GET['user'];

}
?>
<!--
$_GET =array(
    user => ?
    btn => ?
) -->

<form method="GET">
    <input type="text" name="user">
    <input type="password" name="password">
    <button class="btn">print</button>
</form>
<!-- =========================================================== -->


<?php

// ____________________________ POST Data ___________________________

if (isset($_POST['btn'])) {
    echo $_POST['user'];

}
?>
<!--
$_POST =array(
    user => ?
    btn => ?
) -->

<form method="POST">
    <input type="text" name="user">
    <input type="password" name="password">
    <button class="btn">print</button>
</form>

<!-- =========================================================== -->


