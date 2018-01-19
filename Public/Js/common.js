/**
 * Created with JetBrains PhpStorm.
 * User: kk
 * Date: 16-8-28
 * Time: 下午6:16
 */
function U() {
    var url = arguments[0] || [];
    var param = arguments[1] || {};
    var url_arr = url.split('/');

    if (!$.isArray(url_arr) || url_arr.length < 2 || url_arr.length > 3) {
        return '';
    }

    if (url_arr.length == 2)
        url_arr.unshift(_GROUP_);

    var pre_arr = ['g', 'm', 'a'];

    var arr = [];
    for (d in pre_arr)
        arr.push(pre_arr[d] + '=' + url_arr[d]);

    for (d in param)
        arr.push(d + '=' + param[d]);

    return _APP_+'?'+arr.join('&');
}


/****
 *
 */

$(function(){
	$('td .confirm-delete').click(function(){
		var url = $(this).attr('href');
        layer.confirm('确认要执行删除操作吗？',function(){
            $.ajax({
                type: "GET",
                url: url,
                success: function(message){
                    layer.msg(message,{time:2000},function(){
                        window.location.reload();
                    });
                }
            });
        });
        return false;
	});
});
