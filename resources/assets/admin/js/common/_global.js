import Helper from "./_function_helper";

var Global = {
    init: function () {
        this.loadActiveMenuSidebar()
        this.runSelect2()
        this.previewImage()
        this.deleteConfirm()
        this.runToken()
    },

    loadActiveMenuSidebar() {
        let $elementLink = $(".js-nav-link")
        $elementLink.each(function () {
            let $this = $(this)
            if ($this.hasClass('active')) {
                $this.parents('.js-nav-item').addClass('active menu-open')
                console.log('active')
            }
        })
    },

    runToken()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },

    runSelect2($element =  null) {
        if($element === null)
        {
            $element = $('.js-select2')
        }
        $element.select2({
            placeholder: 'Chọn dữ liệu'
        });
    },

    previewImage() {
        // preview  hình ảnh
        $(".js-upload").change(function () {
            let $this = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $this.parents('.block-images').find('img').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    },

    /**
     * Get param URL
     * @returns {boolean|string}
     */
    getUrlParameter() {
        let sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }

        return false;
    },

    /**
     * Check URL update
     * @returns {boolean}
     */
    checkUpdateForm() {
        let URL = window.location.href;
        let update = "update";
        if (URL.indexOf(update) !== -1) {
            return true
        }
        return false
    },

    deleteConfirm()
    {
        $("body").on("click",".js-delete", function (event){
            event.preventDefault()
            let $this = $(this)
            $.ajax({
                url: $this.attr('href'),
                beforeSend: function (xhr) {
                    Helper.showLoading()
                },
                method: "GET",
                success: function (results) {
                    $this.parents('tr').remove()
                    Helper.hideLoading()
                }
            });
        })
    }
}

export default Global
