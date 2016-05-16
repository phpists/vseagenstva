<?php
/**
 * Created by SoftDeal
 * http://softdeal.net
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
            $reviews_result = $DB->getRows("SELECT * FROM reviews");
            $average_rating = $rating = array();
            foreach($reviews_result as $value){
                $rating['sum_rating'][$value['id_company']] += $value['rating'];
                $rating['count'][$value['id_company']]++;
                $average_rating['rating_company'][$value['id_company']] = $rating['sum_rating'][$value['id_company']]/$rating['count'][$value['id_company']];
                $rating['rating_company'][$value['id_company']] = $average_rating['rating_company'][$value['id_company']]*(5-(5/pow($rating['count'][$value['id_company']], 0.2)));
            }
            $count_res_reviews = count($DB->getRows("SELECT id_company, ip_adress FROM reviews WHERE id_company='" . $id . "'"));
            if ($result_review !== true) {
                echo json_encode(array('errors'=>array('error' => 'error', 'message'=>'Произошла ошибка при добавлении отзыва.')));
            } else {
                if ($DB->updateRow('tenders', array('rating' => $rating['rating_company'][$id]), array('id' => $id)))
                    echo json_encode(array('errors' => array('error' => 'complate', 'message' => 'Ваш отзыв успешно добавлен !'), 'time_send' => $send_time, 'name' => $name,'count_reviews' => $count_res_reviews));
                else
                    echo json_encode(array('errors'=>array('error' => 'error', 'message'=>'Произошла ошибка при обновлении рейтинга компании.')));
            }
            unset($count_res_reviews);
        } elseif (empty($rating)) {
            echo json_encode(array('errors'=>array('error' => 'error_rating', 'message'=>'Вы не указали рейтинг !')));
        } elseif (empty($review)) {
            echo json_encode(array('errors'=>array('error' => 'error_review', 'message'=>'Вы не написали отзыв !')));
        }
    }
?>