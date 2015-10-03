    function sComplain(o){
        // complaint Form
        var category = $('.check').parent().text();
        var objectId = $('#id_ob').val();
        var textt = $("#galoba").val();
        if(category=='Иное'){
        	if(textt==''){
        		$('#wrong-t').text('Поле обезательно для заполнения');
        		return false;
        	}
        }

        $.ajax({
        	url:"/item/complain",
        	type:'GET',
        	data:{category:category,textt:textt,objectId:objectId},
        	success: function(data){
        			dataJS=JSON.parse(data);
        			if(dataJS.no_complain==2){
        				$('#wrong-t').text('Жалобу могут оставить только авторизованные пользователи');
        				return false;
        			}
        			if(dataJS.no_complain==3){
        				$('#wrong-t').text('Ошибка, жалоба не может быть принята');
        				return false;
        			}
        			if(dataJS.no_complain==4){
        				$('#wrong-t').text('Вы жалобу уже оставляли');
        				return false;
        			}
        			$('#object-complaint').dialog('close');
        		},
        	error: function(html){
        		//
        		}
        	});
    }


// для метро от Яндекс
function map(lat,lng,idd,add){
	  var myMap = new ymaps.Map('map_canvas'+idd, {
		    // центр и коэффициент масштабирования однозначно
		    // определяют область картографирования
		    center: [lat, lng],
		    zoom: 16,
		    behaviors: ['ruler', 'scrollZoom','drag'],
		  });

      if(add==1){
    	  myMap.controls.add(
   			   new ymaps.control.ZoomControl()
   			);
		  myMap.controls
	      // Кнопка изменения масштаба
	      .add('zoomControl')
	      // Список типов карты
	      .add('typeSelector')
	      // Кнопка изменения масштаба - компактный вариант
	      // Расположим её справа
	      .add('smallZoomControl', { right: 5, top: 75 })
	      // Стандартный набор кнопок
	      .add('mapTools')    
	      //Линейка масштаба
	       .add(new ymaps.control.ScaleLine())
	       //Обзорная карта, с заданным типом
	       .add(new ymaps.control.MiniMap({
	          type: 'yandex#hybrid'
	      }));
      }

		
	  // Создание метки 
	var myPlacemark = new ymaps.Placemark([lat, lng],{},{preset: 'twirl#redIcon'});

	// Добавление метки на карту
	myMap.geoObjects.add(myPlacemark);	  
	  
    }

function selMetro(el,metro_id){
	if ($(el).hasClass('active')){
		$(el).removeClass('active')
	}else{
		$(el).addClass('active');
	}

}
function selDistrict(el,district_id){
	if ($(el).hasClass('act')){
		$(el).removeClass('act');
		$('#sp'+district_id).attr("style", "background-position: left top;");
	}else{
		$(el).addClass('act');
		$('#sp'+district_id).attr("style", "background-position: left bottom;");
	}
}

