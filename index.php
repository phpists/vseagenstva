<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все агентства РФ</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link href="css/mb.balloon.css" rel="stylesheet">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validator.js"></script>
    <script src="js/jquery.mb.balloon.js"></script>
    <script type="text/javascript">
        function animateAlert() {
            params = {
                top : '20px',
                opacity : 0.0
            };
            $('.alert-basket').animate(params, 'slow', 'swing', function () {
                $("#alertOverlay").remove();
                $('.alert-basket').remove();
            });
        }
        /**
         * Функция сообщений
         * @param message
         * @param m_class
         */
        function showAlert(message, m_class){
            $('<div id="alertOverlay" onclick="animateAlert();"></div>').appendTo('body');
            $('<div onclick="animateAlert();" class="alert-basket"><div class="smessage" id="' + m_class + '">' + message + '</div></div>').appendTo('body');
            $("#alertOverlay").fadeIn("slow");
            $(".alert-basket").fadeIn("slow");
            $('.alert-basket').css('margin-top', (-1)*($('.alert-basket').height())+'px');
            setTimeout('animateAlert()', 5000);
        }
    </script>
</head>
<body>

<header>
    <div class="container">
        <div class="form-group" id="errors2">
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center logo">
                    <img src="img/logo.png" alt="Все агенства РФ">

                    <h1 class="hidden">Все агентства РФ</h1>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="megaphone">
                    <img src="img/megaphone.png" alt="megaphone-icon">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="slogan">
                    <div><span>Тендер </span></div>
                    <div class="text-center"><span>на рекламную кампанию</span></div>
                    <div class="text-right"><span>в интернете</span></div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
    include_once('db.class.php');
    $DB = new DB_CLASS();
    $result = $DB->getRows('SELECT nazva FROM city');
 ?>
