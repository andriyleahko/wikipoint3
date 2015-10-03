<script>
$('#main-search').empty();
$('#main-search').attr('style','display:none');
</script>
<style>


    .activity {
        color: #5c80a4;
        float: left;
        width: 460px;
        margin-bottom: 60px;
        font-size: 15px;
        text-align: right;
         margin-right: 30px;
    }

    .activity span {
        color: black;
        font: 600 24px/30px "Fira Sans";
        display: block;
    }

    .reward {
        color: #4579A6;
        font: 36px/60px "Fira Sans";
        margin-bottom: 60px;
        width: 130px;
        float: left;
    }

    .reward .icon-key1 {
        width: 102px;
        height:111px;
        display: inline-block;
        background: url(img/icon-key1.png) no-repeat 0px center / 107px auto;
        margin-top: -26px;
    }
    .reward .icon-key2 {
        width: 105px;
        height:111px;
        display: inline-block;
        background: url(img/icon-key2.png) no-repeat 0px center / 110px auto;
        margin-top: -26px;
    }
    .reward .icon-key3 {
        width: 105px;
        height:111px;
        display: inline-block;
        background: url(img/icon-key3.png) no-repeat 0px center / 110px auto;
        margin-top: -26px;
    }
    .reward .icon-key4 {
        width: 105px;
        height:111px;
        display: inline-block;
        background: url(img/icon-key4.png) no-repeat 0px center / 110px auto;
        margin-top: -26px;
    }

    .button {
        font: 700 18px/44px "Fira Sans";
        float: left;
        text-decoration: none;
        color: white;
        background: #9B9B9B;
        border-radius: 4px;
        padding: 0px 15px;
        margin-top: 8px;
    }

    .button:hover {
    	background: #8abf48;
    	box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }
    
    .sidenote {
        float: left;
        width: 240px;
        color: #BCBCBC;
    }

    .button-accent {background: #8ec549;}
    
    .button-accent:hover {
    	background: #8abf48;
    	box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    
    
</style>


<div style="margin-left:-10px; width:960px; background-color:white; padding:10px;">
	<div style='text-align:center; float: left;  margin-top: 42px; width: 93px; line-height: 12px; margin-left: 20px;'>
		<a style='text-decoration: none; color:#5e5e5e' target="_blank" href="/img/dogovor_arendy.doc">
			<img width=30px; src='/img/dogovor.png'> <br/>			
			<span style='font-size: 12px;'>Скачать договор аренды</span>
		</a>
	</div>
    <h1>Как получить доступ<br> к базе контактов</h1>
    <p class="subheader"><span style='margin-left: 130px;' class="sh">Пять вариантов на выбор</span></p>




    <p class="activity"><span>Купить неограниченный доступ</span> Неограниченный доступ на месяц за 1200 рублей</p>
    <p class="reward"><span class="icon-key1">&nbsp;</span></p>
    <a class="button button-accent" href="/byAccess">Варианты оплаты</a>

    <p class="activity"><span>Сообщить о сдаваемой квартире</span> Максимум бесплатных ключей!</p>
    <p class="reward"><span class="icon-key2">&nbsp;</span></p>
    <a class="button" href="/add-item">Сообщить о квартире</a>


    <p class="activity"><span>Поставить “лайк” Вконтакте</span> Простой способ получить один пароль.</p>
    <p class="reward"><span class="icon-key3">&nbsp;</span></p>
    <a class="button" href="/tellafriend">Рассказать друзьям</a>

    <p class="activity"><span>Вступить в группу Вконтакте</span> Подпишитесь на группу и получите бесплатный пароль</p>
    <p class="reward"><span class="icon-key3">&nbsp;</span></p>
    <a class="button" href="http://vk.com/clubbaza812">Вступить в группу</a>
    
<?php /*
    <p class="activity"><span>Подписаться на рассылку новых объявлений</span> Подпишитесь на рассылку свежих объявлений, пароль придет<br> на телефон, указанный в рассылке.</p>
    <p class="reward"><span class="icon-key3">&nbsp;</span></p>
    <a class="button" href="/subscribe">Подписаться на рассылку</a>
    

    <p class="activity"><span>Привести друзей на сайт</span> Внизу письма из рассылки есть ссылка на вашу страницу baza812.ru/likeXXXXX за каждые 10 “лайков” вы получите один бесплатный пароль.</p>
    <p class="reward">1<span class="icon-key">&nbsp;</span></p>
    <p class="sidenote">Для использования должна быть подключена рассылка. (см. выше)</p>
*/ ?>
    <p class="activity"><span>Написать отзыв Вконтакте</span> Вы получете один бесплатный пароль на два контакта</p>
    <p class="reward"><span class="icon-key4">&nbsp;</span></p>
    <a class="button" href="http://vk.com/topic-90622364_31995394" target="_blank">Написать отзыв</a>



    <fieldset class="pay-attention">
        <legend>Обратите внимание</legend>
        <ul>
            <li>Пароли приходят только на указанный номер телефона.</li>
            <li>Никаких денег со счета списано не будет.</li>
            <li>Все бесплатные пароли действуют в течении полугода после получения.</li>
            <li>Все бесплатные способы получения пароля можно использовать только один раз, кроме "Сообщить о квартире".</li>
        </ul>
    </fieldset>

<?php /*

    <div id="support-footnote">Если у вас возникли сложности — обратитесь в службу поддержки<br>
        +7 (812) 123-45-67, support@baza812.ru</div>
*/?>
</div>