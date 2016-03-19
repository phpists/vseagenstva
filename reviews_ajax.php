<?php
/**
 * Created by SoftDeal
 * http://softdeal.net
 * autor Ковалів Володимир
 */
    include_once('db.class.php');
    $DB = new DB_CLASS();
    $hasError = false;
    $id = $_POST['id'];
    $reviews_result = $DB->getRows('SELECT * FROM reviews WHERE id_company="'.$id.'" AND ip_adress = "'.$_SERVER["REMOTE_ADDR"].'"');
    if($reviews_result) {
        $hasError = true;
        echo json_encode(array('errors'=>array('error' => 'error_ip', 'message'=>'Вы уже добавили отзыв этой компании !')));
    }
    if (!$hasError) {
        $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : '';
        $name = isset($_POST['name']) ? strip_tags(htmlspecialchars($_POST['name'])) : '';
        $review = isset($_POST['review']) ? strip_tags(htmlspecialchars($_POST['review'])) : '';
        $send_time = date('Y-m-d H:i:s');
        if ($rating != '' && $review != '') {
            $result_review = $DB->insertRow('reviews', array('id_company' => $id, 'name' => $name, 'review' => $review, 'rating' => $rating, 'time_send' => $send_time, 'ip_adress' => $_SERVER["REMOTE_ADDR"]));
            $count_res_reviews = count($DB->getRows("SELECT id_company, ip_adress FROM reviews WHERE id_company='" . $id . "'"));
            if ($result_review !== true) {
                echo json_encode(array('errors'=>array('error' => 'error', 'message'=>'Произошла ошибка при добавлении отзыва.')));
            } else {
                echo json_encode(array('errors' => array('error' => 'complate', 'message' => 'Ваш отзыв успешно добавлен !'), 'time_send' => $send_time, 'name' => $name,'count_reviews' => $count_res_reviews));
            }
            unset($count_res_reviews);
        } elseif (empty($rating)) {
            echo json_encode(array('errors'=>array('error' => 'error_rating', 'message'=>'Вы не указали рейтинг !')));
        } elseif (empty($review)) {
            echo json_encode(array('errors'=>array('error' => 'error_review', 'message'=>'Вы не написали отзыв !')));
        }
    }
?>