<?php
/**
 *  Created by SoftDeal
 *  http://softdeal.net
 */
session_start();
include_once('db.class.php');
//include_once('sess.php');
$DB = new DB_CLASS();
$data = array();
if (isset($_GET['cname'])) {
    $id = $_GET['cname'];
    $hasError = false;
    $isComplate = false;
    $message = '';
    $result = $DB->getRows("SELECT * FROM tenders WHERE id='" . $id . "'");
    //print_r($result);
    $data['name'] = $result[0]['name'];
    $data['logo'] = $result[0]['favicon'];
    $data['city'] = $result[0]['geography_chapter'];
    $data['services'] = array(
        'Комплексная стратегия' => $result[0]['strategy'],
        'SEO' => $result[0]['SEO'],
        'Контекст' => $result[0]['context'],
        'Медийка' => $result[0]['media'],
        'SMM' => $result[0]['smm'],
        'SERM' => $result[0]['serm'],
        'Контент-маркетинг' => $result[0]['contact_marketing'],
        'Прайс-площадки' => $result[0]['price_place'],
        'Конверсия' => $result[0]['conversion'],
        'Сквозная аналитика' => $result[0]['through_analytics'],
        'Бизнес-аналитка' => $result[0]['biznes_analitika'],
        'Создание сайтов' => $result[0]['sites'],
        'Лендинги' => $result[0]['landing'],
        'Оффлайн-реклама' => $result[0]['offlain_rekl'],
        'Спецпроекты' => $result[0]['specproekty'],
        'PR, брендинг' => $result[0]['pr'],
    );
    $data['description'] = $result[0]['description'];
    $data['ofice1'] = $result[0]['ofice1'];
    $data['ofice2'] = $result[0]['ofice3'];
    $data['ofice3'] = $result[0]['ofice3'];
    $data['email'] = $result[0]['email'];
    $data['map1'] = $result[0]['map1'];
    $data['adress'] = $result[0]['adress'];
    $data['tel'] = $result[0]['tel'];
    $data['rating'] = ($result[0]['rating'] > 20) ? 100 : (int)$result[0]['rating']*5;

    /**
     * REVIEWS
     */
    $reviews_result = $DB->getRows("SELECT id_company, name, time_send, rating, review, ip_adress FROM reviews WHERE id_company='" . $id . "'");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $data['name']; ?> | Все агентства РФ</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <link href="../css/mb.balloon.css" rel="stylesheet">
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validator.js"></script>
    <script src="../js/jquery.mb.balloon.js"></script>
    <script type="text/javascript">
        function animateAlert() {
            params = {
                top: '20px',
                opacity: 0.0
            };
            $('.alert-basket').animate(params, 'slow', 'swing', function () {
                $("#alertOverlay").remove();
                $('.alert-basket').remove();
            });
        }
        function showAlert(message, m_class) {
            $('<div id="alertOverlay" onclick="animateAlert();"></div>').appendTo('body');
            $('<div onclick="animateAlert();" class="alert-basket"><div class="smessage" id="' + m_class + '">' + message + '</div></div>').appendTo('body');
            $("#alertOverlay").fadeIn("slow");
            $(".alert-basket").fadeIn("slow");
            $('.alert-basket').css('margin-top', (-1) * ($('.alert-basket').height()) + 'px');
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
                        <a href="/" title="Все агентства РФ">
                            <img src="../img/logo.png" alt="Все агенства РФ">

                            <h1 class="hidden">Все агентства РФ</h1>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="megaphone">
                        <img src="../img/megaphone.png" alt="megaphone-icon">
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

<div class="container">
    <div class="company">
        <div id="login_facebook" class="fb-login-button" data-max-rows="1" data-size="icon" data-show-faces="false" data-auto-logout-link="false"></div>
        <div class="row block_top">
            <div class="col-sm-3" style="border-right: 2px solid #9B9BC2">
                <div class="text-center logo2">
                    <img src="../admin/icons/<?php echo $data['logo']; ?>" alt="">
                </div>
            </div>
            <div class="col-sm-9">

                <div class="top_arrow_down">
                    <img src="../img/big-arrow-down.png" alt="">
                </div>

                <div class="company_name">
                    <h3><?php echo $data['name']; ?> рекламное агенство</h3>

                    <div class="productRate" title="<?php if ($data['rating']) echo $data['rating'] . '%'; ?>">
                        <img src="../img/top-stars2.png" alt="">
                        <div class="top_stars_yelow" style="<?php if ($data['rating']) echo 'width:' . $data['rating'] . '%;'; ?>">
                            <img src="../img/top-stars.png" alt="">
                        </div>
                    </div>
                    <div class="raiting">
                        <div class="city">
                            Город: <?php echo $data['city']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row center_block">
            <div class="container">
                <div class="col-sm-12">
                    <h3><img src="../img/icon-servise.png" alt=""> &nbsp; Услуги</h3>

                    <div class="links">
                        <?php foreach ($data['services'] as $key => $value) { ?>
                            <?php if ($value == 1) { ?>
                                <a href="#" class="btn"><?php echo $key; ?></a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="text_for_company">
                        <div class="div_informer">
                            <img src="../img/icon-info.png" alt="">
                        </div>
                        <p><?php echo $data['description']; ?></p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h3><img src="../img/icon-place.png" alt=""> &nbsp; Реквизиты</h3>
                </div>
                <div class="col-sm-6">
                    <?php if (!empty($data['map1'])) {
                        echo $data['map1'];
                    } ?>
                </div>
                <div class="col-sm-6">
                    <table class="table_address">
                        <? if (!empty($data['adress'])) { ?>
                            <tr>
                                <td><img src="../img/icon-place-small.png" alt=""></td>
                                <td><?php echo $data['adress']; ?></td>
                            </tr>
                        <? }
                        if (!empty($data['tel'])) { ?>
                            <tr>
                                <td><img src="../img/icon-phone.png" alt=""></td>
                                <td><?php echo $data['tel']; ?></td>
                            </tr>
                        <? }
                        if (!empty($data['email'])) { ?>
                            <tr>
                                <td><img src="../img/icon-mail.png" alt=""></td>
                                <td><?php echo $data['email']; ?></td>
                            </tr>
                        <? } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row bottom_block">
            <div class="icon_comment">
                <img src="../img/icon-comment.png" alt="">
            </div>
            <div class="container">
                <div class="col-sm-12">
                    <input type="hidden" name="count" value="<?php echo count($reviews_result); ?>" id="count_reviews">

                    <form role="form" id="review_form" method="post">
                        <h3><img src="../img/icon-place.png" alt=""> &nbsp; Добавить отзыв / Рейтинг &nbsp;
                                <span class="starRating">
                                    <input value="5" class="stars" id="star_5" name="rating" type="radio" title="Очень хорошо">
                                    <label for="star_5">5</label>
                                    <input value="4" class="stars" id="star_4" name="rating" type="radio" title="Хорошо">
                                    <label for="star_4">4</label>
                                    <input value="3" class="stars" id="star_3" name="rating" type="radio" title="Нормально">
                                    <label for="star_3">3</label>
                                    <input value="2" class="stars" id="star_2" name="rating" type="radio" title="Плохо">
                                    <label for="star_2">2</label>
                                    <input value="1" class="stars" id="star_1" name="rating" type="radio" title="Очень плохо">
                                    <label for="star_1">1</label>
                                </span>
                        </h3>
                        <textarea id="text_review" name="review" rows="6" maxlength="500" class="col-sm-12 write_comment"></textarea>

                        <div style="clear: both;"></div>
                        <span>Осталось символов: <span id="res_symb">(500)</span></span>
                        <button class="send_comment pull-right" type="button" id="send" name="send_review">Отправить
                        </button>
                    </form>
                    <div id="reviews">
                        <?php if (count($reviews_result) > 0) { ?>
                            <h3 class="all_coments"><img src="../img/all-coments.png" alt=""> &nbsp;
                                <span>Отзывы (<?php echo count($reviews_result); ?>)</span></h3>
                            <div class="pull-right icon_down">
                                <img src="../img/arrow-down.png" alt="">
                            </div>
                            <?php foreach ($reviews_result as $value): ?>
                                <div class="one_comment">
                                    <p class="name_commentator"><?php echo $value['name']; ?></p>
                                    <!--<p style="margin-bottom: 0">1 марта 2016, 08:30</p>-->
                                    <p style="margin-bottom: 0"><?php echo $value['time_send']; ?></p>

                                    <p class="star">
                                        <?php if ($value['rating']):
                                            for ($i = 1; $i <= 5; $i++):
                                                if ($i <= $value['rating']): ?>
                                                    <img src="../img/star-yelow.png" alt="">
                                                <?php else: ?>
                                                    <img src="../img/star-none.png" alt="">
                                                <?php endif;
                                            endfor;
                                        endif;
                                        ?>
                                    </p>

                                    <p><?php echo $value['review']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
var name = '<? echo $_SESSION['user_name']; ?>';
    $(document).ready(function () {

        $('#send').on('click', function () {
            if(name) {
                post_comment(name);
            } else {
                $("#ajaxpro-notice-form").css("display", "block");
                $(".ajaxpro-overlay").show();
            }
           // alert(name);
        });

        $('.btn-remove').click(function(){
            $("#ajaxpro-notice-form").css("display", "none");
            $(".ajaxpro-overlay").hide();
            $('#exampleSimple').html('');
        });

            
        function post_comment(f_name) {
            $.ajax({
                url: '../reviews_ajax.php',
                type: 'post',
                data: {
                    'id':'<?php echo $id; ?>',
                    'rating': $('input[name=rating]:checked').val(), 
                    'name': f_name, 'review': $('#text_review').val()
                },
                dataType : "json",
                success: function (data) { // свій обробник success
                     switch (data.errors.error) {
                         case 'error':
                             showAlert(data.errors.message, 'error');
                             break;
                         case 'error_ip':
                             showAlert(data.errors.message, 'error');
                             break;
                         case 'error_rating':
                             showAlert(data.errors.message, 'error');
                             break;
                         case 'error_review':
                             showAlert(data.errors.message, 'error');
                             break;
                         case 'complate':
                            showAlert(data.errors.message, 'success1');
                            star='';
                            for (var i = 1; i <= 5; i++) {
                                if($('input[name=rating]:checked').val() >= i) {
                                    star+='<img src="../img/star-yelow.png" alt=""> ';
                                } else {
                                    star+='<img src="../img/star-none.png" alt=""> ';
                                }
                            }
                            if ($('input#count_reviews').val() == 0) {
                                 $('#reviews').append(
                                         '<h3 class="all_coments"><img src="../img/all-coments.png" alt=""> &nbsp; <span>Отзывы ('+data.count_reviews+')</span></h3>'+
                                         '<div class="pull-right icon_down" onclick="slideDownComment(); return false;">'+
                                         '<img src="../img/arrow-down.png" alt="">'+
                                         '</div>'+
                                         '<div class="one_comment">'+
                                         '<p class="name_commentator">'+ name +'</p>'+
                                         '<p style="margin-bottom: 0">'+ data.time_send +'</p>'+
                                         '<p class="star">'+star+'</p>'+
                                         '<p>'+ $('#text_review').val() +'</p>'+
                                         '</div>'
                                 );
                                $('input#count_reviews').val('1');
                            } else {
                                $('h3.all_coments > span').text('Отзывы (' + data.count_reviews + ')');
                                $("#reviews").append(
                                     '<div class="one_comment">' +
                                     '<p class="name_commentator">'+ name +'</p>' +
                                     '<p style="margin-bottom: 0">' + data.time_send + '</p>' +
                                     '<p class="star">'+star+'</p>'+
                                     '<p>' + $('#text_review').val() + '</p>' +
                                     '</div>');
                                $('#text_review').val('');
                            }
                            break;
                         default:
                            showAlert(data.errors.message, 'error');
                     }
                 }
            });
        }

        $('.icon_down').on('click', function () {
            $('.one_comment').toggle();
        });

        $("#text_review").bind('change click keyup', function () {
            var res = 500 - $(this).val().length;
            $("#res_symb").text('(' + res + ')');
        });

    });

    function slideDownComment() {
        $('.one_comment').toggle();
    }



    function preview(token){
        $.getJSON("//ulogin.ru/token.php?host=" +
            encodeURIComponent(location.toString()) + "&token=" + token + "&callback=?",
        function(data){
            data=$.parseJSON(data.toString());
            if(!data.error){
                //alert("Привет, "+data.first_name+" "+data.last_name+"!");
                $("#rezult_modal").html("Привет, "+data.first_name+" "+data.last_name+"!");
                name = data.first_name+" "+data.last_name;
                $.post("../sess.php", { 'name': name } );
                setTimeout(function(){
                    $('.btn-remove').click();
                },1500); // 10sec (10000
            }
        });
    }
</script>
<div id="ajaxpro-overlay" class="ajaxpro-overlay" style="opacity: 0.8; display: none;"></div>
<!-- dialog 1 -->
<div id="ajaxpro-notice-form" class="ajaxpro-form" style="opacity: 0.95; display: none;">
    <a class="btn-remove ajaxpro-button" title="Закрыть"></a>
    <div id="rezult_modal">
        <span><strong>Чтоб оставить отзыв войдите через соц. сеть</strong></span><br /><br />
        <script src="//ulogin.ru/js/ulogin.js"></script>
        <div id="uLogin" data-ulogin="display=panel;fields=first_name,last_name;providers=facebook,twitter,vkontakte,odnoklassniki;hidden=other;redirect_uri=;callback=preview"></div>
    </div>
</div>




</body>
</html>