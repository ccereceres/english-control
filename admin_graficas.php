<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['tipo_usuario'] === 3) {
        include_once 'inc/db.php';
        $sqlCount = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 1";
        $num1 = mysqli_query($link, $sqlCount);
        $row = mysqli_fetch_row($num1);
        $sqlCount2 = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 2";
        $num2 = mysqli_query($link, $sqlCount2);
        $row2 = mysqli_fetch_row($num2);
        $sqlCount3 = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 3";
        $num3 = mysqli_query($link, $sqlCount3);
        $row3 = mysqli_fetch_row($num3);
        $sqlCount4 = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 4";
        $num4 = mysqli_query($link, $sqlCount4);
        $row4 = mysqli_fetch_row($num4);
        $sqlCount5 = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 5";
        $num5 = mysqli_query($link, $sqlCount5);
        $row5 = mysqli_fetch_row($num5);
        include 'inc/headerAdmin.php'; ?>
        <div>
            <canvas id="myChart"></canvas>
        </div>
        </div>
        </main>

        </div>
        </div>
        <script type="application/javascript">
            let datos = [<?php echo $row[0] ?>,<?php echo $row2[0] ?>,<?php echo $row3[0] ?>,<?php echo $row4[0] ?>,<?php echo $row5[0] ?>]
        </script>
        <script src="tpl/js/scriptsPanel.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.js" integrity="sha256-+48ixHHdEyikQezynIIzVjU1eGcJqNNEhQgbvKOumAY=" crossorigin="anonymous"></script>
        <script src="tpl/js/chartTest.js"></script>
        </body>
        </html>

<?php
    }
}
