
var search_advanced = {

    init: function () {
        this.registerEvent();
    },
    registerEvent: function () {
        var arr_data_price = checkBoxSearchOnLoad('price');
        var arr_data_brand = checkBoxSearchOnLoad('brand');
        $('.filter-price').click(function(event) {
            var str_value = $(this).val();
            if($(this).prop('checked')){
                arr_data_price.push(str_value);
            }else{
                arr_data_price = arr_data_price.filter(item => item !== str_value);
            }
            arr = arr_data_price.filter(item => item!= "");
            console.log(arr);
            replaceParameterUrl('price' , (arr.length > 0) ? arr.toString() : '')
            window.location.href = replaceParameterUrl('price' , (arr.length > 0) ? arr.toString() : '');
        });

        $('.filter-brand').click(function(event) {
            var str_value = $(this).val();
            if($(this).prop('checked')){
                arr_data_brand.push(str_value);
            }else{
                arr_data_brand = arr_data_brand.filter(item => item !== str_value);
            }
            arr = arr_data_brand.filter(item => item!= "");
            console.log(arr);
            window.location.href = replaceParameterUrl('brand' , (arr.length > 0) ? arr.toString() : '');
        });
    }
}




function getParameterUrl(url, name) {
    var url = window.location.href;
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),

    results = regex.exec(url);

    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(document).ready(function () {
    search_advanced.init();

});


function checkBoxSearchOnLoad(name){
    var url = window.location.href;
    if(url.search(name) > 0){
        var arr_price = getParameterUrl(url , name);
        for (var item of arr_price.split(',')) {


            $('#filter-'+name+'-'+item).prop('checked', 'checked');
        }
        return arr_price.split(',');
    }
    return [];
}

function replaceParameterUrl(name , new_parameter = ''){
    var url = window.location.href;
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");

    var queryString = decodeURI(window.location.search);
    if(queryString){
        isFilter = true;
        $.urlParam = function(name){
            var results = new RegExp("[\\?&]" + name + "=([^&#]*)").exec(window.location.href);
            return results === null ? null : [results[0] , results[1]] ;
        }
         /// xóa parameter // set page về 0 khi người dùng muốn tìm kiếm :
        if($.urlParam('page') !== null){
            var page = $.urlParam('page');
            queryString = queryString.replace(page[0] , '');
        }


        var key = $.urlParam(name);
        if(key === null && new_parameter != ""){
            queryString += "&"+name+"="+new_parameter;
        }else {
            if(new_parameter === ''){
                queryString = queryString.replace(regex , '');
            }else{
                var parameter = key[0];
                parameter = parameter.replace(key[1] , new_parameter);
                queryString = queryString.replace(key[0], parameter);
            }
        }
        if(queryString.indexOf('&') === 0){
            queryString = "?"+ queryString.substr(1);
        }
        url = url.replace(window.location.search , queryString);
    }else{
        url = url + "?" + name + "=" + new_parameter;
    }
    console.log(url);
    return url;
}
