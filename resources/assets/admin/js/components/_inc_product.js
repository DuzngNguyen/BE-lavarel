var ProductPage = {
    init : function ()
    {
        this.removeImage()
        this.deletePrice()
        this.searchProductSelect()
    },

    removeImage()
    {
        let _this = this
        $(".js-image-delete").click(function (event){
            event.preventDefault()
            let $this = $(this)
            let URL = $this.attr('href')
            $.ajax({
                url: URL,
                beforeSend: function (xhr) {
                    _this.showLoading()
                },
                method: "GET",
                success: function (results) {
                    console.log(results)
                    $this.parent().remove()
                    _this.hideLoading()
                }
            });
        })
    },

    deletePrice()
    {
        $("body").on("click",".js-delete-price", function (){
            let $this = $(this)
        })
    },

    searchProductSelect($element = null)
    {
        if (typeof URL_SEARCH_PRODUCT !== "undefined")
        {
            if($element === null) $element = $(".js-product-search")
            $element.select2({
                placeholder: 'Select an item',
                ajax: {
                    url: URL_SEARCH_PRODUCT,
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.pro_name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }
    },

    showLoading() {
        $("#box-loading").show()
    },

    hideLoading() {
        $("#box-loading").hide()
    },
}

export default ProductPage
