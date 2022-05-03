var Price = {
    init: function () {
        this.initRun()
        this.addComboPrice()
    },

    initRun($element = '') {

        let _this = this
        if($element === '') $element = $(".js-money")

        $element.on('input', function (e) {
            $(this).val(_this.formatCurrency(this.value.replace(/[,VNĐ]/g, '')));
        }).on('keypress', function (e) {
            if (!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
        }).on('paste', function (e) {
            var cb = e.originalEvent.clipboardData || window.clipboardData;
            if (!$.isNumeric(cb.getData('text'))) e.preventDefault();
        });

        $("#price-default").blur(function () {
            let $this = $(this)
            let price = $this.val()
            price = price.replace(/,/g, '')
            price = parseInt(price)
            price =  price / 2
            price =  price.toString()
            $("#price-default-children").val(_this.formatCurrency(price))
        });

    },

    formatCurrency(number) {
        let n = number.split('').reverse().join("");
        let n2 = n.replace(/\d\d\d(?!$)/g, "$&,");

        return n2.split('').reverse().join('');
    },

    addComboPrice() {
        let _this = this
        $("body").on('click', '.js-new-price', function (event) {
            event.preventDefault()
            let $this = $(this)
            let $boxPrice = $(".js-clone").clone().removeClass('js-clone')
            $("#box-price").append($boxPrice).append($this.clone())
            _this.initRun($boxPrice.find(".js-money"))
            $this.remove()

            console.log("OK ")
        })
    }

}

export default Price
