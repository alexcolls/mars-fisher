function del_all() {
    bootbox.confirm('swsw', function(res) {
        if (res) {
            show_loader__();
            $.ajax({
                url: php_js.k_plugin.ajax_url + '&del_all',
                dataType: "json",
                success: function(res) {
                    hide_loader__();

                    dataTable.ajax.reload();
                    notify(res.res)

                },
                error: function(err) {
                    hide_loader__();
                    error(err.responseText)
                }
            })
        }
    })

}