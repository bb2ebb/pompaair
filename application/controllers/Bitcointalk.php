<?php
class Bitcointalk extends CI_Controller {
    public function __construct() {
        parent::__construct();
        ini_set('max_execution_time', 300);
    }

    public function index() {
        $cari = "";
        $db = $this->db->get('bitcointalk');
        $totaldb = $db->num_rows();
        if (isset($_POST['updatecount'])) {
            $this->db->update("bitcointalk_count", ["cont"=>  $totaldb], ["id"=>"a1"]);
        }
        if (isset($_POST['hapusduplikat'])) {
            $this->db->query("DELETE FROM bitcointalk WHERE bitcointalk.id NOT IN (SELECT p.id FROM (SELECT max(date_input) AS ad, id FROM bitcointalk GROUP BY link) AS p)");
            $this->db->update("bitcointalk_count", ["cont"=>  $totaldb], ["id"=>"a1"]);
        }
        if (isset($_POST['editcontact'])) {
            $this->db->update("bitcointalk_kontak", ["forum"=>$this->input->post('forum_p'),"reddit"=>$this->input->post('reddit_p'),"github"=>$this->input->post('github_p'),"twitter"=>  $this->input->post('twitter_p'),"facebook"=>  $this->input->post('facebook_p'),"slack"=>  $this->input->post('slack_p'),"website"=>  $this->input->post('website_p') ], ["link"=>  $this->input->post('id_p')]);
        }
        if (isset($_POST['cari'])) {
            $cari = " WHERE judul LIKE '%".$this->input->post('fieldcari')."%' ";
        }
        $data['title'] = 'Data Bitcointalk';
        $data['hasil'] = $this->db->query("SELECT id,judul,link,date_input,type, 
(SELECT bitcointalk_kontak.facebook FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS facebook,
(SELECT bitcointalk_kontak.twitter FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS twitter,
(SELECT bitcointalk_kontak.slack FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS slack,
(SELECT bitcointalk_kontak.website FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS website,
(SELECT bitcointalk_kontak.github FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS github,
(SELECT bitcointalk_kontak.reddit FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS reddit,
(SELECT bitcointalk_kontak.forum FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS forum
FROM bitcointalk ".$cari." ORDER BY bitcointalk.date_input DESC limit 1000");
//        print_r($this->db->last_query());
        $dbcounter = $this->db->get_where("bitcointalk_count", ["id"=>"a1"])->result();
        $data['itungan'] = $dbcounter[0]->cont;
        $data['tanggalupdate'] = $dbcounter[0]->update_date;
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/datatables.min.css') => 'css',
            base_url('assets/css/style.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js',
            base_url('assets/js/datatables.min.js') => 'js',
            base_url('assets/js/style.js') => 'js'
        ));
        if ($data['itungan'] < $totaldb) {
            $data['mp3'] = '<audio src="assets/aby_hound.mp3" loop="loop" id="my_audio"></audio>\n<script>$(document).ready(function() {$("#my_audio").get(0).play();});</script>';
        }
        $data['totaldb']=$totaldb;
        
        $this->template->load('template/template_admin', 'bcttalk',$data);
    }
    
    public function edit() {
        $data['title'] = 'Edit Bitcointalk';
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/datatables.min.css') => 'css',
            base_url('assets/css/style.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js',
            base_url('assets/js/datatables.min.js') => 'js',
            base_url('assets/js/style.js') => 'js'
        ));
        $data['datatabel'] = $this->db->query("SELECT id,judul,link,date_input,type, 
(SELECT bitcointalk_kontak.facebook FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS facebook,
(SELECT bitcointalk_kontak.twitter FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS twitter,
(SELECT bitcointalk_kontak.slack FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS slack,
(SELECT bitcointalk_kontak.website FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS website,
(SELECT bitcointalk_kontak.github FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS github,
(SELECT bitcointalk_kontak.reddit FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS reddit,
(SELECT bitcointalk_kontak.forum FROM bitcointalk_kontak WHERE bitcointalk_kontak.link=bitcointalk.link) AS forum
FROM bitcointalk WHERE link='".urldecode($this->input->get("getlink"))."'")->result();
//        $data['datatabel'] = $this->db->get_where("bitcointalk", ["link"=> urldecode($this->input->get("getlink"))])->result();
        $this->template->load('template/template_admin', 'bcttalk_edit',$data);
    }
    
    public function alarmsaja() {
        $db = $this->db->get('bitcointalk');
        $totaldb = $db->num_rows();
        $data['title'] = 'Alarm Bitcointalk ';
        $dbcounter = $this->db->get_where("bitcointalk_count", ["id"=>"a1"])->result();
        $data['itungan'] = $dbcounter[0]->cont;
        $exccounter = $this->db->get_where("bitcointalk_count", ["id"=>"a2"])->result();
        $data['itunganexc'] = $exccounter[0]->cont;
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/datatables.min.css') => 'css',
            base_url('assets/css/style.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js',
            base_url('assets/js/datatables.min.js') => 'js',
            base_url('assets/js/style.js') => 'js'
        ));
        $q1 = intval($data['itungan']);
        $q2 = intval($totaldb);
        $exc1 = intval($data['itunganexc']);
        $exc2 = intval($this->getcountsemuatabel());
        if ($q1 < $q2) {
            $data['mp3'] = '
                <audio src="../assets/aby_hound.mp3" loop="loop" id="my_audio"></audio>
                    <script>$(document).ready(function() {$("#my_audio").get(0).play();});</script>';
            $data['resuts'] = 'ALARM BERBUNYI';
        }
        else {
            $data['resuts'] = 'alarm belum berbunnyi ';
        }
        $this->template->load('template/template_admin', 'dadadat',$data);
    }
    
    public function alarmsaja1() {
        $data['title'] = 'Alarm Bitcointalk ';
        $exccounter = $this->db->get_where("bitcointalk_count", ["id"=>"a2"])->result();
        $data['itunganexc'] = $exccounter[0]->cont;
        $data['tambahan_cssjs'] = tambahan_attribut(array(base_url('assets/css/bootstrap.min.css') => 'css',base_url('assets/css/datatables.min.css') => 'css',base_url('assets/css/style.css') => 'css',base_url('assets/css/font-awesome.css') => 'css',base_url('assets/css/own.pageadmin.css') => 'css'));
        $data['script'] = tambahan_attribut(array(base_url('assets/js/jquery.js') => 'js',base_url('assets/js/bootstrap.min.js') => 'js',base_url('assets/js/datatables.min.js') => 'js',base_url('assets/js/style.js') => 'js'));
        $exc1 = intval($data['itunganexc']);
        $exc2 = intval($this->getcountsemuatabel());
        if ($exc1 < $exc2) {
            $data['mp3'] = '
                <audio src="../assets/asw.mp3" loop="loop" id="my_audio"></audio>
                    <script>$(document).ready(function() {$("#my_audio").get(0).play();});</script>';
            $data['resuts'] = 'ALARM BERBUNYI';
        }
        else {
            $data['resuts'] = 'alarm belum berbunnyi '.$exc1." - ".$exc2;
        }
        $this->template->load('template/template_admin', 'dadadat',$data);
    }
    
    public function tambah_announcementaltcoin() {
        require('simple_html_dom.php');
        $gettablebtctalk = file_get_html("https://bitcointalk.org/index.php?board=159.".$this->input->get('halaman'));
//        $gettablebtctalk = file_get_html("http://127.0.0.1/karbitexchanges/test");
        $table = $gettablebtctalk->find('table', 7);
        $rowData = array();
        $datalink = array();
            
        foreach($table->find('tr') as $row) {
            $int = 0;
            foreach($row->find('td') as $cell) {
                if ($int++ === 2) {
                    foreach ($cell->find('a') as $data) {
                        $rowData[] = ["judul"=>$data->innertext,"link"=>$data->href, "type"=>"Announcement Altcoin"];
                        $datalink[] = ["link"=>$data->href];
                        break;
                    }
                }
            }
        }
        unset($rowData[0]);
        unset($datalink[0]);
        $this->db->insert_batch_ignore("bitcointalk", $rowData);
        $this->db->insert_batch_ignore("bitcointalk_kontak", $datalink);
        $this->db->query("UPDATE bitcointalk_count SET update_date=NOW() WHERE id='a1'");
    }
    
    
    
    public function giveaway_bitcoingarden() {
        require('simple_html_dom.php');
        $gettablebtctalk = file_get_html("http://bitcoingarden.tk/forum/index.php?board=2.".$this->input->get('halaman'));
        $table = $gettablebtctalk->find('table', ($this->input->get('halaman') > 0)?2:3);
        $rowData = array();
        $datalink = array();
            
        foreach($table->find('tr') as $row) {
            $int = 0;
            foreach($row->find('td') as $cell) {
                if ($int++ === 2) {
                    foreach ($cell->find('a') as $data) {
                        $link = str_replace("amp;", "", 'http://bitcoingarden.tk/forum/index.php?'.explode("&", $data->href)[1]);
                        $rowData[] = ["judul"=>$data->innertext,"link"=>$link, "type"=>"Bitcoin Garden Giveaway"];
                        $datalink[] = ["link"=>$link];
                        break;
                    }
                }
            }
        }
        $this->db->insert_batch_ignore("bitcointalk", $rowData);
        $this->db->insert_batch_ignore("bitcointalk_kontak", $datalink);
        $this->db->query("UPDATE bitcointalk_count SET update_date=NOW() WHERE id='a1'");
    }
    
    public function test() {
        $awb = "http://bitcoingarden.tk/forum/index.php?PHPSESSID=7g3u4qskm9qu2iti1a404evsr6&topic=10532.0";
        $link = explode("&", $awb);
        echo $link[1];
    }
    
    
    
    
    public function tambah_marketplacealtcoin() {
        require('simple_html_dom.php');
        $gettablebtctalk = file_get_html("https://bitcointalk.org/index.php?board=161.".$this->input->get('halaman'));
//        $gettablebtctalk = file_get_html("http://127.0.0.1/karbitexchanges/test");
        $table = $gettablebtctalk->find('table', ($this->input->get('halaman') > 0)?7:8);
        $rowData = array();
        $datalink = array();
            
        foreach($table->find('tr') as $row) {
            $int = 0;
            foreach($row->find('td') as $cell) {
                if ($int++ === 2) {
                    foreach ($cell->find('a') as $data) {
                        $rowData[] = ["judul"=>$data->innertext,"link"=>$data->href, "type"=>"Marketplace Altcoin"];
                        $datalink[] = ["link"=>$data->href];
                        break;
                    }
                }
            }
        }
        unset($rowData[0]);
        unset($datalink[0]);
        $this->db->insert_batch_ignore("bitcointalk", $rowData);
        $this->db->insert_batch_ignore("bitcointalk_kontak", $datalink);
        $this->db->insert_batch_ignore("bitcointalk", $rowData);
//        $this->db->query("UPDATE bitcointalk_count SET update_date=NOW() WHERE id='a1'");
    }
    
    private function getcountsemuatabel() {
        $query = "SELECT s.* FROM (
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'bittrex' AS exch, link AS link, status AS status, ket_status AS vstatus,history_buy1jam AS hbuy1,history_sell1jam AS hsell1, history_buy24jam AS hbuy24,history_sell24jam AS hsell24 FROM exc_bittrex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_base AS vol_btc, volume AS vol_alt, date_input AS input, date_update AS upd, 'bleutrade' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_bleutrade WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'btce' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_btce WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, '0' AS vol_alt, date_input AS input, date_update AS upd, 'ccex' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_ccex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'cryptopia' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_cryptopia WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'poloniex' AS exch, link AS link, status AS status, ket_status AS vstatus,history_buy1jam AS hbuy1,history_sell1jam AS hsell1, history_buy24jam AS hbuy24,history_sell24jam AS hsell24 FROM exc_poloniex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'vipbtckoid' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_vipbtckoid WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'yobit' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_yobit WHERE base='btc')
) s
";
        $sql = $this->db->query($query)->num_rows();
        return $sql;
    }
    
}