<div class="container">
    <div class="row">
        <form class="form-horizontal" role="form" id="ajax_form">
            <div class="col-sm-6">
                <div class="address_place">
                    <div class="arrow_right">
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">География</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="geography_chapter">
                                <option selected disabled>Выберите географию</option>
                                <option value="russian"selected>Все агентства РФ</option>
                                <?php foreach($result as $city){ ?>
                                    <option value="<?php echo $city['nazva']; ?>"><?php echo $city['nazva']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label class="col-sm-4">Адрес сайта</label>

                        <div class="col-sm-8">
                            <input name="url" type="url " class="form-control" placeholder="http://" data-error="Это поле должно быть правильно заполнено" required>
                        </div>
                    </div>

                </div>
                <div class="goals_objectives">
                    <h4><img src="img/write-icon.png" alt=""> Опишите</h4>
                    <h4 class="your_task">Ваши цели и задачи</h4>
                    <textarea class="form-control" rows="9" name="celi_i_zad" required></textarea>

                    <div class="budget_time">
                        <div class="form-group">
                            <label class="col-sm-5">Бюджет в месяц</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="butjet" required>
                                    <option value="0" selected disabled>выберите</option>
                                    <option value="15">до 15 тыс. рублей</option>
                                    <option value="15-30">15-30 тыс.</option>
                                    <option value="30-50">30-50 тыс.</option>
                                    <option value="50-100">50-100 тыс.</option>
                                    <option value="100-200">100-200 тыс.</option>
                                    <option value="200-500">200-500 тыс.</option>
                                    <option value="500+">более 500 тыс.</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5">Срок подачи заявки</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="srok" required>
                                    <option value="1_день">1 день</option>
                                    <option value="2_дня">2 дня</option>
                                    <option value="3_дня">3 дня</option>
                                    <option value="5_дней">5 дней</option>
                                    <option value="7_дней">7 дней</option>
                                    <option value="10_дней">10 дней</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 padding_left">
                <div class="tasks">
                    <div class="arrow_left">

                    </div>
                    <h4>Задачи <img src="img/rocket.png" alt="rocket-icon"></h4>

                    <div class="radio_group">
                        <div class="radio">
                            <label
                                onmouseout="$(this).hideBalloon()"
                                onmouseover="$(this).showBalloon()"
                                data-balloon="Агентство само разрабатывает комплексную стратегию исходя из ваших целей."
                                data-addoverlay="false"
                                data-forceposition="up">
                                <input type="radio" title="Комплексная стратегия" name="services" id="complex_strategy" value="strategy"/>
                                Комплексная стратегия (на усмотрение подрядчика)
                            </label>
                        </div>
                        <div class="radio">
                            <label
                                onmouseout="$(this).hideBalloon()"
                                onmouseover="$(this).showBalloon()"
                                data-balloon="Отдельные услуги (Описание)"
                                data-addoverlay="false"
                                data-forceposition="left">
                                <input type="radio" name="services" id="individual_services" value="individual" checked />
                                Отдельные услуги
                            </label>
                        </div>
                    </div>
                    <div class="checkbox">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Продвижение в поисковых системах"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="seo">
                                        SEO
                                    </label>
                                </td>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Продвижение при помощи написания текстов"
                                        data-addoverlay="false"
                                        data-forceposition="down">
                                        <input type="checkbox" class="inserv" name="contact_marketing">
                                        Контент-маркетинг
                                    </label>
                                </td>
                                 <td>
                                    <label>
                                        <input type="checkbox" class="inserv" name="sites">
                                        Создание сайтов
                                    </label>
                                </td>                               
                            </tr>
                            <tr>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Контекстная реклама: Яндекс.Директ, Google AdWords"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="context">
                                        Контекст
                                    </label>
                                </td>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Яндекс.Маркет, Викимарт и другие"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="price_place">
                                        Прайс-площадки
                                    </label>
                                </td>                                 
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Создание лендингов (одностраничных сайтов)"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="landing">
                                        Лендинги
                                    </label>
                                </td>                             
                            </tr>
                            <tr>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Медийная реклама"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="media">
                                        Медийка
                                    </label>
                                </td>                                
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Повышение конверсии, аудит сайта"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="conversion">
                                        Конверсия
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" class="inserv" name="offlain_rekl">
                                        Оффлайн-реклама
                                    </label>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Продвижение в социальных сетях"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="smm">
                                        SMM
                                    </label>
                                </td>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Аналитика, отслеживающая эффективность рекламы вплоть до совершения сделки"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="through_analytics">
                                        Сквозная аналитика
                                    </label>
                                </td>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Промо-сайты, мобильные приложения, виртуальная реальность, креативные эвенты"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="specproekty">
                                        Спецпроекты
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label
                                        onmouseout="$(this).hideBalloon()"
                                        onmouseover="$(this).showBalloon()"
                                        data-balloon="Управление репутацией в выдаче поисковых систем"
                                        data-addoverlay="false"
                                        data-forceposition="right">
                                        <input type="checkbox" class="inserv" name="serm">
                                        SERM
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" class="inserv" name="biznes_analitika">
                                        Бизнес-аналитка
                                    </label>
                                </td>

                                <td>
                                    <label>
                                        <input type="checkbox" class="inserv" name="pr">
                                        PR, брендинг
                                    </label>
                                </td>  
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="your_contacts">
                    <h4>Ваши контакты</h4>

                    <div class="form-group">
                        <label class="col-sm-3">Ваше имя</label>

                        <div class="col-sm-9">
                            <input name="name" type="text" class="form-control" data-error="Это поле должно быть правильно заполнено" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Ваш телефон</label>

                        <div class="col-sm-9">
                            <input name="phone" type="tel" class="form-control" data-error="Это поле должно быть правильно заполнено" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Ваш e-mail</label>

                        <div class="col-sm-9">
                            <input name="email" type="email" class="form-control" data-error="Это поле должно быть правильно заполнено" required>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-warning send_request" id="check">ОТПРВИТЬ ЗАЯВКУ</button>
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-9 padding_right">
            <div class="bottom_banner">
                Под ваши критерии подходят <span id="text-count" class="text_yellow">0</span> рекламных агенств <br> Мы отправим заявку
                во все
            </div>
        </div>
        <div class="col-sm-3 padding_left">
            <div class="megaphone2">
                <img src="img/megaphone2.png" alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="footer_table">
                <table>
                    <thead>
                    <tr>
                        <th class="col-xs-1"></th>
                        <th class="col-xs-3">Название</th>
                        <th class="col-xs-6">Описание</th>
                        <th class="col-xs-2">Регион</th>
                    </tr>
                    </thead>
                    <tbody id="data_db">

                    </tbody>
                </table>
                <input type="hidden" name="count" id="count" value="" />
            </div>
        </div>
    </div>
    </form>
</div>
</div>
<script type="text/javascript">
// SoftDeal.net
    $('#ajax_form').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            showAlert('Заполните обезательные поля!', 'error2');
        } else {
            e.preventDefault();
            if(tableChacked() == true) {
                $(".message").remove();
                var checked = [];
                var count = $('#count').val();
                var i = -1;
                while (++i <= count) {
                    if ($('#check' + i).is(':checked')) {
                        checked.push($('#check' + i).data('id'));
                    }
                }
                // var form_data = $('#ajax_form').serialize();
                var form_data = JSON.stringify($('#ajax_form').serializeObject());
                $.ajax({
                    url: 'admin/index.php/zakaz/new_zakaz',
                    type: 'post',
                    data: {'form': form_data, 'checked': checked},
                    //dataType : "json",
                    success: function (data) {
                        //alert(data);
                        if (data == 'ok') {
                            showAlert('Спасибо за вашу заявку. Она будет отправлена в выбранные агентства по электронной почте после прохождения модерации в течение одного рабочего дня.', 'success');
                        } else {
                            showAlert('Что-то пошло не так', 'error1');
                        }
                        setTimeout(function(){
                            location.reload(0);
                        }, 5000);
                    }
                });
            } else {
                showAlert('Выберите хотя хотя бы одну компанию!', 'error');
            }
        }
    });
    function tableChacked(){
        var check = $('.check_platform:checked').length;
        if (check > 0){
            return true;
        } else {
            return false;
        }
    }
    $(document).ready(function () {
        // ф-ція серіалізації форми
        $.fn.serializeObject = function(){
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };

        var strategy = document.querySelector('#complex_strategy');
        var ind = document.querySelector('#individual_services');
        strategy.onclick = function() {
            if (strategy.checked) {
                $('input.inserv').prop("disabled", true);
                $('input.inserv').prop('checked', false);
            }
        }
        ind.onclick = function() {
            if (ind.checked) {
                $('input.inserv').prop("disabled", false);
                // $('input.inserv').prop('checked', true);
            }
        }

        $('#ajax_form').on('change', function(){
            $(".message").remove();
            var radio_button_value;
            if ($("input[name='services']:checked").length > 0){
                radio_button_value = $('input:radio[name=services]:checked').val();
            }
            var form_data   = $('#ajax_form').serialize();
            $.ajax({
                url: 'form_ajax.php',         // URL
                type: 'post',                 // Тип запиту
                data: form_data + '&radio_button_value=' + radio_button_value,
                dataType : "json",            // Тип даних для відправки
                success: function (data) {    // свій обробник success
                    $('#data_db').after().empty();
                   2323233 $.each(data, function (i, val) {  // обробка отриманих даних
                        //$('#data_db').after().append('<tr><td><input type="checkbox" name="checklist" return false;" class="check_platform" id="check'+ i +'" data-id='+ val['id'] +' /></td><td>'+val['name']+'</td><td>'+ val['description'] +'</td><td>'+ val['geography_chapter'] +'</td></tr>');
                        if(val['favicon']) {
                            $('#data_db').after().append('<tr><td><input type="checkbox" name="checklist" checked class="check_platform" id="check'+ i +'" data-id='+ val['id'] +' /></td><td class="list_name"><a href="company/'+ val['id'] +'" title="'+val['name']+'"><img src="admin/icons/'+val['favicon']+'" /> '+val['name']+'</a></td><td class="list_description">'+ val['description'] +'</td><td>'+ val['geography_chapter'] +'</td></tr>');
                        } else {
                            $('#data_db').after().append('<tr><td><input type="checkbox" name="checklist" checked class="check_platform" id="check'+ i +'" data-id='+ val['id'] +' /></td><td class="list_name"><a href="company/'+ val['id'] +'" title="'+val['name']+'">'+val['name']+'</a></td><td class="list_description">'+ val['description'] +'</td><td>'+ val['geography_chapter'] +'</td></tr>');
                        }
                    });
                    $('#count').val(data.length);
                    $('#text-count').html(data.length);
                }
            });
        });
    });

</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter34775450 = new Ya.Metrika({
                    id:34775450,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/34775450" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>