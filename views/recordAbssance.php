<?php
require "connexion.php";
session_start();
$count = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>المركب التربوي الأمين</title>
    <link rel="stylesheet" href="../views/css/bootstrap.min.css">
    <link rel="stylesheet" href="../views/css/styles.css">
    <link rel="website icon" type="png" href="../views/csslogin/305219633_540712911186499_9137420916457086341_n.jpg">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css"/>
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

            $('#addForm').on('submit', function (e) {
                e.preventDefault(); // Prevent the form from submitting the traditional way
                $.ajax({
                    type: 'POST',
                    url: 'process_absence.php', // The PHP file that will process the form data
                    data: $(this).serialize(),
                    success: function (response) {
                        alert('Data submitted successfully!');
                        
                    },
                    error: function () {
                        alert('An error occurred while submitting the data.');
                    }
                });
            });
        });
    </script>
</head>
<body>
<section class="sidebar">
    <div class="nav-header">
        <p class="logo">المركب التربوي الأمين<br><span>مصلحة النقل المدرسي</span></p>
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


</header>
    <br>
    <div class="container">
        <div class="text-center">
            <span style="font-size: 50px; font-weight: 600;">الغياب</span>
        </div>
        <br>
        <form id="addForm" method="post" action="">
            <table id="myTable_test" class="display" style="color: var(--text-color);">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>اسم التلميذ</th>
                    <th>المستوى الدراسي</th>
                    <th>رقم الحافلة</th>
                    <th>
                        <?php
                        if ($_POST['Period'] == 'Entrée_matin') {
                            echo "الدخول الصباحي";
                        } elseif ($_POST['Period'] == 'Sortie_matin') {
                            echo "الخروج الصباحي";
                        } elseif ($_POST['Period'] == 'Entrée_soir') {
                            echo "الدخول المسائي";
                        } elseif ($_POST['Period'] == 'Sortie_soir') {
                            echo "الخروج المسائي";
                        }
                        ?>
                    </th>
                    <th>تسجيل</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_POST["record"])) {
                    $Period = $_POST["Period"];
                    $id_bus = $_POST["id_bus"];
                    $stmt = $con->prepare("SELECT ID_étudient, Nom_complet, niveau_étude, Numéro_de_bus FROM bus_scolaire INNER JOIN etudient ON bus_scolaire.ID_bus = etudient.IdBus WHERE bus_scolaire.ID_bus = :id_bus");
                    $stmt->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                    $stmt->execute();

                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $v) {
                        $count++;
                        ?>
                        <tr>
                            <td><?php echo $v["ID_étudient"]; ?></td>
                            <td><?php echo $v["Nom_complet"]; ?></td>
                            <td><?php echo $v["niveau_étude"]; ?></td>
                            <td><?php echo $v["Numéro_de_bus"]; ?></td>
                            <td>
                                <input class="form-check-input" type="checkbox" name="check[]" value="<?php echo $v["ID_étudient"]; ?>">
                                <label class="form-check-label" for="check_<?php echo $v["ID_étudient"]; ?>">غائب</label>
                                <input name='std[]' value="<?php echo $v["ID_étudient"]; ?>" type='hidden' class='form-control'>
                            </td>
                            <td>
                                <button type="submit" class="edit-button btn btn-success" name="add">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" fill="white"/>
                                    </svg>
                                </button>
                                <input type="hidden" name="Period" value="<?php echo $_POST['Period']; ?>">
                                <input type="hidden" name="id_bus" value="<?php echo $_POST['id_bus']; ?>">
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </form>
        <?php
        // The following block should be moved to 'process_absence.php'
        /*
        if (isset($_POST['add'])) {
            $std = isset($_POST['std']) ? $_POST['std'] : [];
            $check = isset($_POST['check']) ? $_POST['check'] : [];
            $Period = $_POST["Period"];
            $id_bus = $_POST["id_bus"];

            foreach ($std as $student_id) {
                if ($Period == 'Entrée_matin') {
                  if(in_array($student_id, $check)) {
                    $req = "INSERT INTO absence (Entrée_matin, IDétudient, IDbus) VALUES ('غائب', :student_id, :id_bus)";
                    $stmt = $con->prepare($req);
                    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                    $stmt->execute();
                  }else {
                    $req="INSERT INTO absence ( IDétudient, IDbus) VALUES (:student_id, :id_bus);";
                    $stmt = $con->prepare($req);
                    $stmt = $con->prepare($req);
                    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                    $stmt->execute();
                    
                  }
                } else {
                  if(in_array($student_id, $check)) {
                    $sql_update = "UPDATE absence SET $Period='غائب' WHERE IDétudient=:student_id AND IDbus=:id_bus AND Date_Absence=CURDATE()";
                    $stmt_update = $con->prepare($sql_update);
                    $stmt_update->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt_update->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                    $stmt_update->execute();
                  }
                }
            }
        }
        */
        ?>
    </div>
</section>
<script src="../views/js/bootstrap.bundle.min.js"></script>
<script src="../views/js/javascript.js"></script>

</body>
</html>
