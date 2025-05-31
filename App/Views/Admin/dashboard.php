<?php include_once __DIR__ . '/../Layout/homeheader.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Doanh thu theo ngày</h2>

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Ngày</th>
                <th>Tổng doanh thu (VNĐ)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dailyRevenue as $row): ?>
                <tr>
                    <td><?= $row['order_date'] ?></td>
                    <td><?= number_format($row['total_revenue'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container mt-5 mb-5">
    <h3 class="text-center mb-4">Thống kê doanh thu theo ngày</h3>
    <canvas id="revenueChart" width="400" height="200"></canvas>
</div>

<?php
$labels = isset($revenues) ? array_column($revenues, 'order_date') : [];
$data = isset($revenues) ? array_column($revenues, 'total_revenue') : [];
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = <?= json_encode($labels) ?>;
    const data = <?= json_encode($data) ?>;

    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + ' VNĐ';
                        }
                    }
                }
            }
        }
    });
</script>


<?php include_once __DIR__ . '/../Layout/homefooter.php'; ?>
<script src="<?= $base ?>assets/js/script.js"></script>