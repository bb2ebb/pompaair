<?php

class Input extends CI_Controller {
    public function __construct() {
        parent::__construct();
        ini_set('max_execution_time', 300);
        ini_set('memory_limit', '-1');
    }
    
    public function test() {
        echo date_timestamp_get(date_create('2016-09-06 11:24:21'))-18000;
    }
    public function insert_btce() {
        $this->excha_btce();
    }
    public function killrunningtaskmysql() {
        $this->db->query("SELECT CONCAT('KILL ',id,';') AS run_this FROM information_schema.processlist WHERE user='root' AND info = 'SELECT * FROM processlist'");
    }

    public function insert_bleutrade() {
        $this->excha_bleutrade();
    }

    public function insert_bittrex() {
        $this->db->insert_batch_ignore("exc_bittrex", $this->excha_bittrex()[1]);
    }
    
    public function d_bittrex() {
        $this->db->where_not_in('id', $this->excha_bittrex()[0])->update("exc_bittrex",["status"=>"d"]);
        echo 'sukses';
    }
    
    public function e_bittrex() {
        $this->db->where_in('id', $this->excha_bittrex()[0])->update("exc_bittrex",["status"=>"e"]);
        echo 'sukses';
    }
    
    public function upd1jambdb_bittrex() {
        $this->db->query("UPDATE exc_bittrex SET history_buy1jam=(SELECT COUNT(id) FROM bdb_bittrex WHERE type='buy' AND idcurrency=exc_bittrex.id  AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 9 HOUR)))");
        $this->db->query("UPDATE exc_bittrex SET history_sell1jam=(SELECT COUNT(id) FROM bdb_bittrex WHERE type='sell' AND idcurrency=exc_bittrex.id  AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 9 HOUR)))");
        echo 'sukses';
    }
    
    public function upd24jambdb_bittrex() {
        $this->db->query("UPDATE exc_bittrex SET history_buy1jam=(SELECT COUNT(id) FROM bdb_bittrex WHERE type='buy' AND idcurrency=exc_bittrex.id  AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 33 HOUR)))");
        $this->db->query("UPDATE exc_bittrex SET history_sell1jam=(SELECT COUNT(id) FROM bdb_bittrex WHERE type='sell' AND idcurrency=exc_bittrex.id  AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 33 HOUR)))");
        echo 'sukses';
    }
    
    public function insert_poloniex() {
        $this->db->insert_batch_ignore("exc_poloniex", $this->excha_poloniex()[1]);
        echo 'sukses';
    }
    
    public function d_poloniex() {
        $this->db->where_not_in('id', $this->excha_poloniex()[0])->update("exc_poloniex",["status"=>"d"]);
        echo 'sukses';
    }
    
    public function e_poloniex() {
        $this->db->where_in('id', $this->excha_poloniex()[0])->update("exc_poloniex",["status"=>"e"]);
        echo 'sukses';
    }
    
