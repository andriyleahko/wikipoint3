<html>
    <head>

        <meta charset="utf-8">
        <style>
            @import url(/css/style.css);
            @import url(/css/catalog.css);
            @import url(/css/search.css);

            #main-menu {overflow: hidden; margin-bottom: 30px;}
            #main-menu .logo {width: 200px; height: 60px; display: block; float: left; margin-right: 20px; background: url(/img/logo.jpg) no-repeat center center; background-size: 200px;}
            #main-menu .menu-option {font: 700 italic 24px/60px "PT Sans"; text-decoration: none; color: #4579A6; margin-right: 20px;}
            #main-menu .add-item {font: italic 18px/44px "PT Sans"; text-decoration: none; color: white; border-radius: 4px; display: block; padding-left: 50px; text-align: right; padding-right: 15px; float: right; background: url(/img/note.svg) no-repeat 15px center; background-color: #9B9B9B; margin-top: 8px;}
            #main-menu .add-item:hover {font: italic 18px/44px "PT Sans"; text-decoration: none; color: white; border-radius: 4px; display: block; padding-left: 50px; text-align: right; padding-right: 15px; float: right; background: url(/img/note.svg) no-repeat 15px center; background-color: #4579A6; margin-top: 8px;}
            body {
              /*  background: #99aec2 none repeat scroll 0 0;*/
            }
        </style>

        
        
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
        
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&language=ru"></script>
        <!-- <script type="text/javascript" -->
        <!--       src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDLPXMgcCP2NtQaJqvz0EwP6LxR4vsb1sY&sensor=TRUE&language=ru"> -->
        <!-- </script> -->

       
        <script type="text/javascript" src="/js/jquery.cycle.all.min.js"></script>
        <script type="text/javascript" src="/js/jquery.easing.1.1.1.js"></script>
        
        <script type="text/javascript" src="/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js"></script>
        <link rel="stylesheet" type="text/css" href="/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" />
        <script type="text/javascript" src="/js/jquery.fancybox-1.3.4/fancybox/jquery.easing-1.3.pack.js"></script>
        <script src="/js/jquery.cookie.js" ></script>
        
        <script type="text/javascript" src="/js/jquery.maskedinput.js" ></script>
        <script  type="text/javascript" src="/js/baza812.js"></script>
        
    </head>
    <body>
        <div class="wrapper">

            <div id="main-menu">
                <a class="logo" href="/"></a>
                <a class="menu-option" href="/howitworks/">Принцип работы</a>
                <a class="menu-option" href="">Документы</a>
                <a class="menu-option" href="/byAccess">Оплата</a>
                <a class="add-item" href="/add-item">Сообщить о квартире</a>
            </div>
<div id="main-search">
    <p>Я ищу</p>
    <form method="get" id="search-form">
        <fieldset class="room">
            <input type="checkbox" name="rooms-amount[]" value="7,8,9,10,11,12,13,14,15" id="r441">
            <label for="r441"><span>комнату</span></label>
        </fieldset>

        <p>квартиру</p>

        <fieldset class="rooms">
            <input type="checkbox" value="1" name="rooms-amount[]" id="r1">
            <label for="r1"><span>1 комн.</span></label>

            <input type="checkbox" value="2" name="rooms-amount[]" id="r2">
            <label for="r2"><span>2 комн.</span></label>

            <input type="checkbox" value="3" name="rooms-amount[]"  id="r3">
            <label for="r3"><span>3 комн.</span></label>

            <input type="checkbox" value="4,5,6" name="rooms-amount[]" id="r4">
            <label for="r4"><span>4 комн. и более</span></label>
            <?php /*<p style="color: #9B9B9B;">без агентов,</p>*/ ?>
            <p>без агентов,</p>
        </fieldset>

        <p>рядом с метро</p>
        <input type="hidden" id="metro-field" name="metro" value="">
        <input type="hidden" name="search" value="1">
        <a class="choose-metro" href="#">Выбрать станции</a>
        
        <p>по цене от </p>

        <select name="price_from">
            <option value="0" selected="selected">любой</option>
            <option value="15000">15.000 руб.</option>
            <option value="16000">16.000 руб.</option>
            <option value="17000">17.000 руб.</option>
            <option value="18000">18.000 руб.</option>
            <option value="19000">19.000 руб.</option>
            <option value="20000">20.000 руб.</option>
            <option value="21000">21.000 руб.</option>
            <option value="25000">25.000 руб.</option>
            <option value="28000">28.000 руб.</option>
            <option value="30000">30.000 руб.</option>
            <option value="33000">33.000 руб.</option>
            <option value="35000">35.000 руб.</option>
            <option value="40000">40.000 руб.</option>
            <option value="45000">45.000 руб.</option>
            <option value="50000">50.000 руб.</option>
        </select>

        <p>до</p>

        <select name="price_to">
            <option value="0" selected="selected">любой</option>
            <option value="20000">20.000 руб.</option>
            <option value="21000">21.000 руб.</option>
            <option value="25000">25.000 руб.</option>
            <option value="28000">28.000 руб.</option>
            <option value="30000">30.000 руб.</option>
            <option value="33000">33.000 руб.</option>
            <option value="35000">35.000 руб.</option>
            <option value="40000">40.000 руб.</option>
            <option value="45000">45.000 руб.</option>
            <option value="50000">50.000 руб.</option>
        </select>

        <input type="submit" id="search-submit" value="Искать">
    </form>
