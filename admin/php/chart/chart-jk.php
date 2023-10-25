
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <h1>Grafik Jumlah Laki-laki dan Perempuan per Bulan</h1>
    <div style="width: 80%;">
        <canvas id="barChart"></canvas>
    </div>

    <!-- <script>
        // Fungsi untuk mengambil data dari server
        function fetchData() {
            fetch('chart-umur-per-bulan-jk.php')
                .then(response => response.json())
                .then(data => {
                    const bulan = data.map(item => item.periode);
                    const jumlahLaki = data.map(item => item.jumlah_laki);
                    const jumlahPerempuan = data.map(item => item.jumlah_perempuan);

                    const ctx = document.getElementById('barChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: bulan,
                            datasets: [
                                {
                                    label: 'Laki-laki',
                                    backgroundColor: 'blue',
                                    data: jumlahLaki,
                                },
                                {
                                    label: 'Perempuan',
                                    backgroundColor: 'pink',
                                    data: jumlahPerempuan,
                                },
                            ],
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    });
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }

        // Panggil fetchData() saat halaman dimuat
        fetchData();
    </script>
 -->