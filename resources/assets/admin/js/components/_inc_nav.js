import Helper from "../common/_function_helper";

var Nav = {
    elementListMenu : "#listMenu",
    init: function () {
        this.showNavBarAdmin()
        this.sortMenu()
        this.initSortable()
        this.loadNavs()
    },

    showNavBarAdmin() {
        $(".js-type-navbar").off('click').on('click', function () {
            let $this = $(this)
            let URL = $this.attr('data-url')
            $.ajax(URL, {
                method: "GET",
                cache: true,
                beforeSend: function () {

                },
                success: function (results) {
                    $("#dataType").html(results.html)
                },
                error: function () {
                    console.log('Errors load article_content');
                }
            });
        })
    },

    initSortable()
    {
        let $sortable =  $("#sortable");
        if(typeof $sortable !== "undefined")
        {
            $sortable.sortable();
            $sortable.disableSelection();
        }
    },

    loadNavs()
    {
        let _this = this
        if(typeof URL_LIST_NAV !== "undefined")
        {
            $.ajax(URL_LIST_NAV, {
                method: "GET",
                success: function (results) {
                    $(_this.elementListMenu).html(results.html)
                    Helper.hideLoading()
                },
                error: function () {
                    Helper.hideLoading()
                    console.log('Errors load article_content');
                }
            });
        }
    },

    sortMenu() {
        let _this = this
        $(".js-update-sort-nav").click(function (event) {
            event.preventDefault()
            let $this = $(this)
            let data = []
            $('.js-item-menu').each(function () {
                data.push($(this).attr('data-id'));
            })

            $.ajax(URL_UPDATE_SORT_NAV, {
                method: "GET",
                cache: true,
                dataType: 'text',
                beforeSend: function () {
                    Helper.showLoading()
                },
                data: {data: data.join('-')},
                success: function (results) {
                    let data =  JSON.parse(results)
                    if(typeof data.reload !== "undefined" && data.reload === true)
                    {
                        location.reload();
                    }else {
                        _this.loadNavs()
                    }

                },
                error: function () {
                    Helper.hideLoading()
                    console.log('Errors load article_content');
                }
            });
        })
    }
}

export default Nav
