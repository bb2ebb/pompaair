<?php

class Exchanges extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        redirect(base_url('exchanges/bittrex'));
    }

    public function bittrex() {
//        $this->upd_excha_bittrex();
        $db = $this->db->order_by('openbuyorder', 'desc')->get_where('exc_bittrex', ['base'=>'BTC', 'alias_base'=>'Bitcoin']);
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
        $table = '<table class="table table-bordered"><thead><tr>'
                . '<th>ID Crypto</th>'
                . '<th>Aktif</th>'
                . '<th>Alt</th>'
                . '<th>Alias</th>'
                . '<th>Base</th>'
                . '<th>Alias</th>'
                . '<th>Bid</th>'
                . '<th>Ask</th>'
                . '<th>Volume ALT</th>'
                . '<th>Volume BTC</th>'
                . '<th>Vol Buy Order</th>'
                . '<th>Vol Sell Order</th>'
                . '<th>Date Input</th>'
                . '<th>Date Update</th>'
                . '<th>SH Buy 1 Hour</th>'
                . '<th>SH Sell 1 Hour</th>'
                . '<th>SH B.S 1 Hour</th>'
                . '<th>SH Buy 24 Hour</th>'
                . '<th>SH Sell 24 Hour</th>'
                . '<th>SH B.S 24 Hour</th>'
                . '</tr></thead><tbody>';
        foreach ($db->result() as $value_bittrex) {
            $de = "";
            if ($value_bittrex->status === "d") {
                $de = 'style="background-color: red"';
                $nilai = '<td>' . $value_bittrex->currency. '(dis-'.$value_bittrex->currency.')' . '</td>';
            } else {
                $de = "";
                $nilai = '<td>' . $value_bittrex->currency. '</td>';
            }
            $table .= '<tr '.$de.'><td>' . '<a href="'.$value_bittrex->link.'">'. $value_bittrex->id .'</a>' . '</td>'
                    . '<td>' . (($value_bittrex->aktif) ? TRUE : FALSE) . '</td>'
                    . $nilai
                    . '<td>' . $value_bittrex->alias_currency . '</td>'
                    . '<td>' . $value_bittrex->base . '</td>'
                    . '<td>' . $value_bittrex->alias_base . '</td>'
                    . '<td>' . $value_bittrex->bid . '</td>'
                    . '<td>' . $value_bittrex->ask . '</td>'
                    . '<td>' . $value_bittrex->volume_btc . '</td>'
                    . '<td>' . $value_bittrex->volume_alt . '</td>'
                    . '<td>' . $value_bittrex->openbuyorder . '</td>'
                    . '<td>' . $value_bittrex->opensellorder . '</td>'
                    . '<td>' . $value_bittrex->date_input . '</td>'
                    . '<td>' . $value_bittrex->date_update . '</td>'
                    . '<td>' . $value_bittrex->history_buy1jam . '</td>'
                    . '<td>' . $value_bittrex->totalhistory1jam . '</td>'
                    . '<td>' . $value_bittrex->totalhistory1jam . '</td>'
                    . '<td>' . $value_bittrex->history_buy24jam . '</td>'
                    . '<td>' . $value_bittrex->history_buy24jam . '</td>'
                    . '<td>' . $value_bittrex->totalhistory24jam . '</td></tr>';
        }
        $table .= '</tbody></table>';
        $data['title'] = 'Data Bittrex';
        $data['table_exchange'] = $table;
        $data['num'] = $db->num_rows();
        $data['url'] = 'http://bittrex.com/';
        $data['curr'] = 'Bittrex';
        $data['exch'] = 'exc_bittrex';

        $data['func'] = __FUNCTION__;
        $this->template->load('template/template_admin', 'editexchanges', $data);
    }

    public function poloniex() {
//        $this->upd_excha_poloniex();
        $db = $this->db->get_where('exc_poloniex', ['base'=>'BTC', 'alias_base'=>'Bitcoin']);
        $data['exch'] = 'exc_poloniex';
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
        
        $table = '<table class="table table-bordered"><thead><tr>'
                . '<th>ID Crypto</th>'
                . '<th>Aktif</th>'
                . '<th>Alt</th>'
                . '<th>Alias</th>'
                . '<th>Base</th>'
                . '<th>Alias</th>'
                . '<th>Bid</th>'
                . '<th>Ask</th>'
                . '<th>Volume BTC</th>'
                . '<th>Volume ALT</th>'
                . '<th>Date Input</th>'
                . '<th>Date Update</th>'
                . '<th>SH Buy 1 Hour</th>'
                . '<th>SH Sell 1 Hour</th>'
                . '<th>SH B.S 1 Hour</th>'
                . '<th>SH Buy 24 Hour</th>'
                . '<th>SH Sell 24 Hour</th>'
                . '<th>SH B.S 24 Hour</th>'
                . '</thead><tbody>';
        foreach ($db->result() as $value_poloniex) {
            $de = "";
            if ($value_poloniex->status === "d") {
                $de = 'style="background-color: red"';
                $nilai = '<td><a href="'.  base_url('tampildata/poloniex?getcurrency='.$value_poloniex->id).'">'. $value_poloniex->currency. '(dis-'.$value_poloniex->currency.')' . '</a></td>';
            } else {
                $de = "";
                $nilai = '<td><a href="'.  base_url('tampildata/poloniex?getcurrency='.$value_poloniex->id).'">'.$value_poloniex->currency.  '</a></td>';
            }
            $table .= '<tr '.$de.'>'
                    . '<td><a href="'.$value_poloniex->link.'">'. $value_poloniex->id .'</a>'. '</td>'
                    . '<td>' . (($value_poloniex->aktif) ? TRUE : FALSE) . '</td>'
                    . $nilai
                    . '<td>' . $value_poloniex->alias_currency . '</td>'
                    . '<td>' . $value_poloniex->base . '</td>'
                    . '<td>' . $value_poloniex->alias_base . '</td>'
                    . '<td>' . $value_poloniex->bid . '</td>'
                    . '<td>' . $value_poloniex->ask . '</td>'
                    . '<td>' . $value_poloniex->volume_btc . '</td>'
                    . '<td>' . $value_poloniex->volume_alt . '</td>'
                    . '<td>' . $value_poloniex->date_input . '</td>'
                    . '<td>' . $value_poloniex->date_update . '</td>'
                    . '<td>' . $value_poloniex->history_buy1jam . '</td>'
                    . '<td>' . $value_poloniex->totalhistory1jam . '</td>'
                    . '<td>' . $value_poloniex->totalhistory1jam . '</td>'
                    . '<td>' . $value_poloniex->history_buy24jam . '</td>'
                    . '<td>' . $value_poloniex->history_sell24jam . '</td>'
                    . '<td>' . $value_poloniex->totalhistory24jam . '</td></tr>';
        }
        $table .= '</tbody></table>';
        $data['title'] = 'Data Poloniex';
        $data['table_exchange'] = $table;
        $data['num'] = $db->num_rows();
        $data['url'] = 'http://poloniex.com/';
        $data['curr'] = 'Poloniex';
        $data['func'] = __FUNCTION__;
        $this->template->load('template/template_admin', 'editexchanges', $data);
    }

    public function vipbitcoinkoid() {
        $this->upd_excha_vipbtckoid();
        $db = $this->db->get('exc_vipbtckoid');
        $data['exch'] = 'exc_poloniex';
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
        $table = '<table class="table table-bordered"><thead><tr><th>ID Crypto</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume BTC</th><th>Volume ALT</th><th>Date Input</th><th>Date Update</th></tr></thead><tbody>';
        foreach ($db->result() as $value_vipbtckoid) {
            $table .= '<tr><td>' . '<a href="'.$value_vipbtckoid->link.'">'. $value_vipbtckoid->id .'</a>' . '</td><td>' . $value_vipbtckoid->currency . '</td><td>' . $value_vipbtckoid->alias_currency . '</td><td>' . $value_vipbtckoid->base . '</td><td>' . $value_vipbtckoid->alias_base . '</td><td>' . $value_vipbtckoid->bid . '</td><td>' . $value_vipbtckoid->ask . '</td><td>' . $value_vipbtckoid->volume_btc . '</td><td>' . $value_vipbtckoid->volume_alt . '</td><td>' . $value_vipbtckoid->date_input . '</td><td>' . $value_vipbtckoid->date_update . '</td></tr>';
        }
        $table .= '</tbody></table>';
        $data['title'] = 'Data vip.bitcoin.co.id';
        $data['table_exchange'] = $table;
        $data['num'] = $db->num_rows();
        $data['url'] = 'http://vip.bitcoin.co.id/';
        $data['curr'] = 'vipbitcoinkoid';
        $data['func'] = __FUNCTION__;
        $this->template->load('template/template_admin', 'editexchanges', $data);
    }

    public function ccex() {
        $this->upd_excha_ccex();
        $db = $this->db->get('exc_ccex');
        $data['exch'] = 'exc_ccex';
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
        $table = '<table class="table table-bordered"><thead><tr><th>ID Crypto</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume BTC</th><th>Date Update</th></tr></thead><tbody>';
        foreach ($db->result() as $value_ccex) {
            $table .= '<tr><td>'.'<a href="'.$value_ccex->link.'" target="_blank">' . $value_ccex->id . '</a></td><td>' . $value_ccex->currency . '</td><td>' . $value_ccex->alias_currency . '</td><td>' . $value_ccex->base . '</td><td>' . $value_ccex->alias_base . '</td><td>' . $value_ccex->bid . '</td><td>' . $value_ccex->ask . '</td><td>' . $value_ccex->volume_btc . '</td><td>' . $value_ccex->date_input . '</td><td>' . $value_ccex->date_update . '</td></tr>';
        }
        $table .= '</tbody></table>';
        $data['title'] = 'Data C-CEX';
        $data['table_exchange'] = $table;
        $data['num'] = $db->num_rows();
        $data['url'] = 'http://c-cex.com/';
        $data['curr'] = 'C-CEX';

        $data['func'] = __FUNCTION__;
        $this->template->load('template/template_admin', 'editexchanges', $data);
    }
    
    public function bleutrade() {
        $this->upd_excha_bleutrade();
        $db = $this->db->get('exc_bleutrade');
        $data['exch'] = 'exc_bleutrade';
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
        $table = '<table class="table table-bordered" id="bleutrade"><thead><tr><th>ID Crypto</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume</th><th>Volume Base</th><th>Date Input</th><th>Date Update</th></tr></thead><tbody>';
        foreach ($db->result() as $value_bleutrade) {
            $table .= '<tr><td>' . '<a href="'.$value_bleutrade->link.'">'. $value_bleutrade->id .'</a>' . '</td><td>' . $value_bleutrade->currency . '</td><td>' . $value_bleutrade->alias_currency . '</td><td>' . $value_bleutrade->base . '</td><td>' . $value_bleutrade->alias_base . '</td><td>' . $value_bleutrade->bid . '</td><td>' . $value_bleutrade->ask . '</td><td>' . $value_bleutrade->volume . '</td><td>' . $value_bleutrade->volume_base . '</td><td>' . $value_bleutrade->date_input . '</td><td>' . $value_bleutrade->date_update . '</td></tr>';
        }
        $table .= '</tbody></table>';
        $data['title'] = 'Data Bleutrade';
        $data['table_exchange'] = $table;
        $data['num'] = $db->num_rows();
        $data['url'] = 'https://bleutrade.com/';
        $data['curr'] = 'Bleutrade';
        $data['func'] = __FUNCTION__;
        $this->template->load('template/template_admin', 'editexchanges', $data);
    }

    public function yobit() {
        $this->upd_excha_yobit();
        $db = $this->db->get('exc_yobit');
        $data['exch'] = 'exc_yobit';
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
        $table = '<table class="table table-bordered" id="yobit"><thead><tr><th>ID Crypto</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume Base</th><th>Volume Alt</th><th>Date Input</th><th>Date Update</th></tr></thead><tbody>';
        foreach ($db->result() as $value_yobit) {
            $table .= '<tr><td>' . '<a href="'.$value_yobit->link.'">'. $value_yobit->id .'</a>' . '</td><td>' . $value_yobit->currency . '</td><td>' . $value_yobit->alias_currency . '</td><td>' . $value_yobit->base . '</td><td>' . $value_yobit->alias_base . '</td><td>' . $value_yobit->bid . '</td><td>' . $value_yobit->ask . '</td><td>' . $value_yobit->volume_btc . '</td><td>' . $value_yobit->volume_alt . '</td><td>' . $value_yobit->date_input . '</td><td>' . $value_yobit->date_update . '</td></tr>';
        }
        $table .= '</tbody></table>';
        $data['title'] = 'Data Yobit';
        $data['table_exchange'] = $table;
        $data['num'] = $db->num_rows();
        $data['url'] = 'https://yobit.net/';
        $data['curr'] = 'Yobit';
        $data['func'] = __FUNCTION__;
        $this->template->load('template/template_admin', 'editexchanges', $data);
    }

    public function btce() {
        $this->upd_excha_btce();
        $db = $this->db->get('exc_btce');
        $data['exch'] = 'exc_btce';
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
        $table = '<table class="table table-bordered"><thead><tr>
                 <th>ID Crypto</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume</th><th>Volume Base</th><th>Date Input</th><th>Date Update</th></tr></thead><tbody>';
        foreach ($db->result() as $value_btce) {
            $table .= '<tr><td>' . '<a href="'.$value_btce->link.'">'. $value_btce->id .'</a>' . '</td><td>' . $value_btce->currency . '</td><td>' . $value_btce->alias_currency . '</td><td>' . $value_btce->base . '</td><td>' . $value_btce->alias_base . '</td><td>' . $value_btce->bid . '</td><td>' . $value_btce->ask . '</td><td>' . $value_btce->volume_btc . '</td><td>' . $value_btce->volume_alt . '</td><td>' . $value_btce->date_input . '</td><td>' . $value_btce->date_update . '</td></tr>';
        }
        $table .= '</tbody></table>';
        $data['title'] = 'Data BTC-E';
        $data['table_exchange'] = $table;
        $data['num'] = $db->num_rows();
        $data['url'] = 'https://btc-e.com/';
        $data['curr'] = 'BTC-E';
        $data['func'] = __FUNCTION__;
        $this->template->load('template/template_admin', 'editexchanges', $data);
    }

    public function cryptopia() {
        $this->upd_excha_cryptopia();
        $db = $this->db->get('exc_cryptopia');
        $data['exch'] = 'exc_cryptopia';
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
        $table = '<table class="table table-bordered"><thead><tr>
                 <th>ID Crypto</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume</th><th>Volume Base</th><th>Date Input</th><th>Date Update</th></tr></thead><tbody>';
        foreach ($db->result() as $value_cryptopia) {
            $table .= '<tr><td>' . '<a href="'.$value_cryptopia->link.'">'. $value_cryptopia->id .'</a>' . '</td><td>' . $value_cryptopia->currency . '</td><td>' . $value_cryptopia->alias_currency . '</td><td>' . $value_cryptopia->base . '</td><td>' . $value_cryptopia->alias_base . '</td><td>' . $value_cryptopia->bid . '</td><td>' . $value_cryptopia->ask . '</td><td>' . $value_cryptopia->volume_btc . '</td><td>' . $value_cryptopia->volume_alt . '</td><td>' . $value_cryptopia->date_input . '</td><td>' . $value_cryptopia->date_update . '</td></tr>';
        }
        $table .= '</tbody></table>';
        $data['title'] = 'Data Cryptopia';
        $data['table_exchange'] = $table;
        $data['num'] = $db->num_rows();
        $data['url'] = 'https://www.cryptopia.co.nz/';
        $data['curr'] = 'Cryptopia';
        $data['func'] = __FUNCTION__;
        $this->template->load('template/template_admin', 'editexchanges', $data);
    }

    
    //          UPDATE BB2EBB

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
        $json_bittrex = json_decode(file_get_contents('https://bittrex.com/api/v1.1/public/getmarkets'), true);
        $json_bittrex_getmarketsummaries = json_decode(file_get_contents('https://bittrex.com/api/v1.1/public/getmarketsummaries'), true);
        $bittrex = [];
        foreach ($json_bittrex['result'] as $valuejson_bittrex) {
            $array_temp = $json_bittrex_getmarketsummaries['result'][array_search($valuejson_bittrex['MarketName'], array_column($json_bittrex_getmarketsummaries['result'], 'MarketName'))];
            $bittrex[] = array(
                'id' => $valuejson_bittrex['MarketName'],
                'bid' => strval(number_format($array_temp['Bid'], 8, '.', '')),
                'ask' => strval(number_format($array_temp['Ask'], 8, '.', '')),
                'volume_btc' => strval(number_format($array_temp['BaseVolume'], 8, '.', '')),
                'volume_alt' => strval(number_format($array_temp['Volume'], 8, '.', '')),
                'openbuyorder' => $array_temp['OpenBuyOrders'],
                'opensellorder' => $array_temp['OpenSellOrders'],
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
?>
