<?php
// ob_start(); var_dump($_POST); file_put_contents('mail.log', ob_get_contents() );
// 
// если  нет заголовка сервера, или отправка не через ajax - это спам
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || 
    (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')) {
    die();
}

// Получаем значения полей
$arr = [
                               "Имя"   => ($_POST["name"])           ? $_POST["name"]            : '',
                             "Длина"   => ($_POST["length"])         ? $_POST["length"]          : '',
                             "Почта"   => ($_POST["email"])          ? $_POST["email"]           : '',
                        "Тип услуги"   => ($_POST["typeservice"])    ? $_POST["typeservice"]     : '',
                           "Телефон"   => ($_POST["phone"])          ? $_POST["phone"]           : '',
                           "Площадь"   => ($_POST["size"])           ? $_POST["size"]            : '',
                          "Материал"   => ($_POST["material"])       ? $_POST["material"]        : '',
                          "Текстура"   => ($_POST["texture"])        ? $_POST["texture"]         : '',
                        "Количество"   => ($_POST["count"])          ? $_POST["count"]           : '',
                       "Тип бортика"   => ($_POST["type_bort"])      ? $_POST["type_bort"]       : '',
                       "Тип изделия"   => ($_POST["service"])        ? $_POST["service"]         : '',
                       "Комментарий"   => ($_POST["comment"])        ? $_POST["comment"]         : '',
                   "Вариант ремонта"   => ($_POST["type"])           ? $_POST["type"]            : '',
                 "Выбранный подарок"   => ($_POST["select_gift"])    ? $_POST["select_gift"]     : '',
                 "Выбранная теплица"   => ($_POST["select_teplica"]) ? $_POST["select_teplica"]  : '',
            "Наименование продукции"   => ($_POST["product"])        ? $_POST["product"]         : '',
          "Расстояние между дугами"    => ($_POST["distance"])       ? $_POST["distance"]        : '',
    "Комментарий для администратора"   => ($_POST["admin-data"])     ? $_POST["admin-data"]      : '',
];
                                         
$to = "<chaica13@yandex.by>"; // кому !! с < >
$to = "<ip.svetlana.kolyvanova@gmail.com>";
$url = "<vashsklad.by>"; // адрес сайта !! с < >
//$mail_manager = "nata.media.rama@gmail.com"; // !! без < >


$arr     = clearArrEmpty($arr); // чистим пустые значения
$message = createTableMessage($arr); // формируем табличку
$subject = getSubjectMessage($arr); // получаем тему письма


// получаем тему письма
function getSubjectMessage($arr){
    if( $arr['Имя'] && 
        $arr['Телефон'] && 
        $arr['Выбранная теплица'] && 
        $arr['Расстояние между дугами'] && 
        $arr['Длина']  )
    {
        return 'Сделать расчёт';

    } else if( $arr['Имя'] && $arr['Телефон'] && $arr['Выбранный подарок'] ){

        return 'Заказать подарок';

    } else if( $arr['Имя'] && $arr['Телефон'] && $arr['Комментарий'] ){

        return 'Отзыв';

    } else if( $arr['Имя'] && $arr['Телефон'] ){
        
        return 'Перезвоните мне';

    } else {
        return 'Заказать звонок';        
    }
}

// чистим пустые значения
function clearArrEmpty($arr=[]) {
    return array_diff(array_map("clearInput", $arr), ['',' ']);
}

// обработка полей формы
function clearInput($inputValue) { 
    return htmlspecialchars(stripslashes(trim($inputValue))); 
}

// формируем строку с текстом сообщения
function createTableMessage($arr){
    $message = '';

    foreach ($arr as $key => $value) {
        $message .= 
            "<table>
                <tr>
                    <td style='padding: 10px; font-weight: 600; width:250px;text-align: right; padding-right: 30px;'>
                    {$key}:
                    </td>
                    <td style='padding: 10px; border: #000000 1px solid; background-color: #f8f8f8; width:500px;'>
                    {$value}
                    </td>
                </tr>
            </table>
            <br />";
    }
    return $message;
}
                                         
/* Для отправки HTML-почты вы можете установить шапку Content-type. */
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=\"utf-8\"\r\n";
$headers .= 'From: info@vashsklad.by' . "\r\n" .
           // 'Reply-To: MediaRama-info@yandex.by' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

/* дополнительные шапки */
$headers .= "From: Заявка с сайта $url\r\n";
if ( $mail_manager ) {
    $headers .= "Cc: {$mail_manager}\r\n";
}
//$headers .= "Bcc: mail@ya.ru\r\n";

/* и теперь отправим из */
mail($to, $subject, $message, $headers);