<div class="row">
    <form action="poloniex?getcurrency=<?php echo $_GET['getcurrency']?>" method="post">
    <div class="panel panel-success">
        <div style="height: 60px" class="panel panel-heading">
            <a href="#" style="vertical-align: middle"><b>Tampilkan Hasil Progress dari <?php echo $namakoin?></b></a>
            <button class="btn btn-danger" type="submit" name="perbaharui"><b>Perbaharui</b></button>
        </div>
        <div class="panel-body" id="bodytabel">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="12">Jumlah Data</th>
                    </tr>
                    <tr>
                        <th colspan="3">1 Jam</th>
                        <th colspan="3">2 Jam</th>
                        <th colspan="3">3 Jam</th>
                        <th colspan="3">24 Jam</th>
                    </tr>
                    <tr>
                        <th>BUY</th><th>SELL</th><th>TOTAL</th><th>BUY</th><th>SELL</th><th>TOTAL</th><th>BUY</th><th>SELL</th><th>TOTAL</th><th>BUY</th><th>SELL</th><th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $arraytabel['1hb'][0] ?></td>
                        <td><?php echo $arraytabel['1hs'][0] ?></td>
                        <td><?php echo $arraytabel['1hs'][0]+$arraytabel['1hb'][0] ?></td>
                        <td><?php echo $arraytabel['2hb'][0] ?></td>
                        <td><?php echo $arraytabel['2hs'][0] ?></td>
                        <td><?php echo $arraytabel['2hs'][0]+$arraytabel['2hb'][0] ?></td>
                        <td><?php echo $arraytabel['3hb'][0] ?></td>
                        <td><?php echo $arraytabel['3hs'][0] ?></td>
                        <td><?php echo $arraytabel['3hs'][0]+$arraytabel['3hb'][0] ?></td>
                        <td><?php echo $arraytabel['24hb'][0] ?></td>
                        <td><?php echo $arraytabel['24hs'][0] ?></td>
                        <td><?php echo $arraytabel['24hs'][0]+$arraytabel['24hb'][0] ?></td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <br/>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="12">Jumlah Data</th>
                    </tr>
                    <tr>
                        <th colspan="3">5 Menit</th>
                        <th colspan="3">10 Menit</th>
                        <th colspan="3">20 Menit</th>
                        <th colspan="3">30 Menit</th>
                    </tr>
                    <tr>
                        <th>BUY</th><th>SELL</th><th>TOTAL</th><th>BUY</th><th>SELL</th><th>TOTAL</th><th>BUY</th><th>SELL</th><th>TOTAL</th><th>BUY</th><th>SELL</th><th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $arraytabel['5MENb'][0] ?></td>
                        <td><?php echo $arraytabel['5MENs'][0] ?></td>
                        <td><?php echo $arraytabel['5MENs'][0]+$arraytabel['5MENb'][0] ?></td>
                        <td><?php echo $arraytabel['10MENb'][0] ?></td>
                        <td><?php echo $arraytabel['10MENs'][0] ?></td>
                        <td><?php echo $arraytabel['10MENs'][0]+$arraytabel['10MENb'][0] ?></td>
                        <td><?php echo $arraytabel['20MENb'][0] ?></td>
                        <td><?php echo $arraytabel['20MENs'][0] ?></td>
                        <td><?php echo $arraytabel['20MENs'][0]+$arraytabel['20MENb'][0] ?></td>
                        <td><?php echo $arraytabel['30MENb'][0] ?></td>
                        <td><?php echo $arraytabel['30MENs'][0] ?></td>
                        <td><?php echo $arraytabel['30MENs'][0]+$arraytabel['30MENb'][0] ?></td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <br/>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="3">Data 1 Jam</th>
                        <th colspan="3">Data 2 Jam</th>
                        <th colspan="3">Data 3 Jam</th>
                        <th colspan="3">Data 24 Jam</th>
                    </tr>
                    <tr>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Keuntungan</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Keuntungan</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Keuntungan</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Keuntungan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $arraytabel['1hb'][1] ?></td>
                        <td><?php echo $arraytabel['1hs'][2] ?></td>
                        <td><?php echo (empty($arraytabel['1hs'][2])||empty($arraytabel['1hb'][1]))?"":round((($arraytabel['1hs'][2]-$arraytabel['1hb'][1])/$arraytabel['1hb'][1])*100,2) ?></td>
                        <td><?php echo $arraytabel['2hs'][1] ?></td>
                        <td><?php echo $arraytabel['2hs'][2] ?></td>
                        <td><?php echo (empty($arraytabel['2hs'][2])||empty($arraytabel['2hs'][1]))?"":round((($arraytabel['2hs'][2]-$arraytabel['2hs'][1])/$arraytabel['2hs'][1])*100,2) ?></td>
                        <td><?php echo $arraytabel['3hs'][1] ?></td>
                        <td><?php echo $arraytabel['3hs'][2] ?></td>
                        <td><?php echo (empty($arraytabel['3hs'][2])||empty($arraytabel['3hs'][1]))?"":round((($arraytabel['3hs'][2]-$arraytabel['3hs'][1])/$arraytabel['3hs'][1])*100,2) ?></td>
                        <td><?php echo $arraytabel['24hs'][1] ?></td>
                        <td><?php echo $arraytabel['24hs'][2] ?></td>
                        <td><?php echo (empty($arraytabel['24hs'][2])||empty($arraytabel['24hs'][1]))?"":round((($arraytabel['24hs'][2]-$arraytabel['24hs'][1])/$arraytabel['24hs'][1])*100,2) ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Lower</th>
                        <th>Higher</th>
                        <th>%%%</th>
                        <th>Lower</th>
                        <th>Higher</th>
                        <th>%%%</th>
                        <th>Lower</th>
                        <th>Higher</th>
                        <th>%%%</th>
                        <th>Lower</th>
                        <th>Higher</th>
                        <th>%%%</th>
                    </tr>
                </tfoot>
            </table>
            <br/>
            <br/>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="3">Data 1 Jam</th>
                        <th colspan="3">Data 2 Jam</th>
                        <th colspan="3">Data 3 Jam</th>
                        <th colspan="3">Data 24 Jam</th>
                    </tr>
                    <tr>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Kerugian</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Kerugian</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Kerugian</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Kerugian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $arraytabel['1hb'][2] ?></td>
                        <td><?php echo $arraytabel['1hs'][1] ?></td>
                        <td><?php echo (empty($arraytabel['1hb'][2])||empty($arraytabel['1hs'][1]))?"":round((($arraytabel['1hs'][1]-$arraytabel['1hb'][2])/$arraytabel['1hb'][2])*100,2) ?></td>
                        <td><?php echo $arraytabel['2hb'][2] ?></td>
                        <td><?php echo $arraytabel['2hs'][1] ?></td>
                        <td><?php echo (empty($arraytabel['2hb'][2])||empty($arraytabel['2hs'][1]))?"":round((($arraytabel['2hs'][1]-$arraytabel['2hb'][2])/$arraytabel['2hb'][2])*100,2) ?></td>
                        <td><?php echo $arraytabel['3hb'][2] ?></td>
                        <td><?php echo $arraytabel['3hs'][1] ?></td>
                        <td><?php echo (empty($arraytabel['3hs'][1])||empty($arraytabel['3hb'][2]))?"":round((($arraytabel['3hs'][1]-$arraytabel['3hb'][2])/$arraytabel['3hb'][2])*100,2) ?></td>
                        <td><?php echo $arraytabel['24hb'][2] ?></td>
                        <td><?php echo $arraytabel['24hs'][1] ?></td>
                        <td><?php echo (empty($arraytabel['24hs'][1])||empty($arraytabel['24hb'][2]))?"":round((($arraytabel['24hs'][1]-$arraytabel['24hb'][2])/$arraytabel['24hb'][2])*100,2) ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Higher</th>
                        <th>Lower</th>
                        <th>%%%</th>
                        <th>Higher</th>
                        <th>Lower</th>
                        <th>%%%</th>
                        <th>Higher</th>
                        <th>Lower</th>
                        <th>%%%</th>
                        <th>Higher</th>
                        <th>Lower</th>
                        <th>%%%</th>
                    </tr>
                </tfoot>
            </table>
            <br/>
            <br/>
            
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="3">Data 5 Menit</th>
                        <th colspan="3">Data 10 Menit</th>
                        <th colspan="3">Data 20 Menit</th>
                        <th colspan="3">Data 30 Menit</th>
                    </tr>
                    <tr>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Keuntungan</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Keuntungan</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Keuntungan</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Keuntungan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $arraytabel['5MENb'][1] ?></td>
                        <td><?php echo $arraytabel['5MENs'][2] ?></td>
                        <td><?php echo (empty($arraytabel['5MENs'][2])||empty($arraytabel['5MENb'][1]))?"":round((($arraytabel['5MENs'][2]-$arraytabel['5MENb'][1])/$arraytabel['5MENb'][1])*100,2) ?></td>
                        <td><?php echo $arraytabel['10MENb'][1] ?></td>
                        <td><?php echo $arraytabel['10MENs'][2] ?></td>
                        <td><?php echo (empty($arraytabel['10MENs'][2])||empty($arraytabel['10MENb'][1]))?"":round((($arraytabel['10MENs'][2]-$arraytabel['10MENb'][1])/$arraytabel['10MENb'][1])*100,2) ?></td>
                        <td><?php echo $arraytabel['20MENb'][1] ?></td>
                        <td><?php echo $arraytabel['20MENs'][2] ?></td>
                        <td><?php echo (empty($arraytabel['20MENs'][2])||empty($arraytabel['20MENb'][1]))?"":round((($arraytabel['20MENs'][2]-$arraytabel['20MENb'][1])/$arraytabel['20MENb'][1])*100,2) ?></td>
                        <td><?php echo $arraytabel['30MENb'][1] ?></td>
                        <td><?php echo $arraytabel['30MENs'][2] ?></td>
                        <td><?php echo (empty($arraytabel['30MENs'][2])||empty($arraytabel['30MENb'][1]))?"":round((($arraytabel['30MENs'][2]-$arraytabel['30MENb'][1])/$arraytabel['30MENb'][1])*100,2) ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Lower</th>
                        <th>Higher</th>
                        <th>%%%</th>
                        <th>Lower</th>
                        <th>Higher</th>
                        <th>%%%</th>
                        <th>Lower</th>
                        <th>Higher</th>
                        <th>%%%</th>
                        <th>Lower</th>
                        <th>Higher</th>
                        <th>%%%</th>
                    </tr>
                </tfoot>
            </table>
            <br/>
            <br/>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="3">Data 5 Menit</th>
                        <th colspan="3">Data 10 Menit</th>
                        <th colspan="3">Data 20 Menit</th>
                        <th colspan="3">Data 30 Menit</th>
                    </tr>
                    <tr>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Kerugian</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Kerugian</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Kerugian</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Kerugian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $arraytabel['5MENb'][2] ?></td>
                        <td><?php echo $arraytabel['5MENs'][1] ?></td>
                        <td><?php echo (empty($arraytabel['5MENb'][2])||empty($arraytabel['5MENs'][1]))?"":round((($arraytabel['5MENs'][1]-$arraytabel['5MENb'][2])/$arraytabel['5MENb'][2])*100,2) ?></td>
                        <td><?php echo $arraytabel['10MENb'][2] ?></td>
                        <td><?php echo $arraytabel['10MENs'][1] ?></td>
                        <td><?php echo (empty($arraytabel['10MENb'][2])||empty($arraytabel['10MENs'][1]))?"":round((($arraytabel['10MENs'][1]-$arraytabel['10MENb'][2])/$arraytabel['10MENb'][2])*100,2) ?></td>
                        <td><?php echo $arraytabel['20MENb'][2] ?></td>
                        <td><?php echo $arraytabel['20MENs'][1] ?></td>
                        <td><?php echo (empty($arraytabel['20MENs'][1])||empty($arraytabel['20MENb'][2]))?"":round((($arraytabel['20MENs'][1]-$arraytabel['20MENb'][2])/$arraytabel['20MENb'][2])*100,2) ?></td>
                        <td><?php echo $arraytabel['30MENb'][2] ?></td>
                        <td><?php echo $arraytabel['30MENs'][1] ?></td>
                        <td><?php echo (empty($arraytabel['30MENs'][1])||empty($arraytabel['30MENb'][2]))?"":round((($arraytabel['30MENs'][1]-$arraytabel['30MENb'][2])/$arraytabel['30MENb'][2])*100,2) ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Higher</th>
                        <th>Lower</th>
                        <th>%%%</th>
                        <th>Higher</th>
                        <th>Lower</th>
                        <th>%%%</th>
                        <th>Higher</th>
                        <th>Lower</th>
                        <th>%%%</th>
                        <th>Higher</th>
                        <th>Lower</th>
                        <th>%%%</th>
                    </tr>
                </tfoot>
            </table>
            <br/>
            <br/>
            
        </div>
    </div>
    </form>
</div>
