import Helper from "../common/_function_helper";
var SettingGeneral = {
    init : function ()
    {
        this.renderPopupSettingGeneral()
        this.saveSettingGeneral()
    },

    renderPopupSettingGeneral()
    {
        let _this = this
        $(".js-setting-general").click( function (event){
            event.preventDefault()
            let $this = $(this)
            let URL = $this.attr('href')
            $.ajax({
                url: URL,
                beforeSend: function (xhr) {
                    Helper.showLoading()
                },
                method: "GET",
                success: function (results) {
                    if (results.status === 200) {

                        $('#box-append-html').html(results.html)
                        _this.targetShowPopup()
                    }
                    Helper.hideLoading()
                }
            });
        })
    },

    saveSettingGeneral() {
        $("body").on("click", '.js-submit-setting-general', function (event) {
            event.preventDefault()
            let $this = $(this)
            let $domForm = $this.closest('form');
            let URL = $("#form-setting-general").attr('action')
            $.ajax({
                url: URL,
                method: "POST",
                contentType: false,
                processData: false,
                data: $domForm.serialize()
            }).done(function (results) {
                console.log(results)
                let $alter = $(".js-alter")
                if (results.status === 200) {
                    $alter.removeClass('hidden')
                    setTimeout(function () {
                        $(".js-alter").addClass('hidden')
                    }, 3000)
                }
            }).fail(function (results) {

            });
        })
    },

    targetShowPopup() {
        $("body .modal-setting-general").modal({
            show: true
        })
    }
}

export default SettingGeneral
