<!DOCTYPE html>
<html>
<head>
    <title>Contoh Update Div</title>
</head>
<body>
    <div id="updateMe"></div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" ></script>
    <script>
        // Fungsi untuk memperbarui div
        function updateDiv() {
            const divToUpdate = document.getElementById("updateMe");
            
            // Lakukan permintaan AJAX
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "ajax/warga_update.php?warga_update", true); // Gantilah "update.php" dengan URL yang sesuai
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Perbarui isi div dengan respons dari server
                    divToUpdate.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        // Perbarui div setiap 5 detik (misalnya)
        setInterval(updateDiv, 3000); // Perbarui setiap 5 detik (5000 milidetik)
    </script>
</body>
</html>
