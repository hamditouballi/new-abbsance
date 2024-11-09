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
        <span style="float:right; font-size: 50px; font-weight: 600;">التلاميذ</span>
        <button type="button" class="button"  data-bs-toggle="modal" data-bs-target="#m">
          <span class="button__text">إضافة تلميذ</span>
          <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
        </button>
        <br>
        <table id="myTable_test" class="display " style="color: var(--text-color);">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>الإسم الكامل</th>
                  <th>المستوى الدراسي</th>
                  <th>رقم الحافلة</th>
                  <th>إجراء</th>
              </tr>
          </thead>
          <tbody>
                    <?php
            
                    $req="select ID_étudient,Nom_complet,niveau_étude,Numéro_de_bus from etudient inner join bus_scolaire on etudient.IdBus=bus_scolaire.ID_bus";
                    $res=$con->query($req);
                    foreach ($res->fetchAll() as $v){
                      $count++;
                    ?>
                        <tr>
                            <td><?php echo $v["ID_étudient"]; ?></td>
                            <td><?php echo $v["Nom_complet"]; ?></td>
                            <td><?php echo $v["niveau_étude"]; ?></td>
                            <td><?php echo $v["Numéro_de_bus"]; ?></td>
                            <td>
                                <div class="action-buttons" >
                                    <button class="bin-button" data-bs-toggle="modal" data-bs-target="#r<?php echo $count ?>">
                                        <svg
                                          class="bin-top"
                                          viewBox="0 0 39 7"
                                          fill="none"
                                          xmlns="http://www.w3.org/2000/svg"
                                        >
                                          <line y1="5" x2="39" y2="5" stroke="white" stroke-width="4"></line>
                                          <line
                                            x1="12"
                                            y1="1.5"
                                            x2="26.0357"
                                            y2="1.5"
                                            stroke="white"
                                            stroke-width="3"
                                          ></line>
                                        </svg>
                                        <svg
                                          class="bin-bottom"
                                          viewBox="0 0 33 39"
                                          fill="none"
                                          xmlns="http://www.w3.org/2000/svg"
                                        >
                                          <mask id="path-1-inside-1_8_19" fill="white">
                                            <path
                                              d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"
                                            ></path>
                                          </mask>
                                          <path
                                            d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"
                                            fill="white"
                                            mask="url(#path-1-inside-1_8_19)"
                                          ></path>
                                          <path d="M12 6L12 29" stroke="white" stroke-width="4"></path>
                                          <path d="M21 6V29" stroke="white" stroke-width="4"></path>
                                        </svg>
                                    </button>



                                    <button  class="edit-button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#u<?php echo $count ?>" >
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
                          <form method="post" action="../controlers/edit_Student.php">
                               <div class="modal fade" id="u<?php echo $count ?>" tabindex="-1" role="dialog"
                               aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">تعديل تلميذ</h5>
                                              
                                     </div>
                                     <div class="modal-body">
                                       <div class="form-groupe">
                                         <input type="hidden" name="ID_Student" value="<?php echo $v["ID_étudient"]?>">
                                         <label class="form-label" for="">الإسم الكامل</label>
                                         <input class="form-control" type="text" name="name_S" value="<?php echo $v["Nom_complet"]; ?>" required>

                                         <label class="form-label" for="">المستوى الدراسي</label>
                                         <input class="form-control" type="text" name="niveau_S" value="<?php echo $v["niveau_étude"]; ?>" required>
                                        
                                         <label class="form-label" for="">رقم الحافلة</label>
                                         <select class="form-select" name="number_Bus"  required>
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
                                     <div class="modal-footer">
                                       <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">غلق</button>
                                       <button class="btn btn-success" type="submit" name="edit">حفظ التغييرات</button>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </form>
                             <!-- edit bus -->

                             <div class="modal fade" id="r<?php echo $count ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">حذف تلميذ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p>هل أنت متأكد أنك تريد الحذف؟</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لا</button>
                                <a href="../controlers/removStedent.php?id=<?php echo $v["ID_étudient"] ?>" class="btn btn-danger" >نعم</a>
                              </div>
                            </div>
                          </div>
                        </div>
                            </td>
                        </tr>
                        
                        <?php
                        }
                        ?>
                    </tbody>
          
      </table>
</div>
<form method="post" action="../controlers/addStudent.php">
<div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">إضافة تلميذ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
              <label for="nomS" class="text-dark">الإسم الكامل</label>
              <input type="text" name="nomS" class="form-control">
        </div>
        <div class="form-group">
              <label for="niveauS" class="text-dark">المستوى الدراسي</label>
              <input type="text" name="niveauS" class="form-control">
        </div>
        <div class="form-group">
              <label for="IDbus" class="text-dark">رقم الحافلة</label>
              <select name="IDbus" id="" class="form-select">
                <?php
                   $req="select * from bus_scolaire";
                   $res=$con->query($req);
                   foreach ($res->fetchAll() as $v) {
                    echo "<option value=".$v['ID_bus'].">".$v['Numéro_de_bus']."</option>";
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
