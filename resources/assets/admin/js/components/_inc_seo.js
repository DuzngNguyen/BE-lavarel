import {_slug} from "../helpers/function";
import Global from "../common/_global";

var SEO = {
    init : function ()
    {
        this.showFormSeo()
        this.keypressInput()
    },

    showFormSeo()
    {
        $(".js-action-seo").click(function (event){
            event.preventDefault()
            $(".box-seo").toggleClass('hide')
        })
    },

    keypressInput()
    {
        $(".keypress-count").keyup(function (event){
            event.preventDefault()
            let $this = $(this)
            let value = $this.val()
            let slug = _slug(value)
            let elementSlug = $this.attr('data-slug')
            let elementTitleSeo = $this.attr('data-title-seo')
            let elementDescSeo = $this.attr('data-desc-seo')

            let $boxCountChar = $this.prev()
            if($boxCountChar.hasClass('char_counter'))
            {
                $boxCountChar.find(".current").text(value.length)
            }
            if(Global.checkUpdateForm() === false)
            {
                $(elementSlug).val(slug)
                $(elementTitleSeo).val(value)
                $(elementDescSeo).val(value)
                $(elementTitleSeo).text(value)
                $(elementSlug).text(slug)
            }
        })
    }
}

export default SEO
