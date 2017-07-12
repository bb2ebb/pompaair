<div class="row">
    <form action="bitcointalk" method="post">
    <div class="panel panel-success">
        <div style="height: 60px" class="panel panel-heading">
            <a href="#" style="vertical-align: middle"><b>Jumlah Thread: <?php echo $totaldb." - ".$itungan." | ".($totaldb-$itungan) ?></b></a>
            <div class="pull-right">
                <button class="btn btn-primary" type="submit" name="hapusduplikat"><b>HAPUS DUPLIKAT</b></button>
            </div>
            <div class="pull-right">
                <button class="btn btn-primary" type="submit" name="cari"><b>Cari</b></button>
            </div>
            <div class="pull-right">
                <button class="btn btn-danger" type="submit" name="updatecount"><b>Update Count</b></button>
            </div>
            <br/><a href="#" style="vertical-align: middle"><b>Tanggal Update Thread: <?php echo $tanggalupdate ?></b></a>
        </div>
        <div class="panel-body" id="bodytabel">
            <table class="table table-bordered">
                <thead>
                    <tr><th>Judul</th>
                    <th>Action</th>
                    <th>Type</th>
                        <th>Tanggal Masuk</th></tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($hasil->result() as $value) {
                        $twitter = "Twitter";
                        $facebook = "Facebook";
                        $slack = "Slack";
                        $website = "Website";
                        $github = "Github";
                        $reddit = "Reddit";
                        $forums = "Forum";
                        if (empty($value->website) || $value->website ==="") $website = "Website"; else $website = '<a target="_blank" href="'.$value->website.'">Website OK</a>';
                        if (empty($value->twitter) || $value->twitter ==="") $twitter = "Twitter"; else $twitter = '<a target="_blank" href="'.$value->twitter.'">Twitter OK</a>';
                        if (empty($value->facebook) || $value->facebook ==="") $facebook = "Facebook"; else $facebook = '<a target="_blank" href="'.$value->facebook.'">Facebook OK</a>';
                        if (empty($value->slack) || $value->slack ==="") $slack = "Slack"; else $slack = '<a target="_blank" href="'.$value->slack.'">Slack OK</a>';
                        if (empty($value->github) || $value->github ==="") $github = "Github"; else $github = '<a target="_blank" href="'.$value->github.'">Github OK</a>';
                        if (empty($value->reddit) || $value->reddit ==="") $reddit = "Reddit"; else $reddit = '<a target="_blank" href="'.$value->reddit.'">Reddit OK</a>';
                        if (empty($value->forum) || $value->forum ==="") $forum = "Forum"; else $forum = '<a target="_blank" href="'.$value->forum.'">Forum OK</a>';
                        echo
                        '<tr><td><a target="_blank" href="'.$value->link.'">'.'<'.++$no.'> '. $value->judul . '</a></td>'
                        . '<td>'.$website." - ".$twitter." - ".$facebook." - ".$slack." - ".$reddit." - ".$forum." - ".$github.'</td>'
                        . '<td><a target="_blank" href=' .  base_url('bitcointalk/edit?getlink='.  urlencode($value->link)).'>'. $value->type . '</a></td>'
                        . '<td>' . $value->date_input . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        <input type="hidden" name="fieldcari"/>
    </form>
</div>
<?php echo isset($mp3)?$mp3:"" ?>
<script>
    $(function(){
        $('input[type="search"]').change(function(){
            $('input[name="fieldcari"]').val($('input[type="search"]').val());
        });
    });
</script>
<script>
    $('.table').dataTable({
//        order: false,
//        ordering: false,
        scrollX:true,
        scrollY:'630px'
    });
</script>
