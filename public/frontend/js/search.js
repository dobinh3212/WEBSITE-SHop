
var search = {
    init: function () {
        this.registerEvent();
    },
    registerEvent: function () {
        $("#search-product").keyup( function (e) {
            var str_search = $(this).val();
            if(str_search.length > 2){
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/search?query='+str_search+'&view=json',
                    type: 'GET',
                    dataType: 'json',
                    success:function(data){
                        var _html = '';
                        var results = JSON.parse(data['results']);

                        if(results.length > 0){
                            for (var item in results) {
                                if(item == 4){break;}
                                var obj = results[item];
                                _html += '<a class="clearfix" href="/chi-tiet-san-pham/'+ obj['slug'] +'" title="iPhone 13">';
                                _html +=     '<div class="img">';
                                _html +=         '<img src="' + obj['image'] + '" style="min-height:70px;"> ';
                                _html +=     '</div>';
                                _html +=     '<div class="d-title">'+ obj['name'] +'</div>';
                                _html +=     '<div class="d-title d-price">' + obj['sale'] + ' vnd</div>';
                                _html += '</a>';
                                _html += '<hr>'

                            }
                            _html += '<a href="/search?query='+str_search+'" class="note" title="Xem tất cả">Xem tất cả</a>'; 
                            
                        }else{
                            _html +='<p class="text-danger">Không tồn tại sản phẩm</p>';
                        }
                        $('.results-box').html(_html);
                        
                        $('.results-box').fadeIn();
                    },
                    error:function(){
                        $('.results-box').fadeOut();
                    }
                });
            }else{
                $('.results-box').fadeOut();
                
            }
        });
        $(document).on('click', 'body' ,function(){
            
            $('.results-box').fadeOut();
            
        });
    }
}

$(document).ready(function () {
    search.init();
});

