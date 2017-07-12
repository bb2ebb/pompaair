<div class="row">
    <form action="coin" method="post">
    <div class="panel panel-success">
        <div style="height: 60px" class="panel panel-heading">
            <div class="pull-right">
                <button class="btn btn-danger" type="submit" name="buttonmasukkancoin"><b>Masukkan</b></button>
            </div>
            <input name="masukkancoin" aria-controls="DataTables_Table_0" type="search" />
        </div>
        <div class="panel-body" id="bodytabel">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr><th>Koin yang disimpan</th><th>Nama Lengkap Koin</th><th>Exchanger yang tersedia</th><th>Keterangan</th></tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($koinygdisimpan->result() as $value) {
                        echo
                        '<tr><td>'. $value->coin . ' <a href="'.base_url("coin?hapus=".$value->coin).'">❰×❱</a></td>'
                                . '<td>'.$value->nmlengkap.'</td>'
                                . '<td>'.$value->exch.'</td>'
                                . '<td>'.$value->keterangan.'</td>'
                                . '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="panel-body" id="bodytabel">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr><th>Koin</th><th>Nama Koin</th><th>Exchanger</th>
                    <th>Tanggal Masuk</th></tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasil->result() as $value) {
                        echo
                        '<tr><td><a target="_blank" href="'.$value->link.'">'. $value->idcoin . '</a></td>'
                        . '<td>'.$value->lkkoin.'</td>'.'<td>'.$value->exchange.'</td>'
                        . '<td>' . $value->date_input . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </form>
</div>
<?php echo isset($mp3)?$mp3:"" ?>
<!--<script>
    $('.table').dataTable({
        "sScrollY": "0px",
    "fnDrawCallback": function() {
        var $dataTable = $table.dataTable();
        $dataTable.fnAdjustColumnSizing(false);

        // TableTools
        if (typeof(TableTools) != "undefined") {
            var tableTools = TableTools.fnGetInstance(table);
            if (tableTools != null && tableTools.fnResizeRequired()) {
                tableTools.fnResizeButtons();
            }
        }
        //
        var $dataTableWrapper = $table.closest(".dataTables_wrapper");
        var panelHeight = $dataTableWrapper.parent().height();

        var toolbarHeights = 0;
        $dataTableWrapper.find(".fg-toolbar").each(function(i, obj) {
            toolbarHeights = toolbarHeights + $(obj).height();
        });

        var scrollHeadHeight = $dataTableWrapper.find(".dataTables_scrollHead").height();
        var height = panelHeight - toolbarHeights - scrollHeadHeight;
        $dataTableWrapper.find(".dataTables_scrollBody").height(height - 24);

        $dataTable._fnScrollDraw();
    }
    });
</script>-->
<script>
    $('.table').dataTable({
//        order: false,
//        ordering: false,
//        width:auto,
        scrollX:true,
        scrollY:true
    });
</script>
