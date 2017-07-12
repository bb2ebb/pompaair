<div class="row">
    <form action="tampildata" method="post">
    <div class="panel panel-success">
        <div style="height: 60px" class="panel panel-heading">
            <a href="#" style="vertical-align: middle"><b>TAMPILKAN <?php echo $num?> HASIL  <?php echo "| ".$itunganexc ."-@".($num-$itunganexc) ?></b></a>
            <div class="pull-right">
                <button class="btn btn-primary" type="submit" name="updatecount"><b>Update Count</b></button>
                <button class="btn btn-danger" type="submit" name="buylebihbesardaripadasell1"><b>1 Jam Buy > Sell</b></button>
                <button class="btn btn-danger" type="submit" name="buylebihbesardaripadasell24"><b>24 Jam Buy > Sell</b></button>
                <button class="btn btn-danger" type="submit" name="buylebihbesardaripadasell241"><b>1&24 Jam Buy > Sell</b></button>
            </div>
            
        </div>
        <div class="panel-body" id="bodytabel">
            <table class="table table-bordered">
                <thead>
                    <tr><th>Pair</th>
                        <th>Alt</th>
                        <th>Alias</th>
                        <th>Bid</th>
                        <th>Ask</th>
                        <th>Vol BTC</th>
                        <th>Vol ALT</th>
                        <th>Date Input</th>
                        <th>Date Update</th>
                        <th>HBuy 1 Jam</th>
                        <th>HSell 1 jam</th>
                        <th>Sum HBS 1 Jam</th>
                        <th>HBuy 24 Jam</th>
                        <th>HSell 24 jam</th>
                        <th>Sum HBS 24 Jam</th>
                        <th>Action</th></tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasil as $value) {
                        $de = "";
                        $thread = "";
                        if ($value->status === "d") {
                            $de = 'style="background-color: red"';
                            if ($value->exch === "poloniex") 
                            $nilai = '<td><a href="'.  base_url('tampildata/poloniex?getcurrency='.$value->id).'">'. $value->alt. '(dis-'.$value->vstatus.')' . '</a></td>';
                            else $nilai = '<td>' . $value->alt. '(dis-'.$value->vstatus.')' . '</td>';
                        } else {
                            $de = "";
                            if ($value->exch === "poloniex") 
                            $nilai = '<td><a href="'.  base_url('tampildata/poloniex?getcurrency='.$value->id).'">'. $value->alt. '</a></td>';
                            else $nilai = '<td>' . $value->alt. '</td>';
                        }
                        if (!is_null($value->thread)) {
                            $thread=' - <a target="_blank" href="'.$value->thread.'">thread</a>';
                        }else{
                            $thread=' - <a target="_blank" href="'.  base_url("tampildata/edit?getalt=".$value->alt."&getcurr=".$value->alias).'">thread</a>';
                        }
                        echo
                        '<tr '.$de.'><td><a href="'.$value->link.'">'. $value->id . '</a></td>'
                        . $nilai
                        . '<td>' . $value->alias . '</td>'
                        . '<td>' . $value->bid . '</td>'
                        . '<td>' . $value->ask . '</td>'
                        . '<td>' . $value->vol_btc . '</td>'
                        . '<td>' . $value->vol_alt . '</td>'
                        . '<td>' . $value->input . '</td>'
                        . '<td>' . $value->upd . '</td>'
                        . '<td>' . $value->hbuy1 . '</td>'
                        . '<td>' . $value->hsell1 . '</td>'
                        . '<td>' . (($value->hbuy1)+($value->hsell1)) . '</td>'
                        . '<td>' . $value->hbuy24 . '</td>'
                        . '<td>' . $value->hsell24 . '</td>'
                        . '<td>' . (($value->hbuy24)+($value->hsell24)) . '</td>'
//                        . '<td>' .'<a href="'.$value->link.'">'. $value->exch . '</a>'.'</td></tr>';
                        . '<td>' .'<a target="_blank" href="'.$value->link.'">'. $value->exch . '</a>'.$thread.'</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </form>
</div>
<script>
    $('.table').dataTable({
//        order: false,
//        ordering: false,
        scrollX:true,
        scrollY:'300px'
    });
</script>
