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
          <a href="../controlers/managementDrivers.php">
            <i class='bx bx-user icon'  ></i>
            <span class="title">السائقين</span>
          </a>
          <span class="tooltip">السائقين</span>
        </li>
        <li>
          <a href="../controlers/managementBuses.php">
            <i class='bx bx-bus-school icon' ></i>
            <span class="title">الحافلات</span>
          </a>
          <span class="tooltip">الحافلات</span>
        </li>
        <li>
          <a href="../controlers/managementStudent.php">
            <i class='bx bx-group icon'></i>
            <span class="title">التلاميذ</span>
          </a>
          <span class="tooltip">التلاميذ</span>
        </li>
        <li>
          <a href="../controlers/management_abbsanceAdmin.php">
            <i class='bx bx-archive icon' ></i>
            <span class="title">الغياب</span>
          </a>
          <span class="tooltip">الغياب</span>
        </li>
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
       <div class="container">
        <span style="float:right; font-size: 50px; font-weight: 600;">الغياب</span>
        <button type="button" class="button"  data-bs-toggle="modal" data-bs-target="#m">
          <span class="button__text">البحث الدقيق</span>
          <span class="button__icon" style="color: #fff;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></span>
        </button>
        <form method="post" action="../controlers/management_abbsanceAdmin.php">
  <button type="submit" class="btn btn-outline-success mt-2" name="all">عرض كل الغياب</button><br>
  <a href="../views/print_pdf.php" class="btn btn-outline-danger   pull-right mt-2" role="button">
  <span class="glyphicon glyphicon-print"></span>PDF</a>