    public function upd1jambdb_poloniex() {
        $this->db->query("UPDATE exc_poloniex SET history_buy1jam=(SELECT COUNT(id) FROM bdb_poloniex WHERE type='buy' AND idcurrency=exc_poloniex.id  AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 9 HOUR)))");
        $this->db->query("UPDATE exc_poloniex SET history_sell1jam=(SELECT COUNT(id) FROM bdb_poloniex WHERE type='sell' AND idcurrency=exc_poloniex.id  AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 9 HOUR)))");
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js'
        ));
        $data['mp3'] = '<audio src="../assets/aby_hound.mp3" id="my_audio"></audio><script>$(document).ready(function() {$("#my_audio").get(0).play();});</script>';
        $data['resuts'] = 'DATA 1 JAM BERHASIL DIUPDATE';
        $this->template->load('template/template_admin', 'dadadat', $data);
    }
    
    public function upd24jambdb_poloniex() {
        $this->db->query("UPDATE exc_poloniex SET history_buy1jam=(SELECT COUNT(id) FROM bdb_poloniex WHERE type='buy' AND idcurrency=exc_poloniex.id  AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 33 HOUR)))");
        $this->db->query("UPDATE exc_poloniex SET history_sell1jam=(SELECT COUNT(id) FROM bdb_poloniex WHERE type='sell' AND idcurrency=exc_poloniex.id  AND date>=UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 33 HOUR)))");
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js'
        ));
        $data['mp3'] = '<audio src="../assets/aby_hound.mp3" id="my_audio"></audio><script>$(document).ready(function() {$("#my_audio").get(0).play();});</script>';
        $data['resuts'] = 'DATA 24 JAM BERHASIL DIUPDATE';
        $this->template->load('template/template_admin', 'dadadat', $data);
    }
    
    public function insert_vipbtckoid() {
        $this->excha_vipbtckoid();
    }

    public function insert_yobit() {
        $this->excha_yobit();
    }

    public function insert_cryptopia() {
        $this->excha_cryptopia();
    }

    public function insert_ccex() {
        $this->db->insert_batch_ignore("exc_ccex", $this->excha_ccex()[1]);
    }
    
    public function e_ccex() {
        $this->db->where_in('id', $this->excha_ccex()[0])->update("exc_ccex",["status"=>"e"]);
    }
    
    public function d_ccex() {
        $this->db->where_not_in('id', $this->excha_ccex()[0])->update("exc_ccex",["status"=>"d"]);
    }
    
    public function update_btce() {
        $this->upd_excha_btce();
    }

    public function update_bleutrade() {
        $this->upd_excha_bleutrade();
    }

    public function update_bittrex() {
        $this->upd_excha_bittrex();
    }

    public function update_poloniex() {
        $this->upd_excha_poloniex();
    }

    public function update_vipbtckoid() {
        $this->upd_excha_vipbtckoid();
    }

    public function update_yobit() {
        $this->upd_excha_yobit();
    }

    public function update_cryptopia() {
        $this->upd_excha_cryptopia();
    }

    public function update_ccex() {
        $this->upd_excha_ccex();
    }
    
    public function hapusdatabdb() {
        $this->db->query("DELETE FROM bdb_poloniex");
        $this->db->query("DELETE FROM bdb_bittrex");
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js'
        ));
        $data['mp3'] = '<audio src="../assets/aby_hound.mp3" id="my_audio"></audio><script>$(document).ready(function() {$("#my_audio").get(0).play();});</script>';
        $data['resuts'] = 'DATA BERHASIL DIHAPUS';
        $this->template->load('template/template_admin', 'dadadat', $data);
    }
    
    private function index() {
        $this->excha_bleutrade();
        $this->excha_bittrex();
        $this->excha_vipbtckoid();
        $this->excha_yobit();
        $this->excha_poloniex();
        $this->excha_cryptopia();
        $this->excha_btce();
        $this->excha_ccex();
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js'
        ));
        //$data['resuts'] = 'Penambahan data telah sukses';
        //$this->template->load('template/template_admin', 'dadadat', $data);
        header("location:tampildata" . $url);
    }

    public function edit() {
        $jenis = $this->input->post('jenis');
        $data = multiexplode([';', '-'], trim(preg_replace('/(<br\/>)+$/', '', $this->input->post('data')), " ;"));
        $url = $this->input->post('url');
        $exchange = $this->input->post('exch');
        $array = [];
        foreach ($data as $key => $value) {
            $array[$key] = array($jenis => trim($value[0], "\r\n"), 'alias_' . $jenis => $value[1]);
        }
        $this->db->update_batch_ignore($exchange, $array, $jenis);
        header("location:" . $url);
    }

    public function delete() {
        $sql = $this->db->query("CALL hapusdataexpiry('0')");
//        foreach ($sql->result() as $v) {
//            $this->db->truncate($v->ab);
//        }
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js'
        ));
        $data['resuts'] = 'Data telah sukses dihapus semua';
        $this->template->load('template/template_admin', 'dadadat', $data);
    }

    public function update() {
        $this->upd_excha_bleutrade();
        $this->upd_excha_bittrex();
        $this->upd_excha_vipbtckoid();
        $this->upd_excha_yobit();
        $this->upd_excha_poloniex();
        $this->upd_excha_cryptopia();
        $this->upd_excha_btce();
        $this->upd_excha_ccex();
        header("location:" . base_url("tampil/" . $ud));
    }
    
    public function poloniex() {
        error_reporting(0);
        $sql = $this->db->query("SELECT id,currency,alias_currency FROM exc_poloniex WHERE base='BTC' ORDER BY id ASC")->result();
        $day2 =$this->db->query("SELECT UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 32 HOUR)) AS tp1")->result()[0]->tp1;
        foreach ($sql as $value) {
            $json_poloniex = json_decode(file_get_contents('https://poloniex.com/public?command=returnTradeHistory&currencyPair='.$value->id.'&start='.$day2), true);
            $poloniex = [];
            foreach ($json_poloniex as  $valuejson_poloniex) {
                $poloniex[] = array(
                    "idcurrency" => $value->id,
                    "currency" => $value->currency,
                    "alias_currency" => $value->alias_currency,
                    "date" => date_timestamp_get(date_create($valuejson_poloniex['date']))-18000,
                    "type" => $valuejson_poloniex['type'],
                    "rate" => strval(number_format((double)$valuejson_poloniex['rate'], 8, '.', '')),
                    "amount" => strval(number_format((double)$valuejson_poloniex['amount'], 8, '.', '')),
                    "total" => strval(number_format((double)$valuejson_poloniex['total'], 8, '.', ''))
                );
            }
            $this->db->insert_batch_ignore("bdb_poloniex", $poloniex);
        }
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js'
        ));
        $data['mp3'] = '<audio src="../assets/aby_hound.mp3" id="my_audio"></audio><script>$(document).ready(function() {$("#my_audio").get(0).play();});</script>';
        $data['resuts'] = 'data poloniex telah sukses ditambahkan';
        $this->template->load('template/template_admin', 'dadadat', $data);
    }
    
    
    public function poloniex1jam() {
        $sql = $this->db->query("SELECT id,currency,alias_currency FROM exc_poloniex WHERE base='BTC' ORDER BY id ASC")->result();
        $day2 =$this->db->query("SELECT UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 10 HOUR)) AS tp1")->result()[0]->tp1;
        foreach ($sql as $value) {
            $json_poloniex = json_decode(file_get_contents('https://poloniex.com/public?command=returnTradeHistory&currencyPair='.$value->id.'&start='.$day2), true);
            $poloniex = [];
            foreach ($json_poloniex as  $valuejson_poloniex) {
                $poloniex[] = array(
                    'idcurrency' => $value->id,
                    'currency' => $value->currency,
                    'alias_currency' => $value->alias_currency,
                    'date' => date_timestamp_get(date_create($valuejson_poloniex['date']))-18000,
                    'type' => $valuejson_poloniex['type'],
                    'rate' => strval(number_format($valuejson_poloniex['rate'], 8, '.', '')),
                    'amount' => strval(number_format($valuejson_poloniex['amount'], 8, '.', '')),
                    'total' => strval(number_format($valuejson_poloniex['total'], 8, '.', ''))
                );
            }
            $this->db->insert_batch_ignore("bdb_poloniex", $poloniex);
        }
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js'
        ));
        $data['mp3'] = '<audio src="../assets/aby_hound.mp3" id="my_audio"></audio><script>$(document).ready(function() {$("#my_audio").get(0).play();});</script>';
        $data['resuts'] = 'data poloniex telah sukses ditambahkan';
        $this->template->load('template/template_admin', 'dadadat', $data);
    }
    
    public function bittrex() {
        $sql = $this->db->query("SELECT id,currency,alias_currency FROM exc_bittrex WHERE base='BTC' ORDER BY id ASC")->result();
        foreach ($sql as $value) {
            $json_bittrex = json_decode(file_get_contents('https://bittrex.com/api/v1.1/public/getmarkethistory?market='.$value->id), true)['result'];
            $bittrex = [];
            foreach ($json_bittrex as  $valuejson_bittrex) {
                $bittrex[] = array(
                    'idcurrency' => $value->id,
                    'currency' => $value->currency,
                    'alias_currency' => $value->alias_currency,
                    'date' => date_timestamp_get(date_create($valuejson_bittrex['TimeStamp']))-18000,
                    'type' => $valuejson_bittrex['OrderType'],
                    'rate' => strval(number_format($valuejson_bittrex['Price'], 8, '.', '')),
                    'amount' => strval(number_format($valuejson_bittrex['Quantity'], 8, '.', '')),
                    'total' => strval(number_format($valuejson_bittrex['Total'], 8, '.', ''))
                );
            }
            $this->db->insert_batch_ignore("bdb_bittrex", $bittrex);
        }
        $data['tambahan_cssjs'] = tambahan_attribut(array(
            base_url('assets/css/bootstrap.min.css') => 'css',
            base_url('assets/css/font-awesome.css') => 'css',
            base_url('assets/css/own.pageadmin.css') => 'css'
        ));
        $data['script'] = tambahan_attribut(array(
            base_url('assets/js/jquery.js') => 'js',
            base_url('assets/js/bootstrap.min.js') => 'js'
        ));
        $data['resuts'] = 'data bittrex telah sukses ditambahkan';
        $this->template->load('template/template_admin', 'dadadat', $data);
    }
    
    private function excha_bleutrade() {
        //************************** BLEUTRADE.COM
        $json_bleutrade = json_decode(file_get_contents('https://bleutrade.com/api/v2/public/getmarketsummaries'), true);
        $json_bleutrade_getmarketcurrecy = json_decode(file_get_contents('https://bleutrade.com/api/v2/public/getcurrencies'), true)['result'];
        $bleutrade = [];
        $id_bleutrade = [];
        foreach ($json_bleutrade['result'] as $keyjson_bleutrade => $valuejson_bleutrade) {
            $id_bleutrade[] = $valuejson_bleutrade['MarketName'];
            $bleutrade[] = array(
                'id' => $valuejson_bleutrade['MarketName'],
                'currency' => explode('_', $valuejson_bleutrade['MarketName'])[0],
                'alias_currency' => $json_bleutrade_getmarketcurrecy[array_search(explode('_', $valuejson_bleutrade['MarketName'])[0], array_column($json_bleutrade_getmarketcurrecy, 'Currency'))]['CurrencyLong'],
                'base' => explode('_', $valuejson_bleutrade['MarketName'])[1],
                'alias_base' => $json_bleutrade_getmarketcurrecy[array_search(explode('_', $valuejson_bleutrade['MarketName'])[1], array_column($json_bleutrade_getmarketcurrecy, 'Currency'))]['CurrencyLong'],
                'bid' => strval(number_format($valuejson_bleutrade['Bid'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_bleutrade['Ask'], 8, '.', '')),
                'volume' => strval(number_format($valuejson_bleutrade['Volume'], 8, '.', '')),
                'volume_base' => strval(number_format($valuejson_bleutrade['BaseVolume'], 8, '.', ''))
            );
        }
        $this->db->where_not_in('id', $id_bleutrade)->update("exc_bleutrade",["status"=>"d"]);
        $this->db->where_in('id', $id_bleutrade)->update("exc_bleutrade",["status"=>"e"]);
        $this->db->insert_batch_ignore("exc_bleutrade", $bleutrade);
    }

    private function excha_ccex() {
        $json_ccex = json_decode(file_get_contents('https://c-cex.com/t/api_pub.html?a=getmarkets'), true)['result'];
        $json_ccex_getmarketsummaries = json_decode(file_get_contents('https://c-cex.com/t/api_pub.html?a=getmarketsummaries'), true);
        $ccex = [];
        $id_ccex = [];
        foreach ($json_ccex_getmarketsummaries['result'] as $keyjson_ccex => $valuejson_ccex) {
            $id_ccex[] = $valuejson_ccex['MarketName'];
            $ccex[] = array(
                'id' => $valuejson_ccex['MarketName'],
                'currency' => explode('-', $valuejson_ccex['MarketName'])[0],
                'alias_currency' => $json_ccex[array_search($valuejson_ccex['MarketName'], array_column($json_ccex, 'MarketName'))]['MarketCurrencyLong'],
                'base' => explode('-', $valuejson_ccex['MarketName'])[1],
                'alias_base' => $json_ccex[array_search($valuejson_ccex['MarketName'], array_column($json_ccex, 'MarketName'))]['BaseCurrencyLong'],
                'bid' => strval(number_format($valuejson_ccex['Bid'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_ccex['Ask'], 8, '.', '')),
                'volume_btc' => strval(number_format($valuejson_ccex['BaseVolume'], 8, '.', ''))
            );
        }
        return [$id_ccex,$ccex];
    }

    private function excha_bittrex() {
        $json_bittrex = json_decode(file_get_contents('https://bittrex.com/api/v1.1/public/getmarkets'), true)['result'];
        $id_bittrex = [];
        foreach ($json_bittrex as $valuejson_bittrex) {
            $id_bittrex[] = $valuejson_bittrex['MarketName'];
            $bittrex[] = array(
                'id' => $valuejson_bittrex['MarketName'],
                'aktif' => (($valuejson_bittrex['IsActive']) ? TRUE : FALSE),
                'currency' => $valuejson_bittrex['MarketCurrency'],
                'alias_currency' => $valuejson_bittrex['MarketCurrencyLong'],
                'base' => $valuejson_bittrex['BaseCurrency'],
                'alias_base' => $valuejson_bittrex['BaseCurrencyLong']
            );
        }
        return [$id_bittrex,$bittrex];
    }

    private function excha_yobit() {
        $yobit = [];
        $id_yobit = [];
        $json_yobit = array_keys(json_decode(file_get_contents('https://yobit.net/api/3/info'), true)['pairs']);
        for ($i = 0; $i < ceil(count($json_yobit) / 50); $i++) {
            $json_yobit1 = json_decode(file_get_contents('https://yobit.net/api/3/ticker/' . implode('-', array_slice($json_yobit, $i * 50, 50)) . 'error_pair?ignore_invalid=1'), true);
            foreach ($json_yobit1 as $key_json_yobit1 => $value_json_yobit1) {
                $id_yobit[] = $key_json_yobit1;
                $yobit[$key_json_yobit1] = array(
                    'id' => $key_json_yobit1,
                    'currency' => explode('_', $key_json_yobit1)[0],
                    'base' => explode('_', $key_json_yobit1)[1],
                    'bid' => strval(number_format($value_json_yobit1['buy'], 8, '.', '')),
                    'ask' => strval(number_format($value_json_yobit1['sell'], 8, '.', '')),
                    'volume_btc' => strval(number_format($value_json_yobit1['vol'], 8, '.', '')),
                    'volume_alt' => strval(number_format($value_json_yobit1['vol_cur'], 8, '.', ''))
                );
            }
        }
        $this->db->where_not_in('id', $id_yobit)->update("exc_yobit",["status"=>"d"]);
        $this->db->where_in('id', $id_yobit)->update("exc_yobit",["status"=>"e"]);
        $this->db->insert_batch_ignore("exc_yobit", $yobit);
    }

    private function excha_poloniex() {
        $json_poloniex = json_decode(file_get_contents('https://poloniex.com/public?command=returnTicker'), true);
        $json_poloniex_getmarketsummaries = json_decode(file_get_contents('https://poloniex.com/public?command=returnCurrencies'), true);
        $poloniex = [];
        $id_poloniex = [];
        foreach ($json_poloniex as $keyjson_poloniex => $valuejson_poloniex) {
            $id_poloniex[] = $keyjson_poloniex;
            $poloniex[] = array(
                'id' => $keyjson_poloniex,
                'aktif' => !($json_poloniex_getmarketsummaries[explode('_', $keyjson_poloniex)[1]]['frozen'] === 1 ||
                $json_poloniex_getmarketsummaries[explode('_', $keyjson_poloniex)[1]]['delisted'] === 1 ||
                $json_poloniex_getmarketsummaries[explode('_', $keyjson_poloniex)[1]]['disabled'] === 1),
                'currency' => explode('_', $keyjson_poloniex)[1],
                'alias_currency' => $json_poloniex_getmarketsummaries[explode('_', $keyjson_poloniex)[1]]['name'],
                'base' => explode('_', $keyjson_poloniex)[0],
                'alias_base' => $json_poloniex_getmarketsummaries[explode('_', $keyjson_poloniex)[0]]['name'],
                'bid' => strval(number_format($valuejson_poloniex['highestBid'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_poloniex['lowestAsk'], 8, '.', '')),
                'volume_btc' => strval(number_format($valuejson_poloniex['baseVolume'], 8, '.', '')),
                'volume_alt' => strval(number_format($valuejson_poloniex['quoteVolume'], 8, '.', ''))
            );
        }
        return [$id_poloniex,$poloniex];
    }

    private function excha_vipbtckoid() {
        $json_vipbtckoid = json_decode(file_get_contents('https://vip.bitcoin.co.id/api/summaries'), true);
        $vipbtckoid = [];
        $id_vipbtckoid = [];
        foreach ($json_vipbtckoid['tickers'] as $keyjson_vipbtckoid => $valuejson_vipbtckoid) {
            $id_vipbtckoid[] = $keyjson_vipbtckoid;
            $vipbtckoid[] = array(
                'id' => $keyjson_vipbtckoid,
                'currency' => explode('_', $keyjson_vipbtckoid)[0],
                'base' => explode('_', $keyjson_vipbtckoid)[1],
                'bid' => strval(number_format($valuejson_vipbtckoid['buy'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_vipbtckoid['sell'], 8, '.', '')),
                'volume_btc' => strval(number_format($valuejson_vipbtckoid['vol_btc'], 8, '.', '')),
                'volume_alt' => strval(number_format($valuejson_vipbtckoid['vol_' . explode('_', $keyjson_vipbtckoid)[0]], 8, '.', ''))
            );
        }
        $this->db->where_not_in('id', $id_vipbtckoid)->update("exc_vipbtckoid",["status"=>"d"]);
        $this->db->where_in('id', $id_vipbtckoid)->update("exc_vipbtckoid",["status"=>"e"]);
        $this->db->insert_batch_ignore("exc_vipbtckoid", $vipbtckoid);
    }

    private function excha_cryptopia() {
        $json_cryptopia = json_decode(file_get_contents('https://www.cryptopia.co.nz/api/GetMarkets/'), true);
        $cryptopia_summary = json_decode(file_get_contents('https://www.cryptopia.co.nz/api/GetCurrencies/'), true);
        $cryptopia = [];
        $id_cryptopia = [];
        foreach ($json_cryptopia['Data'] as $keyjson_cryptopia => $valuejson_cryptopia) {
            $id_cryptopia[] = str_replace('/', '-', $valuejson_cryptopia['Label']);
            $cryptopia[] = array(
                'id' => str_replace('/', '-', $valuejson_cryptopia['Label']),
                'currency' => explode('/', $valuejson_cryptopia['Label'])[0],
                'alias_currency' => $cryptopia_summary['Data'][array_search(explode('/', $valuejson_cryptopia['Label'])[0], array_column($cryptopia_summary['Data'], 'Symbol'))]['Name'],
                'base' => explode('/', $valuejson_cryptopia['Label'])[1],
                'alias_base' => $cryptopia_summary['Data'][array_search(explode('/', $valuejson_cryptopia['Label'])[1], array_column($cryptopia_summary['Data'], 'Symbol'))]['Name'],
                'bid' => strval(number_format($valuejson_cryptopia['BidPrice'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_cryptopia['AskPrice'], 8, '.', ''))
            );
        }
        $this->db->where_not_in('id', $id_cryptopia)->update("exc_cryptopia",["status"=>"d"]);
        $this->db->where_in('id', $id_cryptopia)->update("exc_cryptopia",["status"=>"e"]);
        $this->db->insert_batch_ignore("exc_cryptopia", $cryptopia);
    }

    private function excha_btce() {
        $json_btce = json_decode(file_get_contents('https://btc-e.com/api/3/info'), true)['pairs'];
        $btce_summaries = json_decode(file_get_contents('https://btc-e.com/api/3/ticker/' . implode('-', array_keys($json_btce)) . '?ignore_invalid=1'), true);
        $btce = [];
        $id_btce = [];
        foreach ($btce_summaries as $keyjson_btce => $valuejson_btce) {
            $id_btce[] = $keyjson_btce;
            $btce[] = array(
                'id' => $keyjson_btce,
                'currency' => explode('_', $keyjson_btce)[0],
                'base' => explode('_', $keyjson_btce)[1],
                'bid' => strval(number_format($valuejson_btce['sell'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_btce['buy'], 8, '.', '')),
                'volume_btc' => strval(number_format($valuejson_btce['vol'], 8, '.', '')),
                'volume_alt' => strval(number_format($valuejson_btce['vol_cur'], 8, '.', ''))
            );
        }
        $this->db->where_not_in('id', $id_btce)->update("exc_btce",["status"=>"d"]);
        $this->db->where_in('id', $id_btce)->update("exc_btce",["status"=>"e"]);
        $this->db->insert_batch_ignore("exc_btce", $btce);
    }

//              UPDATE

    private function upd_excha_yobit() {
        $yobit = [];
        $json_yobit = array_keys(json_decode(file_get_contents('https://yobit.net/api/3/info'), true)['pairs']);
        for ($i = 0; $i < ceil(count($json_yobit) / 50); $i++) {
            $json_yobit1 = json_decode(file_get_contents('https://yobit.net/api/3/ticker/' . implode('-', array_slice($json_yobit, $i * 50, 50)) . 'error_pair?ignore_invalid=1'), true);
            foreach ($json_yobit1 as $key_json_yobit1 => $value_json_yobit1) {
                $yobit[$key_json_yobit1] = array(
                    'id' => $key_json_yobit1,
                    'bid' => strval(number_format($value_json_yobit1['buy'], 8, '.', '')),
                    'ask' => strval(number_format($value_json_yobit1['sell'], 8, '.', '')),
                    'volume_btc' => strval(number_format($value_json_yobit1['vol'], 8, '.', '')),
                    'volume_alt' => strval(number_format($value_json_yobit1['vol_cur'], 8, '.', ''))
                );
            }
        }
        return $this->db->update_batch_ignore("exc_yobit", $yobit, 'id');
    }

    private function upd_excha_vipbtckoid() {
        $json_vipbtckoid = json_decode(file_get_contents('https://vip.bitcoin.co.id/api/summaries'), true);
        $vipbtckoid = [];
        foreach ($json_vipbtckoid['tickers'] as $keyjson_vipbtckoid => $valuejson_vipbtckoid) {
            $vipbtckoid[] = array(
                'id' => $keyjson_vipbtckoid,
                'bid' => strval(number_format($valuejson_vipbtckoid['buy'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_vipbtckoid['sell'], 8, '.', '')),
                'volume_btc' => strval(number_format($valuejson_vipbtckoid['vol_btc'], 8, '.', '')),
                'volume_alt' => strval(number_format($valuejson_vipbtckoid['vol_' . explode('_', $keyjson_vipbtckoid)[0]], 8, '.', ''))
            );
        }
        return $this->db->update_batch_ignore("exc_vipbtckoid", $vipbtckoid, 'id');
    }

    private function upd_excha_bleutrade() {
        $json_bleutrade = json_decode(file_get_contents('https://bleutrade.com/api/v2/public/getmarketsummaries'), true);
        $bleutrade = [];
        foreach ($json_bleutrade['result'] as $keyjson_bleutrade => $valuejson_bleutrade) {
            $bleutrade[] = array('id' => $valuejson_bleutrade['MarketName'], 'bid' => strval(number_format($valuejson_bleutrade['Bid'], 8, '.', '')), 'ask' => strval(number_format($valuejson_bleutrade['Ask'], 8, '.', '')), 'volume' => strval(number_format($valuejson_bleutrade['Volume'], 8, '.', '')), 'volume_base' => strval(number_format($valuejson_bleutrade['BaseVolume'], 8, '.', ''))
            );
        }
        return $this->db->update_batch_ignore("exc_bleutrade", $bleutrade, 'id');
    }

    private function upd_excha_ccex() {
        $sql = $this->db->query("SELECT id,currency FROM exc_ccex WHERE base='BTC'")->result();
        $volbtc = json_decode(file_get_contents('https://c-cex.com/t/volume_btc.json'), true)['ticker'];
        $ccex = [];
        foreach ($sql as $value) {
            $json_ccex_getmarketsummaries = json_decode(file_get_contents('https://c-cex.com/t/'.  strtolower($value->currency).'-btc.json'), true)['ticker'];
            $ccex[] = array(
                'id' => $value->id,
                'bid' => strval(number_format($json_ccex_getmarketsummaries['buy'], 8, '.', '')),
                'ask' => strval(number_format($json_ccex_getmarketsummaries['sell'], 8, '.', '')),
                'volume_btc' => strval(number_format($volbtc[strtolower($value->currency)]['vol'], 8, '.', ''))
            );
        }
        return $this->db->update_batch_ignore("exc_ccex", $ccex, 'id');
    }

    private function upd_excha_bittrex() {
        $json_bittrex_getmarketsummaries = json_decode(file_get_contents('https://bittrex.com/api/v1.1/public/getmarketsummaries'), true);
        $bittrex = [];
        foreach ($json_bittrex_getmarketsummaries['result'] as $valuejson_bittrex) {
            $bittrex[] = array(
                'id' => $valuejson_bittrex['MarketName'],
                'bid' => strval(number_format($valuejson_bittrex['Bid'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_bittrex['Ask'], 8, '.', '')),
                'volume_btc' => strval(number_format($valuejson_bittrex['BaseVolume'], 8, '.', '')),
                'volume_alt' => strval(number_format($valuejson_bittrex['Volume'], 8, '.', '')),
                'openbuyorder' => $valuejson_bittrex['OpenBuyOrders'],
                'opensellorder' => $valuejson_bittrex['OpenSellOrders'],
            );
        }
        return $this->db->update_batch_ignore("exc_bittrex", $bittrex, 'id');
    }

    private function upd_excha_poloniex() {
        $json_poloniex = json_decode(file_get_contents('https://poloniex.com/public?command=returnTicker'), true);
        $poloniex = [];
        foreach ($json_poloniex as $keyjson_poloniex => $valuejson_poloniex) {
            $poloniex[] = array(
                'id' => $keyjson_poloniex,
                'bid' => strval(number_format($valuejson_poloniex['highestBid'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_poloniex['lowestAsk'], 8, '.', '')),
                'volume_btc' => strval(number_format($valuejson_poloniex['baseVolume'], 8, '.', '')),
                'volume_alt' => strval(number_format($valuejson_poloniex['quoteVolume'], 8, '.', ''))
            );
        }
        $this->db->update_batch_ignore("exc_poloniex", $poloniex, 'id');
    }

    private function upd_excha_cryptopia() {
        $json_cryptopia = json_decode(file_get_contents('https://www.cryptopia.co.nz/api/GetMarkets/'), true);
        $cryptopia = [];
        foreach ($json_cryptopia['Data'] as $keyjson_cryptopia => $valuejson_cryptopia) {
            $cryptopia[] = array(
                'id' => str_replace('/', '-', $valuejson_cryptopia['Label']),
                'bid' => strval(number_format($valuejson_cryptopia['BidPrice'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_cryptopia['AskPrice'], 8, '.', ''))
            );
        }
        $this->db->update_batch_ignore("exc_cryptopia", $cryptopia, 'id');
    }

    private function upd_excha_btce() {
        $json_btce = json_decode(file_get_contents('https://btc-e.com/api/3/info'), true)['pairs'];
        $btce_summaries = json_decode(file_get_contents('https://btc-e.com/api/3/ticker/' . implode('-', array_keys($json_btce)) . '?ignore_invalid=1'), true);
        $btce = [];
        foreach ($btce_summaries as $keyjson_btce => $valuejson_btce) {
            $btce[] = array(
                'id' => $keyjson_btce,
                'bid' => strval(number_format($valuejson_btce['sell'], 8, '.', '')),
                'ask' => strval(number_format($valuejson_btce['buy'], 8, '.', '')),
                'volume_btc' => strval(number_format($valuejson_btce['vol'], 8, '.', '')),
                'volume_alt' => strval(number_format($valuejson_btce['vol_cur'], 8, '.', ''))
            );
        }
        $this->db->update_batch_ignore("exc_btce", $btce, 'id');
    }

}
