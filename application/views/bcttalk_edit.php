<div class="row">
    <form action="../bitcointalk" method="post">
    <div class="panel panel-success">
        <div style="height: 60px" class="panel panel-heading">
            <div class="pull-right">
                <button class="btn btn-danger" type="submit" name="editcontact"><b>UPDATE CONTACT THREAD</b></button>
            </div>
            
        </div>
        <div class="panel-body" id="bodytabel">
            <table class="table table-bordered">
                <tr>
                    <td style="text-align: left !important">Nama</td>
                    <td><input type="text" value="<?php echo $datatabel[0]->judul;?>" class="col-lg-12" disabled="true"/></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Website</td>
                    <td><input type="text" name="website_p" value="<?php echo $datatabel[0]->website;?>" class="col-lg-12" /></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Twitter</td>
                    <td><input type="text" name="twitter_p" value="<?php echo $datatabel[0]->twitter;?>" class="col-lg-12" /></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Facebook</td>
                    <td><input type="text" name="facebook_p" value="<?php echo $datatabel[0]->facebook;?>" class="col-lg-12" /></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Slack</td>
                    <td><input type="text" name="slack_p" value="<?php echo $datatabel[0]->slack;?>" class="col-lg-12" /></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Reddit</td>
                    <td><input type="text" name="reddit_p" value="<?php echo $datatabel[0]->reddit;?>" class="col-lg-12" /></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Forum</td>
                    <td><input type="text" name="forum_p" value="<?php echo $datatabel[0]->forum;?>" class="col-lg-12" /></td>
                </tr>
                <tr>
                    <td style="text-align: left !important">Github</td>
                    <td><input type="text" name="github_p" value="<?php echo $datatabel[0]->github;?>" class="col-lg-12" /></td>
                </tr>
            </table>
        </div>
    </div>
        <input type="hidden" name="id_p" value="<?php echo urldecode($_GET['getlink']);?>"/>
    </form>
</div>