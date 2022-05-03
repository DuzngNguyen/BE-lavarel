var Module = {
    init : function () {
        $('.module-select2').select2({
            multiple: true,
            placeholder: 'Chọn Quyền'
        });

        $('#copy_menu').off('click').click(function () {
            let $rowMenu = $('.row-menu-temple').clone().removeClass('row-menu-temple');
            $rowMenu.find('.action-row-menu').removeClass('hide');
            $('#wrap-row-menu').append($rowMenu);
        })

        $('#wrap-row-menu').on('click', '.btn-remove', function () {
            let $this = $(this);
            if (confirm("Bạn có chắc chắn muốn xoá menu này?"))
            {
                $this.closest('.row-menu').remove();
            }
        })

        $('#wrap-row-menu').on('click', '.btn-move-up' ,function () {
            let $this = $(this);
            let $rowMenu  = $this.closest('.row-menu');
            let $rowMenuBefore = $rowMenu.prev();
            $rowMenu.after($rowMenuBefore);
        })

        $('#wrap-row-menu').on('click', '.btn-move-down', function () {
            let $this = $(this);
            let $rowMenu  = $this.closest('.row-menu');
            let $rowMenuBefore = $rowMenu.next();
            $rowMenu.before($rowMenuBefore);
        })
    }
};

export default Module;
