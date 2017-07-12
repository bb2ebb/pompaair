<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$no = 0;
?>
<html lang="en">
    <head>
        <title><?php $title ?></title><link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
        <title><?php $title ?></title><link rel="stylesheet" href="assets/css/datatables.min.css" type="text/css">
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables.min.js"></script>
        <style type="text/css">
            #bodytabel{
                height: 400px;
                overflow: hidden;
            }
            table>thead>tr>th,
            table>tbody>tr>td{
                table-layout: fixed;
                text-align: center !important;
                vertical-align:middle !important;
                font: bold 15px calibri, times new roman;
            }
        </style>
    </head>
    <body>

        <div class="row">
            <!-- +++++++++++++++++++++++++++++++++++++++++++++  DATABASE-->
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="https://bleutrade.com/">BLEUTRADE - <?php echo $bleutrade->num_rows(); ?> Currency Trade</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="bodytabel">
                        <table class="table table-bordered" id="bleutrade">
                            <thead>
                                <tr><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume</th><th>Volume Base</th></tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bleutrade->result() as $key_bleutrade => $value_bleutrade) {
                                    echo
                                    '<tr><td>' . $value_bleutrade->currency . '</td>'
                                    . '<td>' . $value_bleutrade->alias_currency . '</td>'
                                    . '<td>' . $value_bleutrade->base . '</td>'
                                    . '<td>' . $value_bleutrade->alias_base . '</td>'
                                    . '<td>' . $value_bleutrade->bid . '</td>'
                                    . '<td>' . $value_bleutrade->ask . '</td>'
                                    . '<td>' . $value_bleutrade->volume . '</td>'
                                    . '<td>' . $value_bleutrade->volume_base . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="http://yobit.net/">Yobit - <?php echo $yobit->num_rows(); ?> Currency Trade</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="bodytabel">
                        <table class="table table-bordered">
                            <thead>
                                <tr><th>Alt</th><th>Base</th><th>Bid</th><th>Ask</th><th>Vol BTC</th><th>Vol ALT</th></tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($yobit->result() as $key_yobit => $value_yobit) {
                                    echo
                                    '<tr><td>' . $value_yobit->currency . '</td><td>' . $value_yobit->base . '</td><td>' . $value_yobit->bid . '</td><td>' . $value_yobit->ask . '</td><td>' . $value_yobit->volume_btc . '</td><td>' . $value_yobit->volume_alt . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="http://vip.bitcoin.co.id/">VIP.BITCOIN.CO.ID - <?php echo $vipbtckoid->num_rows(); ?> Currency Trade</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="bodytabel">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Alt</th>
                                    <th>Base</th>
                                    <th>Bid</th>
                                    <th>Ask</th>
                                    <th>Vol BTC</th>
                                    <th>Vol ALT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($vipbtckoid->result() as $key_vipbtckoid => $value_vipbtckoid) {
                                    echo
                                    '<tr><td>' . $value_vipbtckoid->currency . '</td><td>' . $value_vipbtckoid->base . '</td><td>' . $value_vipbtckoid->bid . '</td><td>' . $value_vipbtckoid->ask . '</td><td>' . $value_vipbtckoid->volume_btc . '</td><td>' . $value_vipbtckoid->volume_alt . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="http://bittrex.com/">Bittrex - <?php echo $bittrex->num_rows(); ?> Currency Trade</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="bodytabel">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Aktif</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume BTC</th><th>Volume ALT</th><th>Vol Buy</th><th>Vol Sell</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bittrex->result() as $key_bittrex => $value_bittrex) {
                                    echo
                                    '<tr><td>' . (($value_bittrex->aktif) ? TRUE : FALSE) . '</td><td>' . $value_bittrex->currency . '</td><td>' . $value_bittrex->alias_currency . '</td><td>' . $value_bittrex->base . '</td><td>' . $value_bittrex->alias_base . '</td><td>' . $value_bittrex->bid . '</td><td>' . $value_bittrex->ask . '</td><td>' . $value_bittrex->volume_btc . '</td><td>' . $value_bittrex->volume_alt . '</td><td>' . $value_bittrex->openbuyorder . '</td><td>' . $value_bittrex->opensellorder . '</td></tr>';
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="http://c-cex.com/">C-CEX - <?php echo $ccex->num_rows(); ?> Currency Trade</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="bodytabel">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Aktif</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume BTC</th><th>Volume ALT</th><th>Vol Buy</th><th>Vol Sell</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($ccex->result() as $key_ccex => $value_ccex) {
                                    echo
                                    '<tr><td>' . (($value_ccex->aktif) ? 'true' : 'false') . '</td><td>' . $value_ccex->currency . '</td><td>' . $value_ccex->alias_currency . '</td><td>' . $value_ccex->base . '</td><td>' . $value_ccex->alias_base . '</td><td>' . $value_ccex->bid . '</td><td>' . $value_ccex->ask . '</td><td>' . $value_ccex->volume_btc . '</td><td>' . $value_ccex->volume_alt . '</td><td>' . $value_ccex->openbuyorder . '</td><td>' . $value_ccex->opensellorder . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="http://poloniex.com/">POLONIEX - <?php echo $poloniex->num_rows(); ?> Currency Trade</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="bodytabel">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Aktif</th><th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume BTC</th><th>Volume ALT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($poloniex->result() as $key_poloniex => $value_poloniex) {
                                    echo
                                    '<tr><td>' . (($value_poloniex->aktif) ? 'true' : 'false') . '</td><td>' . $value_poloniex->currency . '</td><td>' . $value_poloniex->alias_currency . '</td><td>' . $value_poloniex->base . '</td><td>' . $value_poloniex->alias_base . '</td><td>' . $value_poloniex->bid . '</td><td>' . $value_poloniex->ask . '</td><td>' . $value_poloniex->volume_btc . '</td><td>' . $value_poloniex->volume_alt . '</td>';
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="https://www.cryptopia.co.nz/">Cryptopia - <?php echo $cryptopia->num_rows(); ?> Currency Trade</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="bodytabel">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Alt</th><th>Alias</th><th>Base</th><th>Alias</th><th>Bid</th><th>Ask</th><th>Volume BTC</th><th>Volume ALT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cryptopia->result() as $key_cryptopia => $value_cryptopia) {
                                    echo
                                    '<tr>' .
                                    '<td>' . $value_cryptopia->currency . '</td>'
                                    . '<td>' . $value_cryptopia->alias_currency . '</td>'
                                    . '<td>' . $value_cryptopia->base . '</td>'
                                    . '<td>' . $value_cryptopia->alias_base . '</td>'
                                    . '<td>' . $value_cryptopia->bid . '</td>'
                                    . '<td>' . $value_cryptopia->ask . '</td>'
                                    . '<td>' . $value_cryptopia->volume_btc . '</td>'
                                    . '<td>' . $value_cryptopia->volume_alt . '</td>';
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a href="https://btc-e.com/">BTC-E - <?php echo $btce->num_rows(); ?> Currency Trade</a>
                    </div>
                    <div class="panel-body" id="bodytabel">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Alt</th><th>Base</th><th>Bid</th><th>Ask</th><th>Volume BTC</th><th>Volume ALT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($btce->result() as $value_btce) {
                                    echo
                                    '<tr>' .
                                    '<td>' . $value_btce->currency . '</td>'
                                    . '<td>' . $value_btce->base . '</td>'
                                    . '<td>' . $value_btce->bid . '</td>'
                                    . '<td>' . $value_btce->ask . '</td>'
                                    . '<td>' . $value_btce->volume_btc . '</td>'
                                    . '<td>' . $value_btce->volume_alt . '</td>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#bleutrade').dataTable({
                order: false,
                fixedHeaders:true,
                scrollX:true,
                scrollY:'100px',
                scrollCollapse: true,
                searching:false,
                paging: false,
                pageLength:false,
                pagingType:false,
                sInfo:false,
                sInfo:false,
                sInfo:false,
                sInfo:false,
            });
        </script>
    </body>
</html>