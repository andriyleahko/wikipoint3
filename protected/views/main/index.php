<div id="search-results">




</div>
<div id="main-page">

	<h1>Снять квартиру и комнату</h1>
	<p class="subheader">без комиссии</p>
	<div id="statistics">
		<p>Сейчас в базе <strong><?php echo $NumberObjects?></strong> объектов.</p>
		<p><a href="/catalog/search?rooms-amount[]=1&search=1&price_from=8000&price_to=30000">1-комнатные квартиры,</a> <a href="/catalog/search?rooms-amount[]=7,8,9,10,11,12,13,14,15&search=1&price_from=8000&price_to=30000">комнаты</a> <span class="pricerange">8.000–30.000</span> <img style='margin-top:1px;' src='/img/p-main.png'></p>
		<p><a href="/catalog/search?rooms-amount[]=2&search=1&price_from=16000&price_to=90000">2-комнатные квартиры</a> <span class="pricerange">16.000–90.000</span> <img style='margin-top:1px;' src='/img/p-main.png'></p>
		<p><a href="/catalog/search?rooms-amount[]=3&search=1&price_from=25000&price_to=200000">3-х, </a> <a href="/catalog/search?rooms-amount[]=4,5,6&search=1&price_from=25000&price_to=200000">4-х и боле комнатные</a> <span class="pricerange">25.000–200.000</span> <img style='margin-top:1px;' src='/img/p-main.png'></p>
	</div>
	<p class="disclaimer">Все объявления проверяются вручную.<br/> Информация актуальна в день публикации.</p>
	<h2>Поделитесь с друзьями!</h2>
	
	<!-- VK Widget -->
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
	<div id="vk_groups"></div>
	<script type="text/javascript">
		VK.Widgets.Group("vk_groups", {mode: 0, width: "620", height: "270", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 90622364);
	</script>
	
	<?php /*
	<script type="text/javascript"  async="async"> 
		VK.Widgets.Comments("vk_comments", {limit: 10, width: "759", attach: "*"});
	</script>
			<div class="social_comments" style="margin-left:160px;">
				<script type="text/javascript"  async="async"> 
					VK.init({apiId: 5001472, onlyWidgets: true});
				</script> 
						 
				<!-- Put this div tag to the place, where the Comments block will be --> 
				<div id="vk_comments"></div> 
				<script type="text/javascript"  async="async"> 
					VK.Widgets.Comments("vk_comments", {limit: 10, width: "620",  attach: "*"});
				</script>
			</div>
	*/ ?>
</div>