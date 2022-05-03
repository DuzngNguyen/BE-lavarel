var ScrollTop = {
    init : function ()
    {
        this.initRun()
        this.targetSubmitForm()
    },
    initRun()
    {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100)
            {
                $(".fix-top-submit").addClass('fix-top')
            }
            else
            {
                $(".fix-top-submit").removeClass('fix-top')
            }
        });

    },

    targetSubmitForm()
    {
        $(".js-submit-form").click(function (event){
            $(".target_submit").submit();
        })
    }
}

export default ScrollTop
