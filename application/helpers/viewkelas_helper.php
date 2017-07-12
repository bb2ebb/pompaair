<?php

function kelas() {
    $ci = & get_instance();
    $str = "";
    $summary = $ci->querybuilder->selectview('siswa_kelas');
    foreach ($summary->result() as $value) {
        $str = $str . "[" . $value->idkelas . ",'" . $value->uraian . "'],";
    }
    return trim($str, ",");
}

function subkelas($key) {
    $str = "";
    $ci = & get_instance();
    $summary = $ci->db->get_where('siswa_subkelas', array('idsubkelas' => $key))->result();
    foreach ($summary as $value)$str = $value->uraian;
    return (string) $str;
}
function jumlah_lk_pr_perkelas($jk, $kelas, $subkelas) {
    $str = "";
    $ci = & get_instance();
    $summary = $ci->db->query("SELECT (count(nama_lengkap)) AS jumlah FROM siswa_user WHERE jenis_kelamin='$jk' AND kelas='$kelas' AND subkelas='$subkelas' GROUP BY kelas,subkelas,jenis_kelamin")->result();
    $summary = $ci->db->query("SELECT (count(nama_lengkap)) AS jumlah FROM siswa_user WHERE jenis_kelamin='$jk' AND kelas='$kelas' AND subkelas='$subkelas' GROUP BY kelas,subkelas,jenis_kelamin")->result();
    
    foreach ($summary as $value){
        $str = $value->jumlah;
    }
    return (string) $str;
}


?>