</form>
        <br>
        <table id="myTable_test" class="display " style="color: var(--text-color);">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>التاريخ</th>
                  <th>اسم التلميذ</th>
                  <th>المستوى الدراسي</th>
                  <th>رقم الحافلة</th>
                  <th>الدخول الصباحي</th>
                  <th>الخروج الصباحي</th>
                  <th>الدخول المسائي</th>
                  <th>الخروج المسائي</th>
                  <th>إجراء</th>
              </tr>
          </thead>
          <tbody>
                  <?php
                    if(isset($_POST["search"])){
                      $date = $_POST["date"];
                      $nameE = $_POST["nameE"];
                      $req = "select ID_Absence,Date_Absence,Nom_complet,niveau_étude,Numéro_de_bus,Entrée_matin,Sortie_matin,Entrée_soir,Sortie_soir from etudient inner join absence on etudient.ID_étudient=absence.IDétudient inner join bus_scolaire on bus_scolaire.ID_bus=absence.IDbus where Date_Absence like '{$date}%' and  Nom_complet = '$nameE'";
                      $res=$con->query($req);
                      foreach ($res->fetchAll() as $v){
                      $count++;
                  ?>
                  <tr>
                            <td><?php echo $v["ID_Absence"]; ?></td>
                            <td><?php echo $v["Date_Absence"]; ?></td>
                            <td><?php echo $v["Nom_complet"]; ?></td>
                            <td><?php echo $v["niveau_étude"]; ?></td>
                            <td><?php echo $v["Numéro_de_bus"]; ?></td>
                            <?php
                             if ($v["Entrée_matin"]=="غائب") {
                              echo "<td style='background-color: rgb(253, 17, 17); font-size: larger;'>".$v["Entrée_matin"]."</td>";
                             }else {
                              echo "<td style='background-color: rgb(0, 179, 30); font-size: larger;'>".$v["Entrée_matin"]."</td>";
                             }
                            ?>
                            <?php
                             if ($v["Sortie_matin"]=="غائب") {
                              echo "<td style='background-color: rgb(253, 17, 17); font-size: larger;'>".$v["Sortie_matin"]."</td>";
                             }else {
                              echo "<td style='background-color: rgb(0, 179, 30); font-size: larger;'>".$v["Sortie_matin"]."</td>";
                             }
                            ?>
                            <?php
                             if ($v["Entrée_soir"]=="غائب") {
                              echo "<td style='background-color: rgb(253, 17, 17); font-size: larger;'>".$v["Entrée_soir"]."</td>";
                             }else {
                              echo "<td style='background-color: rgb(0, 179, 30); font-size: larger;'>".$v["Entrée_soir"]."</td>";
                             }
                            ?>
                            <?php
                             if ($v["Sortie_soir"]=="غائب") {
                              echo "<td style='background-color: rgb(253, 17, 17); font-size: larger;'>".$v["Sortie_soir"]."</td>";
                             }else {
                              echo "<td style='background-color: rgb(0, 179, 30); font-size: larger;'>".$v["Sortie_soir"]."</td>";
                             }
                            ?>
                            <td>
                                <div class="action-buttons" >
                                    
                                    <button  class="edit-button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-bus-modal<?php echo $count ?>" >
                                      <svg
                                        class="edit-icon"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                      >
                                        <path
                                          fill-rule="evenodd"
                                          clip-rule="evenodd"
                                          d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25ZM20.71 6.04C21.1 5.65 21.1 5.02 20.71 4.63L18.37 2.29C17.98 1.9 17.35 1.9 16.96 2.29L15.06 4.19L18.81 7.94L20.71 6.04Z"
                                          fill="white"
                                        ></path>
                                      </svg>
                                    </button>
                                </div>
                                <!-- edit bus -->
                              <form method="post" action="../controlers/editABBSANCE.php">
                               <div class="modal fade" id="edit-bus-modal<?php echo $count ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="edit-bus-modal-label" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header">
                                       <h5 class="modal-title" id="edit-bus-modal-label">تعديل الغياب</h5>
                                              
                                     </div>
                                     <div class="modal-body">
                                       <div class="form-groupe">
                                         <input type="hidden" name="ID_Absence" value="<?php echo $v["ID_Absence"]?>">
                                         <label class="form-label" for="">الدخول الصباحي</label>
                                         <select class="form-select" name="entrerM"  required>
                                          <option value="حاضر">حاضر</option>
                                          <option value="غائب">غائب</option>
                                         </select>

                                         <label class="form-label" for="">الخروج الصباحي</label>
                                         <select class="form-select" name="sortirM"  required>
                                          <option value="حاضر">حاضر</option>
                                          <option value="غائب">غائب</option>
                                         </select>

                                         <label class="form-label" for="">الدخول المسائي</label>
                                         <select class="form-select" name="entrerS"  required>
                                          <option value="حاضر">حاضر</option>
                                          <option value="غائب">غائب</option>
                                         </select>

                                         <label class="form-label" for="">الخروج المسائي</label>
                                         <select class="form-select" name="sortirS"  required>
                                          <option value="حاضر">حاضر</option>
                                          <option value="غائب">غائب</option>
                                         </select>
                                              
                                         
                                       </div>
                                     </div>
                                     <div class="modal-footer">
                                       <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">غلق</button>
                                       <button class="btn btn-primary" type="submit" name="editabb">تعديل</button>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </form>
                             <!-- edit bus -->
                            </td>
                            
                        </tr>

                    <?php
                      }
                    }elseif(isset($_POST["all"])){
                    $req="select ID_Absence,Date_Absence,Nom_complet,niveau_étude,Numéro_de_bus,Entrée_matin,Sortie_matin,Entrée_soir,Sortie_soir from etudient inner join absence on etudient.ID_étudient=absence.IDétudient inner join bus_scolaire on bus_scolaire.ID_bus=absence.IDbus";
                    $res=$con->query($req);
                    foreach ($res->fetchAll() as $v){
                      $count++;
                    ?>
                        <tr>
                            <td><?php echo $v["ID_Absence"]; ?></td>
                            <td><?php echo $v["Date_Absence"]; ?></td>
                            <td><?php echo $v["Nom_complet"]; ?></td>
                            <td><?php echo $v["niveau_étude"]; ?></td>
                            <td><?php echo $v["Numéro_de_bus"]; ?></td>
                            <?php
                             if ($v["Entrée_matin"]=="غائب") {
                              echo "<td style='background-color: rgb(253, 17, 17); font-size: larger;'>".$v["Entrée_matin"]."</td>";
                             }else {
                              echo "<td style='background-color: rgb(0, 179, 30); font-size: larger;'>".$v["Entrée_matin"]."</td>";
                             }
                            ?>
                            <?php
                             if ($v["Sortie_matin"]=="غائب") {
                              echo "<td style='background-color: rgb(253, 17, 17); font-size: larger;'>".$v["Sortie_matin"]."</td>";
                             }else {
                              echo "<td style='background-color: rgb(0, 179, 30); font-size: larger;'>".$v["Sortie_matin"]."</td>";
                             }
                            ?>
                            <?php
                             if ($v["Entrée_soir"]=="غائب") {
                              echo "<td style='background-color: rgb(253, 17, 17); font-size: larger;'>".$v["Entrée_soir"]."</td>";
                             }else {
                              echo "<td style='background-color: rgb(0, 179, 30); font-size: larger;'>".$v["Entrée_soir"]."</td>";
                             }
                            ?>
                            <?php
                             if ($v["Sortie_soir"]=="غائب") {
                              echo "<td style='background-color: rgb(253, 17, 17); font-size: larger;'>".$v["Sortie_soir"]."</td>";
                             }else {
                              echo "<td style='background-color: rgb(0, 179, 30); font-size: larger;'>".$v["Sortie_soir"]."</td>";
                             }
                            ?>
                            <td>
                                <div class="action-buttons" >
                                    
                                    <button  class="edit-button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-bus-modal<?php echo $count ?>" >
                                      <svg
                                        class="edit-icon"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                      >
                                        <path
                                          fill-rule="evenodd"
                                          clip-rule="evenodd"
                                          d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25ZM20.71 6.04C21.1 5.65 21.1 5.02 20.71 4.63L18.37 2.29C17.98 1.9 17.35 1.9 16.96 2.29L15.06 4.19L18.81 7.94L20.71 6.04Z"
                                          fill="white"
                                        ></path>
                                      </svg>
                                    </button>
                                </div>
                                <!-- edit bus -->
                          <form method="post" action="../controlers/editABBSANCE.php">
                               <div class="modal fade" id="edit-bus-modal<?php echo $count ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="edit-bus-modal-label" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header">
                                       <h5 class="modal-title" id="edit-bus-modal-label">تعديل الغياب</h5>
                                              
                                     </div>
                                     <div class="modal-body">
                                       <div class="form-groupe">
                                         <input type="hidden" name="ID_Absence" value="<?php echo $v["ID_Absence"]?>">
                                         <label class="form-label" for="">الدخول الصباحي</label>
                                         <select class="form-select" name="entrerM"  required>
                                          <option value="حاضر">حاضر</option>
                                          <option value="غائب">غائب</option>
                                         </select>

                                         <label class="form-label" for="">الخروج الصباحي</label>
                                         <select class="form-select" name="sortirM"  required>
                                          <option value="حاضر">حاضر</option>
                                          <option value="غائب">غائب</option>
                                         </select>

                                         <label class="form-label" for="">الدخول المسائي</label>
                                         <select class="form-select" name="entrerS"  required>
                                          <option value="حاضر">حاضر</option>
                                          <option value="غائب">غائب</option>
                                         </select>

                                         <label class="form-label" for="">الخروج المسائي</label>
                                         <select class="form-select" name="sortirS"  required>
                                          <option value="حاضر">حاضر</option>
                                          <option value="غائب">غائب</option>
                                         </select>
                                              
                                         
                                       </div>
                                     </div>
                                     <div class="modal-footer">
                                       <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">غلق</button>
                                       <button class="btn btn-primary" type="submit" name="editabb">تعديل</button>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </form>
                             <!-- edit bus -->
                            </td>
                            
                        </tr>
                         
                        <?php
                        }
                      }
                        ?>
                    </tbody>
          
      </table>
</div>
<form method="post" action="../controlers/management_abbsanceAdmin.php">
<div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">البحث الدقيق</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
              <label for="date" class="text-dark">التاريخ</label>
              <input type="date" name="date" class="form-control">
        </div>
        <div class="form-group">
              <label for="nameE" class="text-dark">الإسم الكامل لتلميذ</label>
              <input type="text" name="nameE" class="form-control">
        </div>
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">غلق</button>
        <input type="submit" class="btn btn-primary" value="بحث" name="search">
      </div>
    </div>
  </div>
</div>
</form>








      
    </section>





    <script src="../views/js/bootstrap.bundle.min.js"></script>         
    <script src="../views/js/javascript.js"></script>
    
  </body>
</html>
