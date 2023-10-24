<?php
class WidgetTemplate {
    private $title;
    private $table;
    private $row1;
    private $row2;
    private $condition;
    private $limit;
    private $viewType;
    private $db;

    public function __construct($title, $table, $row1, $row2, $condition = '', $limit = null, $viewType = 'list', $db) {
        $this->title = $title;
        $this->table = $table;
        $this->row1 = $row1;
        $this->row2 = $row2;
        $this->condition = $condition;
        $this->limit = $limit;
        $this->viewType = $viewType;
        $this->db = $db;
    }

    public function render() {
        // echo '<div class="widget">';
        echo '<h2>' . $this->title . '</h2>';
        // echo '<div class="widget-content">';
        
        // // Menampilkan informasi tabel yang ditampilkan
        // echo '<p>Tabel: ' . $this->table . '</p>';
        
        // if (!empty($this->condition)) {
        //     echo '<p>Kondisi: ' . $this->condition . '</p>';
        // }
        
        // if (!is_null($this->limit)) {
        //     echo '<p>Limit: ' . $this->limit . '</p>';
        // }
        
        // Menampilkan konten widget (data dari tabel)
        $data = $this->getTableData();
        $this->displayTableData($data, $this->row1, $this->row2, $this->viewType);

        
        // echo '</div>';
        // echo '</div>';
    }

    private function getTableData() {
        $query = "SELECT * FROM " . $this->table;
        
        if (!empty($this->condition)) {
            $query .= " WHERE " . $this->condition;
        }
        
        if (!is_null($this->limit)) {
            $query .= " LIMIT " . $this->limit;
        }

        $result = $this->db->query($query);

        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function card_view_1($data) {
        echo '<div class="list-group list-custom-large short-border check-visited">   
                    <a href="' . $data['link'] . '?id=' . $data['id'] . '" class="border-0">
                        <i class="fa fa-share-alt bg-blue-dark rounded-s"></i>
                        <span>' . $data['description'] . '</span>
                        <strong>' . $data['image'] . '</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>';
    }
    public function list_view_1($data) {
        echo '<div class="list-group list-custom-large short-border check-visited">   
                    <a href="' . $data['link'] . '?id=' . $data['id'] . '" class="border-0">
                        <i class="fa fa-share-alt bg-blue-dark rounded-s"></i>
                        <span>' . $data['title'] . '</span>
                        <strong>' . $data['image'] . '</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                ';
    }
    public function table_view($data) {
        echo '
                <div class="col-3"><p class="font-13 mb-0 font-500 color-theme text-start">' . $data['title'] . '</p></div>
                <div class="col-3">
                    <p class="font-13 mb-0 font-800 color-theme text-center"><i class="fa fa-arrow-up color-green-dark pe-1"></i> ' . $data['description'] . '</p>
                </div>
                <div class="col-3">
                    <p class="font-13 mb-0 font-800 color-theme text-end"><i class="fa fa-arrow-down color-red-dark pe-1"></i> ' . $data['image'] . '</p>
                </div>
                <div class="col-3">
                    <p class="font-13 mb-0 font-800 color-theme text-end"><i class="fa fa-arrow-down color-red-dark pe-1"></i> ' . $data['sisa'] . '</p>
                </div>
                <div class="divider w-100 mb-2 mt-2"></div>
            
    
                ';
    }
    private function displayTableData($data, $row1, $row2, $viewType) {
        if (!empty($data)) {
            echo '<div class="card ">
                <div class="content mb-0">
                    <h4 class="font-700 text-uppercase font-12 opacity-30 mb-3 mt-n2">Exchange Rates</h4>
                    <div class="row mb-3">
                        <div class="col-3"><p class="font-14 mb-0 font-800 color-theme text-start">Kegiatan</p></div>
                        <div class="col-3"><p class="font-14 mb-0 font-800 color-theme text-center">Anggaran</p></div>
                        <div class="col-3"><p class="font-14 mb-0 font-800 color-theme text-end">Realisasi</p></div>
                        <div class="col-3"><p class="font-14 mb-0 font-800 color-theme text-end">Sisa</p></div>
                        <div class="divider w-100 mb-2 mt-2"></div>';
            foreach ($data as $row) {
                $data = array(
                    'id' => $row2,
                    'link' => 'profil.php',
                    'title' => $row[$row1[0]],
                    'description' => $row[$row1[1]],
                    'image' => $row[$row1[2]],
                    'sisa' => $row[$row1[3]],
                );
                
                
                if ($viewType === 'list_view_1') {
                    $this->list_view_1($data);
                } elseif ($viewType === 'card_view_1') {
                    $this->card_view_1($data);
                }  elseif ($viewType === 'table_view') {
                    $this->table_view($data);
                } else {
                    // echo 'Jenis tampilan tidak valid.';
                }
            }
            echo '</div>
            </div>
        </div>';
        } else {
            echo 'Tidak ada data yang ditemukan.';
        }
    }
    
    
}


// array mode 
$widgetParams = array(
    'title' => "Widget Title",
    'table' => "dana_desa",
    'row1' => ['kegiatan', 'anggaran', 'realisasi', 'sisa'], 
    'row2' => "id",
    'condition' => '', //jk = "P"
    'limit' => 3,
    'viewType' => 'table_view', // Ubah menjadi 'list' atau 'card' sesuai kebutuhan Anda.
);
// Menggunakan PDO untuk koneksi database
$db = new PDO("mysql:host=localhost;dbname=desaku", "root", "");

$widget = new WidgetTemplate(
    $widgetParams['title'],
    $widgetParams['table'],
    $widgetParams['row1'],
    $widgetParams['row2'],
    $widgetParams['condition'],
    $widgetParams['limit'],
    $widgetParams['viewType'],
    $db
);

$widget->render();