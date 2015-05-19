<p class="items-counter">Найдено <?php echo $total ?> объектов.</p>

<?php if (count($objects)) : ?>
    <?php foreach ($objects as $item): ?>
        <div class="item">
            <div class="image"></div>
            <div class="info">
                <p class="price"><?php echo $item->price ?> руб.</p>
                
                <p class="type"><?php if ($item->ObjectsDovType) echo $item->ObjectsDovType->name ?> квартира</p>
                
                <p class="metro line-5"> <?php if ($item->ObjectsDovDistrict)  echo $item->ObjectsDovDistrict->name ?></p>
                <p class="address">&nbsp;<?php if ($item->ObjectsDovStreets) echo $item->ObjectsDovStreets->name ?></p>
                <div class="features">
                    <div style='text-align: left; font: italic 14px/20px "PT Sans"; margin-left:10px; padding-top:5px;'>
                        <?php if ($item->ObjectsMoreinfo->internet == 1): ?>
                            <img  width="13px" title='Интернет' src='img/sp4.png'> <span style='margin-left: 15px;'>Интернет</span> <br>
                        <?php endif; ?>
                        <?php if ($item->ObjectsMoreinfo->washer == 1): ?>
                            <img width='13px' title='Стиральная Машинка' src='img/sp2.png'> <span style='margin-left: 15px;'>Стиральная Машинка</span><br>
                        <?php endif; ?>
                        <?php if ($item->ObjectsMoreinfo->fridge == 1): ?>
                            <img width='13px' title='Холодильник' src='img/sp1.png'> <span style='margin-left: 15px;'>Холодильник</span> <br>
                        <?php endif; ?>
                        <?php if ($item->ObjectsMoreinfo->furniture == 1): ?>
                            <img width='13px' title='Мебель' src='img/sp3.png'> <span style='margin-left: 15px;'>Мебель</span> 
                        <?php endif; ?>
                    </div>
                </div>
                <p class="timestamp"><?php list($date, $time)=explode(' ',$item->date_add); echo 'Добавлен '.date('d.m.Y',strtotime($date))?></p>
                
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>






<p class="items-counter"><a href="#">Ещё объекти.</a></p>