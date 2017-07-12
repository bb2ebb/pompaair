<div class="row ">
    <div class="panel panel-success">
        <div  style="height: 60px" class="panel-heading">
            <?php echo '<a href="' . $url . '">' . $curr . ' - ' . $num . ' Jenis Currency Trade</a>' ?>
            
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body" id="bodytabel">
            <div class="col-sm-12 col-md-pull-0" style="padding-bottom: 20px">
                <div class="col-lg-5">
                    <label><strong>Edit Alt</strong></label><br/>
                    <textarea id="currency" rows="5" style="width: 100%"></textarea>
                </div>
                <div class="col-lg-5">
                    <label><strong>Edit Base</strong></label><br/>
                    <textarea id="base_currency" rows="5" style="width: 100%"></textarea>
                </div>

                <div class="col-lg-2">
                    <div class="col-md-12" style="padding-bottom: 30px;padding-top: 30px">
                        <button style="width: 100%" class="btn btn-success" type="button" onclick="vo($('#currency').val(), 'currency')"><strong>Edit Alt</strong></button>
                    </div>
                    <div class="col-md-12">
                        <button style="width: 100%" class="btn btn-primary" type="button" onclick="vo($('#base_currency').val(), 'base')"><strong>Edit Base</strong></button>
                    </div>
                </div>
            </div>
            <?php echo (isset($table_exchange)) ? $table_exchange : "" ?>
        </div>
    </div>
</div>
<script>
    $('table').dataTable({
//        order: false,
//        ordering: false,
        scrollX:true,
        scrollY:'500px'
    });
</script>
<script>
    function vo(data, jenis) {
        url = window.location.href;
        post('<?php echo base_url('input/edit') ?>', {url: url, jenis: jenis, data: data, exch: '<?php echo isset($exch) ? $exch : "" ?>'})
    }
    function so() {
        url = window.location.href;
        window.open(url,"_SELF");
    }
    
    //setInterval(function(){so()}, 60000);
</script>
