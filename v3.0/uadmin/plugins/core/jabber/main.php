<?php
/*


Plugin name:Jabber Setting;

*/
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}








 ?>
<div class="container-fluid mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jabber settings</li>
        </ol>
    </nav>
</div>
<div class="container " style="margin-top: 70px">
    <form class="form1" onsubmit="save();return false">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Jabber</label>
                    <input type="email" class="form-control" name="jab" id="jab" ng-model="data.jab" value="<?php echo $from_jab_['jab'] ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="pass" id="pass" ng-model="data.pass" value="<?php echo $from_jab_['pass'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-right">
                    <button class="btn btn-outline-info">Save</button>
                    <a class="btn btn-outline-info" onclick="test()"> <i class="fa fa-repeat"></i> Test</a>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
function test() {
    bootbox.prompt('Enter Jabber', function(res) {
        if (res != null) {
            show_loader__()


            $.ajax({
                url: php_js.k_plugin.ajax_url + "&test_jab",
                dataType: "json",
                data: {
                    from_jab: $('#jab').val().trim(),
                    from_pass: $('#pass').val().trim(),
                    to_jab: res.trim()
                },
                success: function(res) {
                    hide_loader__()
                    notify(res.res)
                },
                error: function(err) {
                    hide_loader__()
                    error(err.responseText)
                }
            })


        }
    })

}





function save() {

    $.ajax({
        url: php_js.k_plugin.ajax_url + "&save_jab",
        dataType: "json",
        data: {
            from_jab: $('#jab').val().trim(),
            from_pass: $('#pass').val().trim()

        },
        success: function(res) {
            hide_loader__()
            notify(res.res)
        },
        error: function(err) {
            hide_loader__()
            error(err.responseText)
        }
    })
}
</script>