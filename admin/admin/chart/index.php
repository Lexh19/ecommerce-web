<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <canvas id="myChart" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);"></canvas>

    <title>Grafik Harga Produk</title>
    <!-- Memuat library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Mengambil data dari file PHP menggunakan AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "data.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                const categories = Object.keys(data);
                const averagePrices = Object.values(data);

                // Membuat grafik menggunakan Chart.js
                const ctx = document.getElementById("myChart").getContext("2d");
                const myChart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: categories,
                        datasets: [{
                            label: "Harga Rata-Rata Produk",
                            data: averagePrices,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        };
        xhr.send();
    </script>
</body>

</html>