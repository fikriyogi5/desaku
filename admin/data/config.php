<?php
// Database configuration
$config = array(
    'db_host' => 'localhost',
    'db_name' => 'desaku',
    'db_user' => 'root',
    'db_pass' => '',
);

// Table configurations
$tables = array(
    'warga' => array(
        'primary_key' => 'id',
        'columns' => array(
            'id',
            'nama',
            'nik',
            'kk',
            'alamat',
            'tempat_lahir',
            'tanggal_lahir',
            // Add more columns as needed
        ),
    ),
    'laporan_masuk' => array(
        'primary_key' => 'id',
        'columns' => array(
            'id',
            'nama',
            'status',
            'tanggal_masuk',
            // Add more columns as needed
        ),
    ),
    'desa' => array(
        'primary_key' => 'id',
        'columns' => array(
            'id',
            'name',
            // Add more columns as needed
        ),
    ),
    // Add more tables with their configurations here
);
