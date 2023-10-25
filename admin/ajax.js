// ajax.js

document.addEventListener("DOMContentLoaded", function () {
    const kecamatanSelect = document.getElementById("kecamatan");
    const desaSelect = document.getElementById("desa");
    const kabupatenSelect = document.getElementById("kabupaten");
    const dataTable = document.getElementById("data-table");

    kecamatanSelect.addEventListener("change", function () {
        const selectedKecamatan = kecamatanSelect.value;

        // Kirim permintaan AJAX untuk mendapatkan data desa berdasarkan kecamatan yang dipilih
        fetch("get_data.php?kecamatan=" + selectedKecamatan)
            .then((response) => response.json())
            .then((data) => {
                // Hapus data yang ada di tabel
                dataTable.innerHTML = '';

                // Tampilkan data desa dalam tabel
                data.forEach((desa) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${desa.nama}</td>
                        <td>${desa.alamat}</td>
                        <td>${desa.telepon}</td>
                    `;
                    dataTable.appendChild(row);
                });
            })
            .catch((error) => console.error("Error:", error));
    });

    // Implementasikan hal serupa untuk desa dan kabupaten jika diperlukan
});
