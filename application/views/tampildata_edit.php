<div class="row">
    <form action="../tampildata" method="post">
    <div class="panel panel-success">
        <div style="height: 60px" class="panel panel-heading">
            <div class="pull-right">
                <button class="btn btn-danger" type="submit" name="editthread"><b>UPDATE THREAD</b></button>
            </div>
            
        </div>
        <div class="panel-body" id="bodytabel">
            <table class="table table-bordered">
                <tr>
                    <td style="text-align: left !important">Nama Alt</td>
                    <td><input type="text" value="<?php echo $datatabel[0]->alias;?>" class="col-lg-12" disabled="true"/></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Ticker</td>
                    <td><input type="text" value="<?php echo $datatabel[0]->alt;?>" class="col-lg-12" disabled="true"/></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Thread</td>
                    <td><input type="text" name="thread_p" class="col-lg-12" /></td>
                </tr>
            </table>
        </div>
    </div>
        <input type="hidden" name="id_a" value="<?php echo $_GET['getalt'];?>"/>
        <input type="hidden" name="id_b" value="<?php echo $_GET['getcurr'];?>"/>
    </form>
</div>