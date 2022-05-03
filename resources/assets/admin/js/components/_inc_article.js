import ProductPage from "./_inc_product";

var Article = {
    init:  function ()
    {
        this.searchArticleSelect();
        this.addArticleRelate()
    },
    addArticleRelate()
    {
        let _this = this;
        $('#add-article').off('click').click(function () {
            $(".js-select2-article").select2("destroy");

            let $rowMenu = $('.row-menu-temple').clone().removeClass('row-menu-temple');
            $rowMenu.find('.action-row-menu').removeClass('hide');

            $('#wrap-row-menu').append($rowMenu);

            let $elementSelect2Search = $rowMenu.find(".js-select2-article");
            if ($elementSelect2Search.length > 0)
            {
                _this.searchArticleSelect($elementSelect2Search)
            }
        })
    },
    searchArticleSelect($element = null)
    {
        console.log('--- init ')
        console.log('--- $element', $element)
        if (typeof URL_SEARCH_ARTICLE !== "undefined")
        {
            // if($element === null) $element = $("body .js-select2-article")
            $element = $("body .js-select2-article")

            $element.select2({
                placeholder: 'Select an item',
                ajax: {
                    url: URL_SEARCH_ARTICLE,
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.a_name,
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
}

export default Article
