$(document).ready(function(){
    $('#search-submit').on('click', function(){
        var data = $(this).closest('form').serialize();
        $.ajax({
            type : 'get',
            url : '/catalog/search',
            data : data,
            success : function(data) {
                $('#search-results').html(data)
            }
        })
        return false;
    })
    
    $('#mapspb a').on('click',function(){
        var name = $(this).attr('title');
        $('#select-metro').append(" <span style='margin-left:5px;'>" + name + "<span class='close-metro' style='text-decoration:underline;color:red;cursor:pointer'> x </span>");
        var metro = $('#select-metro').text();
        var metroVal = metro.split('x').join(',');
        $('[name=metro]').val(metroVal)
        
        return false;
    })
    
    $('body').on('click','.close-metro',function(){
        $(this).parent('span').remove();
        var metro = $('#select-metro').text();
        var metroVal = metro.split('x').join(',');
        $('[name=metro]').val(metroVal)
    })
    
    $('.choose-metro').on('click',function(){
        $('#metro').show();
        return false;
    })
    $('.close-reveal-modal').on('click',function(){
        $('#metro').hide();
        return false;
    })
    
    $('body').on('click','#more-object', function () {
            var data = $('#search-form').serialize();
            var offset = $('[name=offsetNext]:last').val();
            $.ajax({
                type: 'get',
                url: '/catalog/search?offset='+offset,
                data: data,
                success: function (data) {
                    $('#search-results').append(data)
                }
            })
            $(this).remove();
            return false;
        })
    
})


