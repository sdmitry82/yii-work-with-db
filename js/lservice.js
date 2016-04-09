/**
 * Created by dmitry on 09.04.2016.
 */

$(document).ready(function(){
    $('body').on('click','span.title',function(){

        $(this).parents('div.lservice_content').find('div.lsopened').hide();
        $(this).parents('div.block_item').find('div.block_labels').addClass('lsopened').show();

    });
});
