/**
 * For delete any item.
 * @param setting
 * @param event
 */
$.fn.itemDelete = function (setting, event) {
    setting = $.extend({
        warningText: 'Something going wrong !',
        successText: 'Successfully deleted !'
    }, setting);

    $(this).on('click', function (e) {
        var that = $(this),
            url = that.attr('href');
        e.preventDefault();

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
        })
            .then((isConfirm) => {
                if (isConfirm.value){
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {_token: $('meta[name=csrf-token]').attr('content'), _method: 'DELETE'},
                        success: function (response) {
                            if (response.check){
                                that.parents('tr').remove();
                                swal({
                                    type: 'success',
                                    text: response.message !== undefined ? response.message : setting.successText,
                                    timer: 1000,
                                });
                            } else {
                                swal({
                                    type: 'warning',
                                    text: response.message !== undefined ? response.message : setting.warningText,
                                    timer: 3000
                                })
                            }
                        },
                        error: function (error) {
                            console.log(error)
                        }
                    });
                } else {
                    // If not confirm.
                }
            });
    });
};


$('.deletable').itemDelete();


$('.editable').on('click', function(e)  {
    window.scrollTo(0, 0);
    let that = $(this),
        url = that.attr('href');
    e.preventDefault();
    const item = that.data('item')
    $('.form-control').each((i, e) => {
        const name = $(e).attr('name');
        if(Object.keys(item).includes(name)) {
            $(e).val(item[name]);
        }
    })
    $('#header-title').html('Edit')
    $('#refForm').attr('action', url).append(` <input type="hidden" name="_method" value="patch"> `)
});