$(document).ready(function () {
	// для жалоб
	
	
	$('.inp').on('click',function(){
		$('.inp').each(function(){
			if ($(this).hasClass('check')){
				$(this).removeClass('check');
			}
		});
		$(this).addClass('check');
		if($('.check').parent().text()=='Иное'){
			$('#galoba').css('display','block');
		}else{
			$('#galoba').css('display','none');
		}
		$('#wrong-t').text('')
	})
	///
	


	// 7, 3, today, from ... to
	$('.radioss').on('click', function () {
		var id=$(this).attr('id');
		$('.radioss').each(function(){
			if ($(this).hasClass('acti')){
				$(this).removeClass('acti');
				$(this).find("input").removeAttr('checked');
			}
		});
		$('#'+id).addClass('acti');
		$('#'+id).find("input").attr('checked','checked');
	});

	
	// reset metro and district
	$('.reset').on('click', function () {
		$('.st-name').each(function(){
			if ($(this).hasClass('active')){
				$(this).removeClass('active');
			}
		});
		$('.dis').each(function(){
			if ($(this).hasClass('act')){
				$(this).removeClass('act');
				$(this).next().attr('style','background-position: left top;')
			}
		})
	})
	
	//select metro
	$('.send').on('click', function () {
		var met='';
		var dis='';
		var countMetro=0;
		$('.st-name').each(function(){
				if ($(this).hasClass('active')){
					var metroVal=$(this).attr('id');
					met=met+metroVal+','
					countMetro=countMetro+1;
				}
		});
		
		$('.dis').each(function(){
			if ($(this).hasClass('act')){
				var disVal=$(this).attr('id');
				dis=dis+disVal+','
			}
		});
		
		$('#metro-field').val(met);
		$('#dictrict-field').val(dis);
		
		if (countMetro > 0) {
            $('.choose-metro').text('Выбрано ' + countMetro + ' станций')
        } else {
            $('.choose-metro').text('Выбрать станции')

        }
		
		$('#metro').hide();
	});
	
	// close metro window
	$('.close').on('click', function () {
		$('#metro').hide();
	});
	
	
    // search items by filter
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
               // $('#main-page').attr("style", "height:0px; width:0px;");
                $('#main-page').empty();
                $('#howitworks').empty();
                $('#subscribe').empty();
            }
        })
        return false;
    });
    
    // show phone on click or complain
    $('#showphone').on('click', function(){
    	if($('#showphone').val()=='Пожаловаться'){
    		$('#object-complaint').dialog('open');
    		return
    	}else{
	    	var obectId=$('#obectId').val();
	    	var pasword=$('#pasword').val();
	    	$('.wrong-password').attr("style", "visibility: hidden !important");
	    	$.ajax({
	    		type:'post',
	    		url:'/item/showphone?obectId='+obectId+'&pasword='+pasword,
	    		success: function(data){
	    			 var dataJS = JSON.parse(data);
	    			 if (dataJS.status=='ok'){
	    				 $('.owner-phone').text('+7 '+dataJS.phone);
	    				 $('#showphone').val('Пожаловаться');
	    			 }else{
	    				 $('.wrong-password').attr("style", "visibility: visible !important");
	    				 $('.wrong-password').text(dataJS.status);
	    			 }
	    		}
	    		
	    	});
    	}
    });
    
    // show phone on enter
    $('#pasword').keypress(function (e) {
    	  if (e.which == 13) {
    	    	var obectId=$('#obectId').val();
    	    	var pasword=$('#pasword').val();
    	    	$('.wrong-password').attr("style", "visibility: hidden !important");
    	    	$.ajax({
    	    		type:'post',
    	    		url:'/item/showphone?obectId='+obectId+'&pasword='+pasword,
    	    		success: function(data){
    	    			 var dataJS = JSON.parse(data);
    	    			 if (dataJS.status=='ok'){
    	    				 $('.owner-phone').text('+7 '+dataJS.phone);
    	    			 }else{
    	    				 $('.wrong-password').attr("style", "visibility: visible !important");
    	    				 $('.wrong-password').text(dataJS.status);
    	    			 }
    	    		}
    	    		
    	    	});
    	  }
    });
    
    // old versiion ***********************************
    $('#mapspb a').on('click', function () {
        var name = $(this).attr('title');
        if($(this).hasClass("active")){
            $(this).removeClass("active")
        }else{
            $(this).addClass("active")
        }
        var metro = $('#select-metro').text();
        var metroArr = metro.split('x').map(function(e){return e.trim();});
        
        if (metroArr.indexOf(name) < 0) {
            metroArr.push(name);
            metroArr = cleanArray(metroArr);
            //console.log(metroArr)
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
    // old versiion *****************************************
    
    
    // old versiion *****************************************
    $('body').on('click', '.close-metro', function () {
        $(this).parent('span').remove();
        var metro = $('#select-metro').text();
        var metroVal = metro.split('x').map(function(e){return e.trim();});
        metroVal = cleanArray(metroVal).join(',');
        
        $('#metro-field').val(metroVal);
        if ($('.selected-metroes').length > 0) {
            $('.choose-metro').text('Выбрано ' + $('.selected-metroes').length + ' станций')
        } else {
            $('.choose-metro').text('Выбрать станции')

        }
    })

    $('.choose-metro').on('click', function () {
        $('#metro').show();
        $('.qq').addClass('popup-bg');
        return false;
    })
    $('.close-reveal-modal').on('click', function () {
        $('#metro').hide();
        return false;
    })
    // old versiion *****************************************

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

    
    if($('#flat').attr('checked','checked')){
    	$('#sel-flat').css('display','inline-block');
    	$('#sel-room').css('display','none');
    }
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

function selectRoomFlat(el) {
    $('[id=sel-room]').hide();
    $('[id=sel-flat]').hide();
    if ($(el).prop('checked')) {
        $('[data-type='+$(el).attr('id')+']').show()
    }
    
}

function cleanArray(actual){
  var newArray = new Array();
  for(var i = 0; i<actual.length; i++){
      if (actual[i]){
        newArray.push(actual[i]);
    }
  }
  return newArray;
}


