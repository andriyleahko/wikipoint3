$(document).ready(function () {
    $('#search-submit').on('click', function () {
        $.fancybox.showActivity();
        var data = $(this).closest('form').serialize();
        $.ajax({
            type: 'get',
            url: '/catalog/search',
            data: data,
            success: function (data) {
                $('#search-results').html(data);
                $.fancybox.hideActivity();
            }
        })
        return false;
    })

    $('#mapspb a').on('click', function () {
        var name = $(this).attr('title');
        var metro = $('#select-metro').text();
        var metroArr = metro.split('x').map(function(e){return e.trim();});
        console.log(metroArr);
        if (metroArr.indexOf(name) < 0) {
            var metroVal = metroArr.join(',');
            $('#select-metro').append(" <span class='selected-metroes' style='display:block; margin-top:1px;margin-left:5px;'>" + name + "<span class='close-metro' style='color:red;cursor:pointer'> x </span>");

            $('#metro-field').val(metroVal);
            if ($('.selected-metroes').length > 0) {
                $('.choose-metro').text('Выбрано ' + $('.selected-metroes').length + ' станций')
            } else {
                $('.choose-metro').text('Выбрать станции')

            }
        }

        return false;
    })

    $('body').on('click', '.close-metro', function () {
        $(this).parent('span').remove();
        var metro = $('#select-metro').text();
        var metroVal = metro.split('x').join(',');
        $('#metro-field').val(metroVal);
        if ($('.selected-metroes').length > 0) {
            $('.choose-metro').text('Выбрано ' + $('.selected-metroes').length + ' станций')
        } else {
            $('.choose-metro').text('Выбрать станции')

        }
    })

    $('.choose-metro').on('click', function () {
        $('#metro').show();
        return false;
    })
    $('.close-reveal-modal').on('click', function () {
        $('#metro').hide();
        return false;
    })

    $('body').on('click', '#more-object', function () {
        $.fancybox.showActivity();
        var data = $('#search-form').serialize();
        var offset = $('[name=offsetNext]:last').val();
        $.ajax({
            type: 'get',
            url: '/catalog/search?offset=' + offset,
            data: data,
            success: function (data) {
                $('#search-results').append(data);
                $.fancybox.hideActivity();
            }
        })
        $(this).remove();
        return false;
    })

    initMetro();

})

function initMetro() {
    if ($('#metro-field').length) {
        var metro = $('#metro-field').val();
        var metroArr = metro.split(',');

        if (metroArr.length > 0) {

            $.each(metroArr, function (index, value) {
                if (value.trim() != '') {
                    $('#select-metro').append(" <span class='selected-metroes' style='display:block; margin-top:1px;margin-left:5px;'>" + value + "<span class='close-metro' style='color:red;cursor:pointer'> x </span>");
                }

            })

        }
    }
}


