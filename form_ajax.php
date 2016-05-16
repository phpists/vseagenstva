<?php
include_once('db.class.php');
$DB = new DB_CLASS();
$sql = '';
$sql .= 'SELECT * FROM tenders ';
if ($_POST) {
        $sql .= 'WHERE';
        if ($_POST['services'] == "individual") {
                if ($_POST['geography_chapter']) {
                        if($_POST['geography_chapter'] != 'russian') {
                           $sql .= " geography_chapter = '" . $_POST['geography_chapter'] . "'";
                        } else {
                           $sql .= " geography_chapter NOT IN ('Украина', 'Казахстан', 'Белоруссия')";
                        }
                        /*if ($_POST['url'] !='') {
                                $sql .= " AND url = '" . $_POST['url'] . "'";
                        }*/
                        /*if ($_POST['strategy']) {
                                $sql .= " AND strategy = '1'";
                        }*/
                        if ($_POST['seo']) {
                                $sql .= " AND seo = '1'";
                        }
                        if ($_POST['contact_marketing']) {
                                $sql .= " AND contact_marketing = '1'";
                        }
                        if ($_POST['sites']) {
                                $sql .= " AND sites = '1'";
                        }
                        if ($_POST['context']) {
                                $sql .= " AND context = '1'";
                        }
                        if ($_POST['price_place']) {
                                $sql .= " AND price_place = '1'";
                        }
                        if ($_POST['landing']) {
                                $sql .= " AND landing = '1'";
                        }
                        if ($_POST['media']) {
                                $sql .= " AND media = '1'";
                        }
                        if ($_POST['conversion']) {
                                $sql .= " AND conversion = '1'";
                        }
                        if ($_POST['offlain_rekl']) {
                                $sql .= " AND offlain_rekl = '1'";
                        }
                        if ($_POST['smm']) {
                                $sql .= " AND smm = '1'";
                        }
                        if ($_POST['through_analytics']) {
                                $sql .= " AND through_analytics = '1'";
                        }
                        if ($_POST['specproekty']) {
                                $sql .= " AND specproekty = '1'";
                        }
                        if ($_POST['serm']) {
                                $sql .= " AND serm = '1'";
                        }
                        if ($_POST['biznes_analitika']) {
                                $sql .= " AND biznes_analitika = '1'";
                        }
                        if ($_POST['butjet']) {
                                switch ($_POST['butjet']) {
                                        case '15':
                                                $sql .= " AND min_cost >= '15000'";
                                                break;
                                        case '15-30':
                                                $sql .= " AND min_cost <= '15000'";
                                                break;
                                        case '30-50':
                                                $sql .= " AND min_cost <= '30000'";
                                                break;
                                        case '50-100':
                                                $sql .= " AND min_cost <= '50000'";
                                                break;
                                        case '100-200':
                                                $sql .= " AND min_cost <= '100000'";
                                                break;
                                        case '200-500':
                                                $sql .= " AND min_cost <= '200000'";
                                                break;
                                        case '500+':
                                                $sql .= " AND min_cost >= '0'";
                                                break;
                                        default:
                                                $sql .= " AND min_cost >= '0'";
                                }
                        }
                        if ($_POST['pr']) {
                                $sql .= " AND pr = '1'";
                        }
                } else {
                    echo json_encode('error_city');
                }

        } elseif($_POST['services'] == "strategy") {
                if ($_POST['geography_chapter']) {
                        if ($_POST['geography_chapter'] != 'russian') {
                                $sql .= " geography_chapter = '" . $_POST['geography_chapter'] . "'";
                        } else {
                                $sql .= " geography_chapter NOT IN ('Украина', 'Казахстан', 'Белоруссия')";
                        }
                        if ($_POST['butjet']) {
                                switch ($_POST['butjet']) {
                                        case '15':
                                                $sql .= " AND min_cost <= '15000'";
                                                break;
                                        case '15-30':
                                                $sql .= " AND min_cost >= '15000'";
                                                break;
                                        case '30-50':
                                                $sql .= " AND min_cost >= '30000'";
                                                break;
                                        case '50-100':
                                                $sql .= " AND min_cost >= '50000'";
                                                break;
                                        case '100-200':
                                                $sql .= " AND min_cost >= '100000'";
                                                break;
                                        case '200-500':
                                                $sql .= " AND min_cost >= '200000'";
                                                break;
                                        case '500+':
                                                $sql .= " AND min_cost >= '0'";
                                                break;
                                        default:
                                                $sql .= " AND min_cost >= '0'";
                                }
                        }
                } else {
                        echo json_encode('error_city');
                }
        }
        $sql .= ' ORDER BY rating DESC';
        $all_agencies = $DB->getRows($sql);
        echo json_encode($all_agencies);
}
?>