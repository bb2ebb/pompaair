<div class="row ">
    <div class="panel panel-success">
        <div style="height: 60px" class="panel panel-heading">
            <a href="#" style="vertical-align: middle"><b>TAMPILKAN HASIL - Terdapat <?php echo $num ?> hasil</b></a>
            <div class="pull-right">
                <button class="btn btn-danger" type="submit" onclick="vTampil('0')"><b>Load Page</b></button>
                <button class="btn btn-danger" type="submit" onclick="vTampil('1')"><b>Load Page Continues</b></button>
            </div>
        </div>
        <div class="panel-body" id="bodytabel">
            <table class="table table-bordered">
                <thead>
                    <tr><th>Pair</th><th>Name 1</th><th>Name 2</th><th>Bid</th><th>Ask</th><th>% Keuntungan</th><th>Status</th><th>Exchanger</th></tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasil as $value) {
                        $de = "";
                        if ($value->status1==='d' || $value->status2==='d') {
                            $de = 'style="background-color: red"';
                        }
                        echo
                        '<tr '.$de.'><td>' . $value->id . '</td>'
                        . '<td>' . $value->exc1 . '</td>'
                        . '<td>' . $value->exc2 . '</td>'
                        . '<td>' . $value->bid . '</td>'
                        . '<td>' . $value->ask . '</td>'
                        . '<td>' . $value->kun . '</td>'
                        . '<td>' . $value->ud . '</td>'
                        . '<td>' .'<a href="'.$value->link1.'" target="_blank">'.$value->exch1.'</a> > <a href="'.$value->link2.'" target="_blank">' .$value->exch2. '</a></td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function vo(data, jenis) {
        url = window.location.href;
        post('<?php echo base_url('input/edit') ?>', {url: url, jenis: jenis, data: data, exch: '<?php echo isset($exch) ? $exch : "" ?>'})
    }
    function so() {
        url = window.location.href;
        window.open(url,"_SELF");
    }
    $('.table').dataTable({
        scrollY: "300px",
        paging: true
    });
    //setInterval(function(){so()}, 60000);
</script>

