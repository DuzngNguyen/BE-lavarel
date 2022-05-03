import Helper from "../common/_function_helper";
var SettingEmail = {
    init: function () {
        this.showPopupEmail()
        this.saveSettingEmail()
    },

    showPopupEmail() {
        let _this = this
        $(".js-render-email").click(function (event) {
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

    saveSettingEmail() {
        $("body").on("click", '.js-submit-setting-email', function (event) {
            event.preventDefault()
            let $this = $(this)
            let $domForm = $this.closest('form');
            let URL = $("#form-setting-email").attr('action')
            $.ajax({
                url: URL,
                method: "POST",
                data: $domForm.serialize()
            }).done(function (results) {
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
        $("body .modal-setting-email").modal({
            show: true
        })
    }
}

export default SettingEmail
