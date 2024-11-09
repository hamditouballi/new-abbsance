<?php
require "connexion.php";
session_start();
$count=0;
$c=0

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
        <span style="float:right; font-size: 50px; font-weight: 600;">الحافلات</span>
        <button type="button" class="button"  data-bs-toggle="modal" data-bs-target="#m">
          <span class="button__text">إضافة حافلة</span>
          <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
        </button>
        <br>
        <table id="myTable_test" class="display " style="color: var(--text-color);">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>رقم الحافلة</th>
                  <th>اسم السائق</th>
                  <th>تعديل</th>
              </tr>
          </thead>
          <tbody>
                    <?php
            
                    $req="select ID_bus,Numéro_de_bus,nom_chauffeur from bus_scolaire inner join responsable_du_bus_scolaire on bus_scolaire.IdChauffeur=responsable_du_bus_scolaire.ID_chauffeur";
                    $res=$con->query($req);
                    foreach ($res->fetchAll() as $v){
                      $count++;
                    ?>
                        <tr>
                            <td><?php echo $v["ID_bus"]; ?></td>
                            <td><?php echo $v["Numéro_de_bus"]; ?></td>
                            <td><?php echo $v["nom_chauffeur"]; ?></td>
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
                          <form method="post" action="../controlers/editBUS.php">
                               <div class="modal fade" id="edit-bus-modal<?php echo $count ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="edit-bus-modal-label" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header">
                                       <h5 class="modal-title" id="edit-bus-modal-label">تعديل الحافلة</h5>
                                              
                                     </div>
                                     <div class="modal-body">
                                       <div class="form-groupe">
                                         <input type="hidden" name="ID_bus" value="<?php echo $v["ID_bus"]?>">
                                         <label class="form-label" for="">رقم الحافلة</label>
                                         <input class="form-control" type="number" name="number" value="<?php echo $v["Numéro_de_bus"]; ?>" required>
                                              
                                         <label class="form-label" for="">اسم السائق</label>
                                         <select class="form-select" name="nameDriver_id"  required>
                                           <?php
                                           $req = "SELECT * FROM responsable_du_bus_scolaire ";
                                           $nameDriver = $con->query($req)->fetchAll();
                                           foreach ($nameDriver as $nameDriver) { ?>
                                             <option  value="<?php echo $nameDriver["ID_chauffeur"] ?>">
                                               <?php echo $nameDriver["nom_chauffeur"] ?>
                                             </option>
                                           <?php } ?>
                                         </select>
                                       </div>
                                     </div>
                                     <div class="modal-footer">
                                       <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">غلق</button>
                                       <button class="btn btn-primary" type="submit" name="edit">تعديل</button>
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
                        ?>
                        <?php
                              $req="select * from bus_scolaire";
                              $res=$con->query($req);
                              foreach ($res->fetchAll() as $v){
                                $c++;
                                if (empty($v['IdChauffeur'])) {
                                  ?>
                                <tr>
                            <td><?php echo $v["ID_bus"]; ?></td>
                            <td><?php echo $v["Numéro_de_bus"]; ?></td>
                            <td>فارغ</td>
                            <td>
                                <div class="action-buttons" >
                                    
                                    <button  class="edit-button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-bus-modal<?php echo $c ?>" >
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
                          <form method="post" action="../controlers/editBUS.php">
                               <div class="modal fade" id="edit-bus-modal<?php echo $c ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="edit-bus-modal-label" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header">
                                       <h5 class="modal-title" id="edit-bus-modal-label">تعديل الحافلة</h5>
                                              
                                     </div>
                                     <div class="modal-body">
                                       <div class="form-groupe">
                                         <input type="hidden" name="ID_bus" value="<?php echo $v["ID_bus"]?>">
                                         <label class="form-label" for="">رقم الحافلة</label>
                                         <input class="form-control" type="number" name="number" value="<?php echo $v["Numéro_de_bus"]; ?>" required>
                                              
                                         <label class="form-label" for="">اسم السائق</label>
                                         <select class="form-select" name="nameDriver_id"  required>
                                           <?php
                                           $req = "SELECT * FROM responsable_du_bus_scolaire ";
                                           $nameDriver = $con->query($req)->fetchAll();
                                           foreach ($nameDriver as $nameDriver) { ?>
                                             <option  value="<?php echo $nameDriver["ID_chauffeur"] ?>">
                                               <?php echo $nameDriver["nom_chauffeur"] ?>
                                             </option>
                                           <?php } ?>
                                         </select>
                                       </div>
                                     </div>
                                     <div class="modal-footer">
                                       <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">غلق</button>
                                       <button class="btn btn-primary" type="submit" name="edit">تعديل</button>
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
<form method="post" action="../controlers/addBus.php">
<div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">إضافة حافلة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
              <label for="Nbus" class="text-dark">رقم الحافلة</label>
              <input type="number" name="Nbus" class="form-control">
        </div>
        <div class="form-group">
              <label for="IdChauffeur" class="text-dark">اسم السائق</label>
              <select name="IdChauffeur" id="" class="form-select">
                <?php
                   $req="select * from responsable_du_bus_scolaire";
                   $res=$con->query($req);
                   foreach ($res->fetchAll() as $v) {
                    echo "<option value=".$v['ID_chauffeur'].">".$v['nom_chauffeur']."</option>";
                   }
                ?>
            </select>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">غلق</button>
        <input type="submit" class="btn btn-primary" value="أضف" name="ajout">
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
