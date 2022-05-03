var Acl = {
    init : function ()
    {
        this.activeChecked()
        this.loadPermission()
    },

    loadPermission()
    {
        if(typeof URL_LOAD_PERMISSION !== "undefined")
        {
            let orderID =  $("#role_id").val()
            $.ajax(URL_LOAD_PERMISSION, {
                method: "GET",
                cache: true,
                data : {
                    orderID : orderID
                },
                beforeSend: function(){

                },
                success: function (results) {
                    $("#load_permission").html(results.html)
                },
                error: function () {
                    console.log('Errors load article_content');
                }
            });
        }
    },

    activeChecked()
    {
        $("body").on("click",".iCheck-helper",function (event) {
            let $this = $(this);
            let parent = $this.parents('.icheckbox_flat-green');
            if (parent.hasClass('checked')) {
                parent.removeClass('checked');
            }else {
                parent.addClass('checked');
            }
        })
    }
}

export default Acl
