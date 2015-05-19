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
    
})


