$(document).ready(function(){
    $('#search-submit').on('click', function(){
        var data = $(this).closest('form').serialize();
        $.ajax({
            type : 'get',
            url : '/catalog/search',
            data : data,
            success : function(data) {
                $('#search-results').append(data)
            }
        })
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


