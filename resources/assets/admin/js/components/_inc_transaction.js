import Helper from "../common/_function_helper";
import Global from "../common/_global";
import ProductPage from "./_inc_product";
import Price from "./_inc_price";
import * as moment from './../../../library/bower_components/moment/moment'
import Swal from 'sweetalert2'

var Transaction = {
    totalActiveTransaction: 0,
    init: function () {
        this.showPopupAddTransaction()
        this.getUserSelect()
        this.getProductSelect()
        this.deleteTransactionItem()
        this.saveTransaction()
        this.renderFormUpdate()
        this.uploadFileZip()
        this.showItemOrder();
        this.runTimeSearch();
        this.clickIds()
        this.clickCheckAll()
        this.deleteTransaction()
    },

    deleteTransaction()
    {
        let _this = this;
        $("body").on("click",".js-delete-transactions", function (event){
            event.preventDefault()
            Swal.fire({
                title: 'Bạn có chắc chắn xoá đơn không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tôi đồng ý!'
            }).then((result) => {
                if (result.isConfirmed) {
                    _this.sendDeleteTransaction();
                }
            })
        })
    },
    sendDeleteTransaction()
    {
        let _this = this;
        let ids = _this.countActive()
        if ( ids.length === 0)
        {
            Swal.fire({
                icon: 'error',
                title: 'Không thể xoá dữ liệu...',
                text: 'Bạn phải chọn ít nhất 1 đơn hàng!',
            })
            return;
        }
        $.ajax({
            url: URL_DELETE_TRANSACTIONS,
            type: 'POST',
            beforeSend: function (xhr) {
                Helper.showLoading()
            },
            data: {
                ids:  ids
            },
            success: function (results) {
                console.log('------------ response: ', results)
                if (results.status === 200)
                {
                    Swal.fire(results.message)
                    _this.fetchTransaction()
                }else if(results.status === 403)
                {
                    Swal.fire(
                        '403',
                        'Bạn không có quyền sử dụng tính năng này!',
                        'question'
                    )
                }
                Helper.hideLoading()
            },
            error: function (response) {
                Helper.hideLoading()
                console.log('------------ response: ', response)
            }
        });
    },

    clickIds()
    {
        let _this = this;
        $("body").on("click",".js-ids", function (event){
            event.preventDefault()
            _this.triggerAction()
        })
    },
    triggerAction()
    {
        let _this = this;
        let ids = _this.countActive();
        if (ids.length > 0)
        {
            $(".js-action-transaction").removeClass('hide')
            $(".js-total-transaction").text(_this.totalActiveTransaction)
        }
    },
    countActive()
    {
        let _this = this
        var values=[];
        $('.js-ids').each(function () { //loop through each checkbox
            let $this = $(this)
            if ($this.hasClass("checked"))
            {
                values.push($this.find("input").val());
            }
        });
        _this.totalActiveTransaction++;
        return values;
    },

    clickCheckAll()
    {
        let _this = this;
        $("body").on("click",".js-check-all ", function (event){
            event.preventDefault()
            $('.js-ids').each(function () { //loop through each checkbox
                $(this).toggleClass('checked')
                $(this).find('input').prop('checked', !this.checked); //uncheck
            });
            _this.triggerAction()
        })
    },

    runTimeSearch()
    {
        $('#reservation').daterangepicker(
            {
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
        $('input[name="time"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
    },

    getUserSelect() {
        $("body").on("change", ".js-select-user", function () {
            let $this = $(this)
            let URL = $this.attr('data-url')
            let id = $this.val()

            if (URL && id) {
                $.ajax({
                    url: URL,
                    beforeSend: function (xhr) {
                        $("#user-info .spinner").show()
                        $("#js-user-info").html('')
                    },
                    method: "GET",
                    data: {id: id},
                    success: function (results) {
                        if (results.status === 200) {
                            $("#user-info .spinner").hide()
                            $("#js-user-info").html(results.html)
                            $("body input[name='t_name']").val(results.user.name)
                            $("body input[name='t_phone']").val(results.user.phone)
                            $("body input[name='t_address']").val(results.user.address)
                            $("body input[name='t_email']").val(results.user.email)
                        }
                    }
                });
            }
        })
    },

    fetchTransaction() {
        if (typeof URL_GET_TRANSACTION !== "undefined") {
            $.ajax({
                url: URL_GET_TRANSACTION,
                beforeSend: function (xhr) {
                    Helper.showLoading()
                },
                method: "GET",
                success: function (results) {
                    if (results.status === 200) {
                        $("#transaction_list").html(results.html)
                    }
                    Helper.hideLoading()
                }
            });
        }
    },


    deleteTransactionItem() {
        $("body").on("click", ".js-delete-cart", function (event) {
            event.preventDefault()
            let $this = $(this)
            $(this).parents('tr').remove()
            let idDelete = $this.attr('data-id')
            let ids = $("body .js-select-product").val()
            ids = ids.filter(function (item) {
                return item !== idDelete
            })
            let $elementSelect2Search = $("body  .js-product-search")
            if ($elementSelect2Search.length > 0) {
                $elementSelect2Search.val(ids).trigger('change')
            }
        })
    },

    saveTransaction() {
        let _this = this
        $("body").on("click", '.js-submit-save-transaction', function (event) {
            event.preventDefault()
            console.log("Save")
            let $form = $("#form-transaction");
            var formData = $form.serialize();
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: formData,
                success: function (results) {
                    $("body .js-close-modal").trigger('click')
                    _this.fetchTransaction()
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

    getProductSelect() {
        $("body").on("change", ".js-select-product", function () {
            let $this = $(this)
            let URL = $this.attr('data-url')
            let id = $this.val()
            if (URL && id) {
                $.ajax({
                    url: URL,
                    beforeSend: function (xhr) {
                        Helper.showLoading()
                    },
                    method: "GET",
                    data: {id: id},
                    success: function (results) {
                        if (results.status === 200) {
                            $("#product_info").html(results.html)
                        }
                        Helper.hideLoading()
                    }
                });
            }
        })
    },

    renderFormUpdate() {
        let _this = this
        $("body").on("click", ".js-update-transaction", function (event) {
            event.preventDefault()
            let $this = $(this)
            let URL = $this.attr('href')
            if (URL) {
                $.ajax({
                    url: URL,
                    beforeSend: function (xhr) {
                        Helper.showLoading()
                    },
                    method: "GET",
                    success: function (results) {
                        console.log(results)
                        if (results.status === 200) {
                            $('#box-append-html').html(results.html)
                            _this.targetShowPopup()
                            let $elementSelect2 = $("body .js-select2")

                            if ($elementSelect2.length > 0)
                                Global.runSelect2($elementSelect2)

                            let $elementSelect2Search = $("body  .js-product-search")
                            if ($elementSelect2Search.length > 0)
                                ProductPage.searchProductSelect($elementSelect2Search)

                            let $price  = $("body .js-money")
                            if ($price.length > 0)
                                Price.initRun($price)
                        }
                        Helper.hideLoading()
                    },
                    error: function (error) {
                        Helper.hideLoading()
                        console.log('============= Error: ', error)
                    }
                });
            }
        })
    },

    showPopupAddTransaction() {
        let _this = this
        $(".js-add-transaction").click(function (event) {
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
                        let $elementSelect2 = $("body .js-select2")

                        if ($elementSelect2.length > 0)
                            Global.runSelect2($elementSelect2)

                        let $elementSelect2Search = $("body  .js-product-search")
                        if ($elementSelect2Search.length > 0)
                            ProductPage.searchProductSelect($elementSelect2Search)

                        let $price  = $("body .js-money")
                        if ($price.length > 0)
                            Price.initRun($price)
                    }
                    Helper.hideLoading()
                }
            });
        })
    },

    targetShowPopup() {
        $("body .modal-add-transaction").modal({
            show: true
        })
    },

    showItemOrder()
    {
        $("body").on("click",".js-show-order-item", function (event){
            event.preventDefault()
            let $this = $(this)
            console.log('--- click')
            let classElement = $this.attr('data-id')
            let $span = $this.find("span");
            if ($span.hasClass('fa-angle-double-down'))
            {
                $span.addClass('fa-angle-double-right')
                $span.removeClass('fa-angle-double-down')
            }else {
                $span.addClass('fa-angle-double-down')
                $span.removeClass('fa-angle-double-right')
            }
            $(classElement).slideToggle();
        })
    },

    uploadFileZip() {
        $("body").on("change", ".js-files-transaction", function (event) {
            var files = $('#file')[0].files;
            var fd = new FormData();
            fd.append('file',files[0]);

            $.ajax({
                url: URL_UPLOAD_FILE,
                data: fd,
                dataType: 'json',
                async: false,
                type: 'post',
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#list-info-files").html(response.html);
                    console.log(response.html);
                },
            });
        })
    }

}

export default Transaction
