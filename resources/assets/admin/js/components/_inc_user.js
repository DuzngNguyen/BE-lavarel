import Helper from "../common/_function_helper";

var  User = {
    init : function (){
        this.loadFormAdd()
        this.saveUser()
        this.closeModalUser();
    },

    closeModalUser()
    {
        $("body").on("click",".js-close-modal", function (event){
            console.log('- click')
            let $this = $(this)
            let action = $this.attr('data-action');
            if ( action && action === 'transaction') {
                $("body .js-add-transaction").trigger('click')
            }
        })
    },

    loadFormAdd()
    {
        $('body').on("click",".js-add-user", function (event){
            event.preventDefault();
            $("body .js-close-modal").trigger('click')
            $.ajax({
                url: URL_GET_FORM_ADD_USER,
                beforeSend: function (xhr) {
                    Helper.showLoading()
                },
                method: "GET",
                success: function (results) {

                    if (results.status === 200) {
                        $('#box-append-html').html(results.html)
                        // _this.targetShowPopup()
                        $("body .modal-add-user").modal({
                            show: true
                        })
                    }
                    Helper.hideLoading()
                }
            });
        })
    },

    saveUser() {
        let _this = this
        $("body").on("click", '.js-submit-save-user', function (event) {
            event.preventDefault()
            console.log("Save")
            let $form = $("#form-user");
            var formData = $form.serialize();
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: formData,
                success: function (results) {
                    console.log(results)
                    $("body .js-close-modal").trigger('click')
                },
                error: function (response) {
                    if (response.status === 422) {
                        $.each(response.responseJSON.errors, function (field_name, error) {
                            $(document).find('[name=' + field_name + ']').parent().after('<span class="text-error">' + error + '</span>')
                        })
                    }
                }
            });
        })
    },
}

export default User;
