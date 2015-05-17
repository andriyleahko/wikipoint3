<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDLPXMgcCP2NtQaJqvz0EwP6LxR4vsb1sY&sensor=TRUE&language=ru">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(59.934280,30.335099),
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
      }
    </script>
	
<style>
@import url(css/style.css);

      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 540px; width: 620px; }



#item {}
#item h1 {font: 700 28px/30px "PT Sans"; color: black; text-align: left; padding-top: 30px;}
#item .breadcrumbs {color: #9B9B9B; margin-bottom: 30px;}
#item .breadcrumbs a {color: #4579A6;}
#item .timestamp {color: #9B9B9B; background: url(img/icon-timestamp.png) no-repeat left center; padding-left: 25px; float: right;}

#item .info-box {background: #FBFAF6; overflow: hidden;}
#item .info-box .left-column {width: 620px; height: 540px; display: block; float: left; background: grey;}
#item .info-box .right-column {width: 300px; text-align: center; display: block; float: left; padding: 30px 0px 30px 20px}

#item .info-box .price {font: 700 42px/60px "PT Sans"; color: #4579A6;}
#item .info-box .price span {font: 500 italic 24px/30px "PT Sans"; color: #4579A6; display: block;}
#item .info-box .features {width: 240px; height: 90px; display: block; background: lightgray; margin: auto;}
#item .info-box .owner-name {font: italic 18px/30px "PT Sans"; color: #4A4A4A;}
#item .info-box .owner-phone {font: 700 28px/60px "PT Sans"; color: #4A4A4A; color: #4A4A4A;}

#item .info-box form {}



#item .info-box form input {
	font: 18px/30px "PT Sans";
	box-sizing: border-box;
	height: 45px;
	text-align: center;
	border-radius: 4px;
	padding: 0px 20px
}

#item .info-box form input[type="text"] {
	border: 1px solid #4579A6; 
	border-radius: 4px;
	margin-bottom: 15px;
}

#item .info-box form input[type="submit"] {
	border: 1px solid #4579A6; 
	border-radius: 4px;
	background: #4579A6;
	color: white;
	cursor: pointer;
}

#item .info-box form .wrong-password {color: red; font-size: 16px; visibility: hidden;}

.buy-password {
	border: 2px solid #4579A6;
	text-decoration: none;
	color: #4579A6;
	border-radius: 4px;
	height: 45px;
	width: 145px;
	line-height: 45px;
	display: block;
	float: left;
	margin: 15px 0px 0px 15px;
}

.buy-password: hover {
	background: #4579A6;
	color: white;
}

.get-for-free {
	font: italic 16px/20px "PT Sans";
	color: #4A4A4A;
	display: block;
	text-align: left;
	float: right;
	padding: 19px 40px 0px 0px;
}


.photo-map-panorama {margin: 8px 0px 8px 138px;}
.photo-map-panorama input[type="radio"] {display: none;}
.photo-map-panorama input[type="radio"] + label { 
	display: block;
	float: left;
	line-height: 44px;
	height: 44px;
	padding: 0px 20px 0px 20px;
	border-top: 1px solid #BCBCBC;
	border-bottom: 1px solid #BCBCBC;
	border-left: 1px solid #BCBCBC;
	cursor: pointer;
	display: block;
	box-sizing: border-box;
}

.photo-map-panorama label:nth-of-type(1) {
	border-radius: 4px 0px 0px 4px;
}

.photo-map-panorama label:last-child {
	border-right: 1px solid #BCBCBC;
	border-radius: 0px 4px 4px 0px;
}
.photo-map-panorama input[type="radio"]:checked + label {
	background: #f9f9f9;
	box-shadow: inset 0px 1px 3px 0px rgba(115, 77, 77, 1);
}


.item-description {
	width: 620px;
	font-family: "Georgia";
	color: #4A4A4A;
	padding-top: 30px;
	margin: 0px 20px 60px 0px;
}

.password-note {
	float: right;
	width: 300px;
	text-align: center;
	margin-top: -30px;
	color: #4579A6;
	font-style: italic;
}



.back-to-search, .add-to-favorites {
	text-decoration: none;
	color: white;
	background: #4579A6;
	line-height: 46px;
	display: inline-block;
	padding: 0px 20px;
	margin: 7px 22px 7px 0px;
	border-radius: 4px;
}
.add-to-favorites {
	background: #9B9B9B;
}


</style>
</head>
<body onload="initialize()">


<div id="item" class="wrapper">


<?php echo $content; ?>

</div>
    
</body>
</html>