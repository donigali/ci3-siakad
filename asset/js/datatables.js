var save_method; //for save method string
var table;

$(document).ready(function() {
    //datatables
    $('#tabel_siswa').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": '<?php echo site_url('dashboard/data_siswa'); ?>',
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columns": [
            {"data": "nis"},
            {"data": "nisn"},
            {"data": "nama_lengkap_siswa"},
            {"data": "nomor_hp_siswa"},
            {"data": "alamat_siswa"}
        ],

    });

});