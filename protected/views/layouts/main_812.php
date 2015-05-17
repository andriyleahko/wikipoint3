<html>
<head>

<meta charset="utf-8">
<style>
    @import url(css/style.css);
    @import url(css/catalog.css);

    #main-menu {overflow: hidden; margin-bottom: 30px;}
    #main-menu .logo {width: 200px; height: 60px; display: block; float: left; margin-right: 20px; background: url(img/logo.jpg) no-repeat center center; background-size: 200px;}
    #main-menu .menu-option {font: 700 italic 24px/60px "PT Sans"; text-decoration: none; color: #4579A6; margin-right: 20px;}
    #main-menu .add-item {font: italic 18px/44px "PT Sans"; text-decoration: none; color: white; border-radius: 4px; display: block; padding-left: 50px; text-align: right; padding-right: 15px; float: right; background: url(img/note.svg) no-repeat 15px center; background-color: #9B9B9B; margin-top: 8px;}
body {
    background: #99aec2 none repeat scroll 0 0;
}
</style>
</head>
<body>
<div class="wrapper">

    <div id="main-menu">
        <a class="logo" href=""></a>
        <a class="menu-option" href="">Принцип работы</a>
        <a class="menu-option" href="">Документы</a>
        <a class="menu-option" href="">Оплата</a>
        <a class="add-item" href="">Сообщить о квартире</a>
    </div>

    <?php echo $content; ?>


</div>
</body>
</html>