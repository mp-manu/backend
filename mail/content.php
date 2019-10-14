<?php
/**
 * Created by PhpStorm.
 * User: Ману
 * Date: 11.10.2019
 * Time: 23:30
 */

echo '<h3 style="color: orangered">Новое сообщение от клиентов ТехАрсенал (отправлено с сайта)</h3><hr>';
switch($message_type){
    case 'order-by-draw':
            echo '<p>Имя клиента: '.$customer.'</p>';
            echo '<p>Номер телефона: '.$phone.'</p>';
        break;
    case 'need-call':
        echo '<h4>Новый запрос на званок:</h4>';
        echo '<p>Имя клиента: '.$customer.'</p>';
        echo '<p>Номер телефона: '.$phone.'</p>';
        break;
    case 'contact':
        echo '<p>Имя клиента: '.$customer.'</p>';
        echo '<p>Номер телефона: '.$phone.'</p>';
        echo '<p>'.$text.'</p>';
        break;
    case 'question':
        echo '<h4>Новый вопрос клиента:</h4>';
        echo '<p>Номер телефона: '.$phone.'</p>';
        echo '<p>Имя: '.$customer.'</p><hr>';
        echo '<p>Вопрос клиента: '.$text.'</p>';
        break;
    default:
        break;
}

