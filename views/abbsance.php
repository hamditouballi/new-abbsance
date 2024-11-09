<?php
require "connexion.php";
session_start();
$count=0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>المركب التربوي الأمين</title>
    <link rel="stylesheet" href="../views/css/bootstrap.min.css">
    <link rel="stylesheet" href="../views/css/styles.css" >
    <link rel="website icon" type="png" href="../views/csslogin/305219633_540712911186499_9137420916457086341_n.jpg">
    

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable_test').DataTable({
            "aLengthMenu": [
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
        ],
        "iDisplayLength": 10,

        "language": {
            "sProcessing": "جارٍ التحميل...",
            "sLengthMenu": "أظهر _MENU_ مدخلات",
            "sZeroRecords": "لم يعثر على أية سجلات",
            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix": "",
            "sSearch": "ابحث:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "الأول",
                "sPrevious": "السابق",
                "sNext": "التالي",
                "sLast": "الأخير"
            }
        }
        });
        
    });
</script>
  </head>
  <body>



    <section class="sidebar">
      <div class="nav-header">
        <p class="logo">المركب التربوي الأمين<br><span>مصلحة النقل المدرسي</span> </p>
        <i class="bx bx-menu btn-menu"></i>
      </div>
      <ul class="nav-links">
        <li>
          <a href="../controlers/authentification.php">
            <i class='bx bx-log-in'></i>
            <span class="title">تسجيل الخروج</span>
          </a>
          <span class="tooltip">تسجيل الخروج</span>
        </li>
      </ul>
      <div class="theme-wrapper">
        <i class="bx bxs-moon theme-icon"></i>
        <p>الوضع المظلم</p>
        <div class="theme-btn">
          <span class="theme-ball"></span>
        </div>
      </div>
    </section>




    <section class="home">
    <header style="background-image: url('../views/css/back.png');  height:120px;  background-size: cover; text-align: center; padding: 20px; box-shadow: 0 2px 4px gray; border-radius: 10px;">

<img src="../views/css/305219633_540712911186499_9137420916457086341_n.jpg" style="box-shadow: 0 2px 4px gray;" alt="">


</header><br>
       <div class="container text-center">
        <span style="font-size: 50px; font-weight: 600;">تسجيل الغياب</span>
        <hr>
        <form action="../controlers/managementRecord.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">اختر الفترة</label>
                    <select class="form-select" name="Period"  required>
                        <option value="Entrée_matin">الدخول الصباحي</option>
                        <option value="Sortie_matin">الخروج الصباحي</option>
                        <option value="Entrée_soir">الدخول المسائي</option>
                        <option value="Sortie_soir">الخروج المسائي</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">اختر رقم الحافلة</label>
                    <select class="form-select" name="id_bus"  required>
                        <?php
                        $req = "SELECT * FROM bus_scolaire";
                        $number_Bus = $con->query($req)->fetchAll();
                        foreach ($number_Bus as $number_Bus) { ?>
                          <option  value="<?php echo $number_Bus["ID_bus"] ?>">
                            <?php echo $number_Bus["Numéro_de_bus"] ?>
                          </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <input class="btn btn-outline-success mt-2 " type="submit" value="تسجيل الغياب" name="record">

        </form>
        
</div>

      
    </section>





    <script src="../views/js/bootstrap.bundle.min.js"></script>        
    <script src="../views/js/javascript.js"></script>
  </body>
</html>
