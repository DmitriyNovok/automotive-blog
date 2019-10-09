<?php


/**
 *
 *  Set webhook
 *  https://api.telegram.org/bot935790601:AAEJP5HwHkkppoK6rL6D3eVESBx1Q_s1j8Y/setWebhook?url=https://kubinx.herokuapp.com/index.php
 *
 *  Check webhook
 *  https://api.telegram.org/bot935790601:AAEJP5HwHkkppoK6rL6D3eVESBx1Q_s1j8Y/getWebhookInfo
 *
 *  https://api.telegram.org/bot935790601:AAEJP5HwHkkppoK6rL6D3eVESBx1Q_s1j8Y/getUpdates
 *
 *
 * curl -X GET "https://api.telegram.org/bot935790601:AAEJP5HwHkkppoK6rL6D3eVESBx1Q_s1j8Y/sendMessage?chat_id=581117342&text=Hello telega"
 *
 **/


define('BOT_TOKEN', '935790601:AAEJP5HwHkkppoK6rL6D3eVESBx1Q_s1j8Y');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

function apiRequestWebhook($method, $parameters) {
    if (!is_string($method)) {
        error_log("Method name must be a string\n");
        return false;
    }

    if (!$parameters) {
        $parameters = array();
    } else if (!is_array($parameters)) {
        error_log("Parameters must be an array\n");
        return false;
    }

    $parameters["method"] = $method;

    header("Content-Type: application/json");
    echo json_encode($parameters);
    return true;
}

function exec_curl_request($handle) {
    $response = curl_exec($handle);

    if ($response === false) {
        $errno = curl_errno($handle);
        $error = curl_error($handle);
        error_log("Curl returned error $errno: $error\n");
        curl_close($handle);
        return false;
    }

    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    curl_close($handle);

    if ($http_code >= 500) {
        // do not wat to DDOS server if something goes wrong
        sleep(10);
        return false;
    } else if ($http_code != 200) {
        $response = json_decode($response, true);
        error_log("Request has failed with error {$response['error_code']}: {$response['description']}\n");
        if ($http_code == 401) {
            throw new Exception('Invalid access token provided');
        }
        return false;
    } else {
        $response = json_decode($response, true);
        if (isset($response['description'])) {
            error_log("Request was successful: {$response['description']}\n");
        }
        $response = $response['result'];
    }

    return $response;
}

function apiRequest($method, $parameters) {
    if (!is_string($method)) {
        error_log("Method name must be a string\n");
        return false;
    }

    if (!$parameters) {
        $parameters = array();
    } else if (!is_array($parameters)) {
        error_log("Parameters must be an array\n");
        return false;
    }

    foreach ($parameters as $key => &$val) {
        // encoding to JSON array parameters, for example reply_markup
        if (!is_numeric($val) && !is_string($val)) {
            $val = json_encode($val);
        }
    }
    $url = API_URL.$method.'?'.http_build_query($parameters);

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($handle, CURLOPT_TIMEOUT, 60);

    return exec_curl_request($handle);
}

function apiRequestJson($method, $parameters) {
    if (!is_string($method)) {
        error_log("Method name must be a string\n");
        return false;
    }

    if (!$parameters) {
        $parameters = array();
    } else if (!is_array($parameters)) {
        error_log("Parameters must be an array\n");
        return false;
    }

    $parameters["method"] = $method;

    $handle = curl_init(API_URL);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($handle, CURLOPT_TIMEOUT, 60);
    curl_setopt($handle, CURLOPT_POST, true);
    curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
    curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

    return exec_curl_request($handle);
}

function processMessage($message) {
    // process incoming message
    $message_id = $message['message_id'];
    $chat_id = $message['chat']['id'];
    if (isset($message['text'])) {
        // incoming text message
        $text = $message['text'];

        switch ($text) {
            case '/start';
                apiRequestJson("sendMessage", ['chat_id' => $chat_id, "text" => 'Hello', 'reply_markup' =>
                    [
                        'keyboard' => [['Hello', 'Hi', 'Privet', 'Zdarova bratan']],
                        'one_time_keyboard' => true,
                        'resize_keyboard' => true
                    ]]);
                break;

            case '/help';
                apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => 'Hello', 'reply_markup' => array(
                    'keyboard' => array(array('', 'Hi')),
                    'one_time_keyboard' => true,
                    'resize_keyboard' => true)));
                break;

            case 'Hello';
                apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => 'Nice to meet you'));
                break;

            case '/stop';
                apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => 'Stop ? Can not stop me , BRO! ;)'));
                break;




            case 'Zdarova bratan';
                apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => 'Zdarova Bratuha!!! ;)'));
                break;




            default:
                apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => 'I understand only text messages'));
        }
    }
}


define('WEBHOOK_URL', 'https://kubinx.herokuapp.com/index.php');

if (php_sapi_name() == 'cli') {
    // if run from console, set or delete webhook
    apiRequest('setWebhook', array('url' => isset($argv[1]) && $argv[1] == 'delete' ? '' : WEBHOOK_URL));
    exit;
}


$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (!$update) {
    // receive wrong update, must not happen
    exit;
}

if (isset($update["message"])) {
    processMessage($update["message"]);
}







//$update = json_decode(file_get_contents('php://input'), true);
//
////print_r($update);
//
//$chatId = $update["message"]["chat"]["id"];
//$message = $update["message"]["text"];
//
//
//switch ($message) {
//    case "/test":
//        sendMessage($chatId,"test complete");
//        break;
//    case "/hi":
//        sendMessage($chatId,"hey there");
//        break;
//    default:
//        sendMessage($chatId,"nono i dont understand you");
//}
//
//
//function sendMessage ($chatId, $message) {
//    $url = "https://api.telegram.org/bot935790601:AAEJP5HwHkkppoK6rL6D3eVESBx1Q_s1j8Y/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
//    file_get_contents($url);
//}

//
//exit;
//
//
//


//$token = '935790601:AAEJP5HwHkkppoK6rL6D3eVESBx1Q_s1j8Y';
//
//$bot = new \TelegramBot\Api\Client($token);
//
//
//$bot->run();
//
//// команда для start
//$bot->command('test', function ($message) use ($bot) {
//    $answer = 'Welcome!';
//    $bot->sendMessage($message->getChat()->getId(), $answer);
//});
//
//// команда для помощи
//$bot->command('hi', function ($message) use ($bot) {
//    $answer = 'Commands:
///help - reference';
//    $bot->sendMessage($message->getChat()->getId(), $answer);
//});















