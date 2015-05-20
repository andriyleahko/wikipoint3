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
            <p style="color: #9B9B9B;">без агентов,</p>
        </fieldset>

        <p>рядом с метро</p>
        <input type="hidden" name="metro" value="">
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
<div id="search-results">




</div>

