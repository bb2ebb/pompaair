<?php
class Coin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        ini_set('max_execution_time', 300);
    }

    public function index() {
        if (isset($_POST['buttonmasukkancoin'])) {
            $A = isset(explode("|", $this->input->post("masukkancoin"))[0])?explode("|", $this->input->post("masukkancoin"))[0]:"";
            $B = isset(explode("|", $this->input->post("masukkancoin"))[1])?explode("|", $this->input->post("masukkancoin"))[1]:"";
            $C = isset(explode("|", $this->input->post("masukkancoin"))[2])?explode("|", $this->input->post("masukkancoin"))[2]:"";
            $this->db->insert('savecoinx', ["coin"=>  $A, "nmlengkap"=>  $B, "keterangan"=>  $C]);
        }
        if (isset($_GET['hapus'])) {
            $this->db->delete("savecoinx", ["coin"=>  $this->input->get("hapus")]);
        }
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
        $data['title'] = 'Data Bitcointalk';
        $data['koinygdisimpan'] = $this->db->query("SELECT coin, nmlengkap, (SELECT GROUP_CONCAT(CONCAT('<a target=\"_blank\" href=\"',link,'\">',exchange,'</a>') SEPARATOR ', ') FROM savecoin WHERE idcoin=savecoinx.coin) AS exch, keterangan FROM savecoinx");
        $data['hasil'] = $this->db->limit('100')->get("savecoin");
        $this->template->load('template/template_admin', 'savecoin',$data);
    }
    
    public function ins_bleutrade() {
        $json_bleutrade = json_decode(file_get_contents('https://bleutrade.com/api/v2/public/getmarkets'), true);$bleutrade = [];$hapus = [];
        foreach ($json_bleutrade['result'] as $value) {
            $hapus[]=  hash("sha256", $value['MarketCurrency'].$value['MarketCurrencyLong']."Bleutrade");
            $bleutrade[] = array(
                'idcoin' => $value['MarketCurrency'],
                'lkkoin' => $value['MarketCurrencyLong'],
                'exchange' => "Bleutrade",
                'link' => 'https://bleutrade.com/exchange/'.$value['MarketCurrency'].'/BTC'
            );
        }
        $this->db->where_not_in('id', $hapus)->delete('savecoin', ["exchange" => "Bleutrade"]);
        $this->db->insert_batch_ignore("savecoin", $bleutrade);
    }
    
    public function ins_hitbtc() {
        $json_hitbtc = json_decode(file_get_contents('https://api.hitbtc.com/api/1/public/symbols'), true);$hitbtc = [];$hapus = [];
        foreach ($json_hitbtc['symbols'] as $value) {
            $hapus[]=  hash("sha256", $value['commodity'].'0'."HitBTC");
            $hitbtc[] = array(
                'idcoin' => $value['commodity'],
                'lkkoin' => '0',
                'exchange' => "HitBTC",
                'link' => 'https://hitbtc.com/exchange/'.$value['commodity'].'-to-BTC'
            );
        }
//        print_r($hitbtc);
        $this->db->where_not_in('id', $hapus)->delete('savecoin', ["exchange" => "HitBTC"]);
        $this->db->insert_batch_ignore("savecoin", $hitbtc);
    }
    
    public function ins_liquiio() {
        $json_liquiio = json_decode(file_get_contents('https://api.liqui.io/api/3/info'), true);$liquiio = [];$hapus = [];
        foreach ($json_liquiio['pairs'] as $key => $value) {
            $hapus[]=  hash("sha256", explode("_", $key)[0].'0'."LiquiExchange");
            $liquiio[] = array(
                'idcoin' => explode("_", $key)[0],
                'lkkoin' => '0',
                'exchange' => "LiquiExchange",
                'link' => 'https://liqui.io/#/exchange/'.  strtoupper(explode("_", $key)[0]).'_BTC'
            );
        }
//        print_r($liquiio);
        $this->db->where_not_in('id', $hapus)->delete('savecoin', ["exchange" => "LiquiExchange"]);
        $this->db->insert_batch_ignore("savecoin", $liquiio);
    }
    
    public function ins_bittrex() {
        $json_bittrex = json_decode(file_get_contents('https://bittrex.com/api/v1.1/public/getcurrencies'), true);$bittrex = [];$hapus = [];
        foreach ($json_bittrex['result'] as $value) {
            if ($value['IsActive']===true) {
                $hapus[]=  hash("sha256", $value['Currency'].$value['CurrencyLong']."Bittrex");
                $bittrex[] = array(
                    'idcoin' => $value['Currency'],
                    'lkkoin' => $value['CurrencyLong'],
                    'exchange' => "Bittrex",
                    'link' => 'https://bittrex.com/Market/Index?MarketName=BTC-'.$value['Currency']
                );
            }
        }
//        print_r($bittrex);
        $this->db->where_not_in('id', $hapus)->delete('savecoin', ["exchange" => "Bittrex"]);
        $this->db->insert_batch_ignore("savecoin", $bittrex);
    }
    
    public function ins_poloniex() {
        $json_poloniex = json_decode(file_get_contents('https://poloniex.com/public?command=returnCurrencies'), true);$poloniex = [];$hapus = [];
        foreach ($json_poloniex as $key => $value) {
            if ($value['delisted']===0 && $value['disabled']===0 && $value['frozen']===0) {
                $hapus[]=  hash("sha256", $key.$value['name']."Poloniex");
                $poloniex[] = array(
                    'idcoin' => $key,
                    'lkkoin' => $value['name'],
                    'exchange' => "Poloniex",
                    'link' => 'https://poloniex.com/exchange#btc_'.strtolower($key)
                );
            }
        }
//        print_r($poloniex);
        $this->db->where_not_in('id', $hapus)->delete('savecoin', ["exchange" => "Poloniex"]);
        $this->db->insert_batch_ignore("savecoin", $poloniex);
    }
    
}

