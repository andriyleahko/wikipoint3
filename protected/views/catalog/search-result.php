<?php if (!$offset) : ?><p class="items-counter">Найдено <?php echo $total ?> объектов.</p> <?php endif; ?>
<input type="hidden" name="offsetNext" value="<?php echo $offsetNext ?>" />
<?php if (count($objects)) : ?>
    <?php foreach ($objects as $item): ?>
        <?php $first = null; ?>
        <div class="item">
            <?php if ($item->Pictures) : ?>
                <?php foreach ($item->Pictures as $k => $pic) : ?>
                    <?php if (!$k) $first = "http://grandprime.info/" . $pic->file ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="image" style="overflow: hidden">
                <?php if ($first !== null) : ?> 
                    <a class="fancy" rel="example_group<?php echo $item->id_object ?>" href="<?php echo $first ?>"><img style="width: 450px;" src="<?php echo $first ?>"/></a>
                <?php endif; ?>
                <?php if ($first === null) : ?> 
                    <img style="width: 450px;" src="/img/no.png"/>
                <?php endif; ?>
            </div>
            <?php if ($item->Pictures) : ?>
                <?php foreach ($item->Pictures as $k => $pic) : ?>
                    <?php if ($k): ?><a class="fancy" rel="example_group<?php echo $item->id_object ?>" style="display:none" href="http://grandprime.info/<?php echo $pic->file ?>"> </a><?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <p class="type"><a href="/item/show?itemId=<?php echo $item->id_object ?>"><?php if ($item->ObjectsDovType) echo $item->ObjectsDovType->name ?> квартира</a></p>
            <div class="info">
                <p class="price"><?php echo $item->price ?> руб.</p>



                <p class="metro11"> <?php if ($item->ObjectsDovDistrict) echo $item->ObjectsDovDistrict->name ?></p>
                <p class="address">&nbsp;<?php if ($item->ObjectsDovStreets) {
            echo $item->ObjectsDovStreets->name;
            echo $item->building_number;
        } ?> </p>

                <br />
                <div class="features">
                    <div style='text-align: left; font: italic 14px/20px "PT Sans"; margin-left:10px; padding-top:5px;'>
                        <?php if ($item->ObjectsMoreinfo): ?>
                        <?php if ($item->ObjectsMoreinfo->internet == 1): ?>
                            <img  width="13px" title='Интернет' src='/img/sp4.png'> <span style='margin-left: 15px;'>Интернет</span> <br>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($item->ObjectsMoreinfo): ?>    
                        <?php if ($item->ObjectsMoreinfo->washer == 1): ?>
                            <img width='13px' title='Стиральная Машинка' src='/mg/sp2.png'> <span style='margin-left: 15px;'>Стиральная Машинка</span><br>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($item->ObjectsMoreinfo): ?>    
                        <?php if ($item->ObjectsMoreinfo->fridge == 1): ?>
                            <img width='13px' title='Холодильник' src='/img/sp1.png'> <span style='margin-left: 15px;'>Холодильник</span> <br>
                        <?php endif; ?>
                         <?php endif; ?>
                            <?php if ($item->ObjectsMoreinfo): ?>
        <?php if ($item->ObjectsMoreinfo->furniture == 1): ?>
                            <img width='13px' title='Мебель' src='/img/sp3.png'> <span style='margin-left: 15px;'>Мебель</span> 
        <?php endif; ?>
        <?php endif; ?>
                    </div>
                </div>
                <p class="timestamp"><?php list($date, $time) = explode(' ', $item->date_add);
        echo 'Добавлен ' . date('d.m.Y', strtotime($date)) ?></p>

            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>








<p class="items-counter" style="text-align: center"><a id="more-object" href="#">Ещё объекти.</a></p>
<script type="text/javascript">
    $(document).ready(function () {
        $("a[rel^='example_group']").fancybox();
    })
</script>