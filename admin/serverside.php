<!DOCTYPE html>
<html>
<head>
    <title>Server-Side DataTable</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <select id="categoryFilter">
        <option value="">All</option>
        <!-- Populate the select options dynamically from your database -->
    </select>
    <select id="genderFilter">
    <option value="">All</option>
    <option value="L">Male</option>
    <option value="P">Female</option>
</select>
    <table id="itemsTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
            </tr>
        </thead>
    </table>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            var dataTable = $('#itemsTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "ajax.php", // Your server-side script
                    "data": function (data) {
                        data.gender = $('#genderFilter').val();
                    },
                    "type": "POST" // You can also use POST method
                },
                "columns": [
                    { "data": "id" },
                    { "data": "nama" },
                    { "data": "jk" },
                    { "data": "alamat" }
                ]
            });
            $('#genderFilter').on('change', function () {
                dataTable.ajax.reload();
            });
        });
        

    </script>
</body>
</html>