</div>
            <?php echo $content; ?>


        </div>
        <div class="reveal-modal" id="metro" style="heigth: 100%;">
            <span class="close-reveal-modal"></span>
            <?php /* <div style="position: relative">
              <div id="select-metro" style="padding-left: 10px; padding-right: 10px; position: absolute; font-size: 11px;">

              </div>
              </div> */ ?>
            <ul id="mapspb" style="margin-top: 50px; float: left">

                <li class="nsel" id="Komendantskiy"><a class="Komendantskiy" title="Комендантский проспект" href="#"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Starder"><a class="Starder" title="Старая деревня" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Krestovskiy"><a class="Krestovskiy" title="Крестовский Остров" href="#" ><span>&nbsp;</span></a></li>
                <li class="nsel" id="Chkalovskaya"><a class="Chkalovskaya" title="Чкаловская" href="#" ><span>&nbsp;</span></a></li>
                <li class="nsel" id="Sport"><a class="Sport" title="Спортивная" href="#"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Parnas"><a class="Parnas" title="Парнас" href="#" ><span>&nbsp;</span></a></li>
                <li class="nsel" id="Prosvesz"><a class="Prosvesz" title="Проспект Просвещения" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Ozerki"><a class="Ozerki" title="Озерки" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Ydalnaya"><a class="Ydalnaya" title="Удельная" href="#"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Pionerskaya"><a class="Pionerskaya" title="Пионерская" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Chornayareka"><a class="Chornayareka" title="Черная речка" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Petrohradskaya"><a class="Petrohradskaya" title="Петроградская" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Horkovskaya"><a class="Horkovskaya" title="Горьковская" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Nevskiy"><a class="Nevskiy" href="#" title="Невский проспект"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Hostinnui"><a class="Hostinnui" href="#" title="Гостиный двор"><span>&nbsp;</span></a></li>



                <li class="nsel" id="Franzenskaya"><a class="Franzenskaya" title="Фрунзенская" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Borovaya"><a class="Borovaya" title="Боровая" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Moskovskievorota"><a class="Moskovskievorota" href="#" title="Московские ворота"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Zavstavskaya"><a class="Zavstavskaya" href="#" title="Заставская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Bronevaya"><a class="Bronevaya" href="#" title="Броневая"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Elektrosila"><a class="Elektrosila" href="#" title="Электросила"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Parkpobedu"><a class="Parkpobedu" href="#" title="Парк Победы"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Moskovskaya"><a class="Moskovskaya" href="#" title="Московская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Zvezdnaya"><a class="Zvezdnaya" href="#" title="Звездная"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Kypchino"><a class="Kypchino" href="#" title="Купчино"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Deviatkino"><a class="Deviatkino" href="#" title="Девяткино"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Hrazsdan"><a class="Hrazsdan" href="#" title="Гражданский проспект"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Akadem"><a class="Akadem" href="#" title="Академическая"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Politeh"><a class="Politeh" href="#" title="Политехническая"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Myzh"><a class="Myzh" href="#" title="Площадь мужества"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Lesnaya"><a class="Lesnaya" href="#" title="Лесная"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Vuborh"><a class="Vuborh" href="#" title="Выборгская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Lenina"><a class="Lenina" href="#" title="Площадь Ленина"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Black"><a class="Black" href="#" title="Чернышевская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Vostaniya"><a class="Vostaniya" href="#" title="Площадь Восстания"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Mayakovska"><a class="Mayakovska" href="#" title="Мяковская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Obvodnui"><a class="Obvodnui" href="#" title="Обводный канал"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Obvodnui2"><a class="Obvodnui2" href="#" title="Обводный канал 2"><span>&nbsp;</span></a></li>			
                <li class="nsel" id="Volkovska"><a class="Volkovska" href="#" title="Волковская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Byharestska"><a class="Byharestska" href="#" title="Бухарестская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Mezhdynarod"><a class="Mezhdynarod" href="#" title="Международная"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Prospslavu"><a class="Prospslavu" href="#" title="Проспект Славы"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Dynaiska"><a class="Dynaiska" href="#" title="Дунайская"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Shyshru"><a class="Shyshru" href="#" title="Шушары"><span>&nbsp;</span></a></li>

                <li class="nsel" id="Lomonosov"><a class="Lomonosov" href="#" title="Ломоносовская"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Proletar"><a class="Proletar" href="#" title="Пролетарская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Obyhovo"><a class="Obyhovo" href="#" title="Обухово"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Ribackoe"><a class="Ribackoe" href="#" title="Рыбацкое"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Newcherkas"><a class="Newcherkas" href="#" title="Новочеркаская"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Ladozhska"><a class="Ladozhska" href="#" title="Ладожская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Prbolshevik"><a class="Prbolshevik" href="#" title="Проспект Большевиков"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Dubenko"><a class="Dubenko" href="#" title="Улица Дыбенко"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Nevskii1"><a class="Nevskii1" href="#" title="Площадь Александра Невского"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Nevskii2"><a class="Nevskii2" href="#" title="Площадь Александра Невского 2"><span>&nbsp;</span></a></li>

                <li class="nsel" id="Pyshkinska"><a class="Pyshkinska" href="#" title="Пушкинская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Zvinigorodska"><a class="Zvinigorodska" href="#" title="Звенигорадская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Vasileostrovska"><a class="Vasileostrovska" href="#" title="Василеостровская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Primorska"><a class="Primorska" href="#" title="Приморская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Admiralterska"><a class="Admiralterska" href="#" title="Адмиралтейская"><span>&nbsp;</span></a></li>	
                <li class="nsel" id="Senna"><a class="Senna" href="#" title="Сенная площадь"><span>&nbsp;</span></a></li>	
                <li class="nsel" id="Spaskaya"><a class="Spaskaya" href="#" title="Спасская"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Sadova"><a class="Sadova" href="#" title="Садовая"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Teatralna"><a class="Teatralna" href="#" title="Театральная"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Tehnology1"><a class="Tehnology1" href="#" title="Технологический институт"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Tehnology2"><a class="Tehnology2" href="#" title="Технологический институт 2"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Baltiska"><a class="Baltiska" href="#" title="Балтийская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Narvska"><a class="Narvska" href="#" title="Нарвская"><span>&nbsp;</span></a></li>	
                <li class="nsel" id="Kirovsky"><a class="Kirovsky" href="#" title="Кировский завод"><span>&nbsp;</span></a></li>

                <li class="nsel" id="Putilovskaya"><a class="Putilovskaya" href="#" title="Путиловская"><span>&nbsp;</span></a></li>

                <li class="nsel" id="Ugozapadnaya"><a class="Ugozapadnaya" href="#" title="Юго-Западная"><span>&nbsp;</span></a></li>						
                <li class="nsel" id="Avtovo"><a class="Avtovo" href="#" title="Автово"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Leninsky"><a class="Leninsky" href="#" title="Ленинский проспект"><span>&nbsp;</span></a></li>	
                <li class="nsel" id="Veteranov"><a class="Veteranov" href="#" title="Проспект Ветеранов"><span>&nbsp;</span></a></li>					
            </ul>
            <div style="float: left; margin-left: 35px; margin-top: 25px;">
                <h4>Выбранные станции</h4>
                <div id="select-metro" style="padding-left: 10px; padding-right: 10px;  font-size: 14px; height: 500px; overflow-y: auto">

                </div>
                <div>
                    <button onclick="$('#metro').hide();
                        			
                            return false;" style="background: #4579A6;border: none; border-radius: 4px; color: white;  height: 44px;  font: 18px/30px 'PT Sans';  padding: 0px 20px 0px 20px;  margin-top: 8px;">
                        Выбрать
                    </button>
                    <button onclick="
                            $('.selected-metroes').remove();
                            $('#metro').hide();
                            if ($('.selected-metroes').length > 0) {
                                $('.choose-metro').text('Выбрано ' + $('.selected-metroes').length + ' станций')
                            } else {
                                $('.choose-metro').text('Выбрать станции')
                            }
                            return false;
                            " 
                            style="
                            background: #DEDEDE;
                            border: none; 
                            border-radius: 4px; 
                            color: white; 
                            height: 44px; 
                            font: 18px/30px 'PT Sans'; 
                            padding: 0px 20px 0px 20px;  
                            margin-top: 8px;
                            ">
                        Очистить
                    </button>
                </div>

            </div>
            <div style="clear:both"></div>
            <div class="rightrez2">
                <div class="inside">
                    <div class="stations">

                        <div class="clr"></div>
                    </div>

                    <div class="clr"></div>
                </div>
            </div>
        </div>
    </body>
</html>