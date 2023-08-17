<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Thống kê
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <thead>
                        <tr>

                            <th scope="col">Mã Danh Mục</th>
                            <th scope="col">Tên Danh Mục</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Giá Cao Nhất</th>
                            <th scope="col">Giá Thấp Nhất</th>
                            <th scope="col">Giá Trung Bình</th>

                        </tr>
                    </thead>
                    <?php
                    $listthongke = loadall_thongke();
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        echo '<tbody>
                                                            <tr>
                                                                <td>' . $madm . '</td>
                                                                <td>' . $tendm . '</td>
                                                                <td>' . $countsp . '</td>
                                                                <td>' . $maxgia . '</td>
                                                                <td>' . $mingia . '</td>
                                                                <td>' . $avggia . '</td>
                                                            </tr>
                                                            
                                                        </tbody>';
                    }
                    ?>

                </table>
            </div>
            <div>
                <div class="row">
                    <div id="piechart"></div>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <script type="text/javascript">
                        // Load google charts
                        google.charts.load('current', { 'packages': ['corechart'] });
                        google.charts.setOnLoadCallback(drawChart);

                        // Draw the chart and set the chart values
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Danh mục', 'Số lượng sản phẩm'],
                                <?php
                                $tongdm = count($listthongke);
                                $i = 1;
                                foreach ($listthongke as $thongke) {
                                    extract($thongke);
                                    if ($i == $tongdm)
                                        $dauphay = "";
                                    else
                                        $dauphay = ",";
                                    echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . " ]" . $dauphay;
                                    $i += 1;
                                }
                                ?>

                            ]);

                            // Optional; add a title and set the width and height of the chart
                            var options = { 'title': 'Thống Kê Dữ Liệu Của Shop', 'width': 1000, 'height': 500 };

                            // Display the chart inside the <div> element with id="piechart"
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</main>