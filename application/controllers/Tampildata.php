<?php

class Tampildata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        ini_set('max_execution_time', 300);
        ini_set('memory_limit', '-1');
    }

    public function edit() {
        $data['title'] = 'Edit Thread';
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
        $query = "SELECT s.* FROM (
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'bittrex' AS exch, link AS link, status AS status, ket_status AS vstatus,history_buy1jam AS hbuy1,history_sell1jam AS hsell1, history_buy24jam AS hbuy24,history_sell24jam AS hsell24 FROM exc_bittrex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_base AS vol_btc, volume AS vol_alt, date_input AS input, date_update AS upd, 'bleutrade' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_bleutrade WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'btce' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_btce WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, '0' AS vol_alt, date_input AS input, date_update AS upd, 'ccex' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_ccex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'cryptopia' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_cryptopia WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'poloniex' AS exch, link AS link, status AS status, ket_status AS vstatus,history_buy1jam AS hbuy1,history_sell1jam AS hsell1, history_buy24jam AS hbuy24,history_sell24jam AS hsell24 FROM exc_poloniex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'vipbtckoid' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_vipbtckoid WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'yobit' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_yobit WHERE base='btc')
) s WHERE s.alt='".$this->input->get('getalt')."' AND s.alias='".$this->input->get('getcurr')."'";
        $data['datatabel'] = $this->db->query($query)->result();
        $this->template->load('template/template_admin', 'tampildata_edit',$data);
    }
    public function index() {
        
        $bs = "";
        if (isset($_POST['editthread'])) $this->db->query("CALL updatethread('".$this->input->post('thread_p')."', '".$this->input->post('id_a')."')");
        if (isset($_POST['buylebihbesardaripadasell1'])) $bs=" WHERE hbuy1>hsell1 ";
        if (isset($_POST['buylebihbesardaripadasell24'])) $bs=" WHERE hbuy24>hsell24 ";
        if (isset($_POST['buylebihbesardaripadasell241'])) $bs=" WHERE hbuy1>hsell1 AND hbuy24>hsell24 ";
        $query = "SELECT s.* FROM (
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'bittrex' AS exch, link AS link, status AS status, ket_status AS vstatus,history_buy1jam AS hbuy1,history_sell1jam AS hsell1, history_buy24jam AS hbuy24,history_sell24jam AS hsell24 FROM exc_bittrex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_base AS vol_btc, volume AS vol_alt, date_input AS input, date_update AS upd, 'bleutrade' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_bleutrade WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'btce' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_btce WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, '0' AS vol_alt, date_input AS input, date_update AS upd, 'ccex' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_ccex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'cryptopia' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_cryptopia WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'poloniex' AS exch, link AS link, status AS status, ket_status AS vstatus,history_buy1jam AS hbuy1,history_sell1jam AS hsell1, history_buy24jam AS hbuy24,history_sell24jam AS hsell24 FROM exc_poloniex WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'vipbtckoid' AS exch, link AS link, status AS status, ket_status AS vstatus, '0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_vipbtckoid WHERE base='btc') UNION
(SELECT id AS id, thread, currency AS alt, alias_currency AS alias, bid AS bid, ask AS ask, volume_btc AS vol_btc, volume_alt AS vol_alt, date_input AS input, date_update AS upd, 'yobit' AS exch, link AS link, status AS status, ket_status AS vstatus,'0' AS hbuy1,'0' AS hsell1, '0' AS hbuy24,'0' AS hsell24 FROM exc_yobit WHERE base='btc')
) s ".$bs."
ORDER BY s.input DESC
";
        $sql = $this->db->query($query);
        if (isset($_POST['updatecount'])) {
            $this->db->update("bitcointalk_count", ["cont"=>  $sql->num_rows()], ["id"=>"a2"]);
        }
        $exccounter = $this->db->get_where("bitcointalk_count", ["id"=>"a2"])->result();
        $data['itunganexc'] = $exccounter[0]->cont;
        $data['hasil'] = $sql->result();
        $data['num'] = $sql->num_rows();
        $data['title'] = 'Tampilkan '.$sql->num_rows().' Hasil';
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
        $this->template->load('template/template_admin', 'tampildata',$data);
    }
    
    public function poloniex() {
        $db = $this->db->get_where('exc_poloniex',['id'=>$this->input->get('getcurrency')]);
        if ($db->num_rows()) {
            $this->db->query("SELECT CONCAT('KILL ',id ,';') AS run_this FROM information_schema.processlist WHERE user='root' AND info = 'SELECT * FROM processlist'");
            if (isset($_POST['perbaharui'])) {
                $perbaharui = json_decode(file_get_contents('https://poloniex.com/public?command=returnTradeHistory&currencyPair='.$db->result()[0]->id.'&start='.date_timestamp_get(date_create(date("Y-m-d h:i:s",strtotime("-33 HOURS"))))), true);
                $perbaharuidata = [];
                foreach ($perbaharui as $perbaharui_poloniex) {
                    $perbaharuidata[] = array(
                        'idcurrency' => $db->result()[0]->id,
                        'currency' => $db->result()[0]->currency,
                        'alias_currency' => $db->result()[0]->alias_currency,
                        'date' => date_timestamp_get(date_create($perbaharui_poloniex['date']))-18000,
                        'type' => $perbaharui_poloniex['type'],
                        'rate' => strval(number_format($perbaharui_poloniex['rate'], 8, '.', '')),
                        'amount' => strval(number_format($perbaharui_poloniex['amount'], 8, '.', '')),
                        'total' => strval(number_format($perbaharui_poloniex['total'], 8, '.', ''))
                    );
                }
                $this->db->insert_batch_ignore("bdb_poloniex", $perbaharuidata);
            }
            
            $namakoin = $this->db->get_where('exc_poloniex',['id'=>$this->input->get('getcurrency')])->result()[0]->alias_currency;
            $data['namakoin'] = $namakoin;
            $data['title'] = 'Tampilkan Hasil '.$namakoin;
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
            
            $databesar = "SELECT s.* FROM("
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'5MENb' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='buy' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 485 MINUTE))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'5MENs' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='sell' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 485 MINUTE))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'10MENb' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='buy' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 490 MINUTE))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'10MENs' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='sell' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 490 MINUTE))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'20MENb' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='buy' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 500 MINUTE))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'20MENs' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='sell' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 500 MINUTE))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'30MENb' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='buy' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 510 MINUTE))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'30MENs' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='sell' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 510 MINUTE))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'1hb' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='buy' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 9 HOUR))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'1hs' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='sell' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 9 HOUR))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'2hb' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='buy' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 10 HOUR))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'2hs' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='sell' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 10 HOUR))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'3hb' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='buy' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 11 HOUR))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'3hs' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='sell' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 11 HOUR))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'24hb' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='buy' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 33 HOUR))) UNION"
                   . "(SELECT COUNT(id) AS a, MIN(rate) AS b, MAX(rate) AS c,'24hs' AS d FROM bdb_poloniex WHERE idcurrency='".$this->input->get('getcurrency')."' AND type='sell' AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 33 HOUR)))"
                    . ") s";
           $getdatabesar = $this->db->query($databesar)->result();
           $array = [];
           foreach ($getdatabesar as $value) {
               if ($value->d === '5MENb')$array['5MENb'] = [$value->a,$value->b,$value->c];
               if ($value->d === '10MENb')$array['10MENb'] = [$value->a,$value->b,$value->c];
               if ($value->d === '20MENb')$array['20MENb'] = [$value->a,$value->b,$value->c];
               if ($value->d === '30MENb')$array['30MENb'] = [$value->a,$value->b,$value->c];
               if ($value->d === '1hb')$array['1hb'] = [$value->a,$value->b,$value->c];
               if ($value->d === '2hb')$array['2hb'] = [$value->a,$value->b,$value->c];
               if ($value->d === '3hb')$array['3hb'] = [$value->a,$value->b,$value->c];
               if ($value->d === '24hb')$array['24hb'] = [$value->a,$value->b,$value->c];
               
               if ($value->d === '5MENs')$array['5MENs'] = [$value->a,$value->b,$value->c];
               if ($value->d === '10MENs')$array['10MENs'] = [$value->a,$value->b,$value->c];
               if ($value->d === '20MENs')$array['20MENs'] = [$value->a,$value->b,$value->c];
               if ($value->d === '30MENs')$array['30MENs'] = [$value->a,$value->b,$value->c];
               if ($value->d === '1hs')$array['1hs'] = [$value->a,$value->b,$value->c];
               if ($value->d === '2hs')$array['2hs'] = [$value->a,$value->b,$value->c];
               if ($value->d === '3hs')$array['3hs'] = [$value->a,$value->b,$value->c];
               if ($value->d === '24hs')$array['24hs'] = [$value->a,$value->b,$value->c];
               
               
           }
            $data['arraytabel']=$array;
            $this->template->load('template/template_admin', 'dataperkiraanexchange',$data);
        }
    }
}

?>
