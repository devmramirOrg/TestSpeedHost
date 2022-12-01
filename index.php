<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @AlaCode
//-------------------------

// ------- Telegram -------
$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
    ];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok=false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    if(!$ok){
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec){
    $ok=true;
    }}}
    if(!$ok){
    exit(header("location: https://coffemizban.com"));
    }

    error_reporting(0);
// ------- include -------
include("config.php");
// ------- Telegram -------
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$text = $update->message->text;
$first = $update->message->from->first_name;
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel_bot&user_id=".$from_id));
$tch = $forchaneel->result->status;
$message_id = $update->message->message_id;
}
if (isset($update->callback_query)){
$chat_id = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
}
// Anti Code
if($chat_id != $admin){
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
    if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
    if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
    if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
    if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
        'parse_mode'=>"HTML",
        ]);
    exit;
    }
}
if($tch == 'left'){
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"
     ⚠️| دوست عزیز جهت استفاده از ربات ما در چنل ما مشترک شوید.
    🛒 ~ |『 @$channel_bot 』
    
    🔓| سپس مجدد ربات را ⟮ /start ⟯ کنید !
    ",
    'parse_mode'=>"HTML",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"🔐 کانال ما",'url'=>"https://t.me/$channel_bot"]],
    ]
    ])
    ]);
    exit();
    }
// ------- start -------

if($text == "/start"){
    
    $sql    = "SELECT `id` FROM `users` WHERE `id`=$chat_id";
    $result = mysqli_query($conn,$sql);
    
    $res = mysqli_fetch_assoc($result);
    
    if(!$res){
        
        $sql2    = "INSERT INTO `users` (id, step) VALUES ($chat_id, 'none')";
        $result2 = mysqli_query($conn,$sql2);
    }
    }

    // KeyBoard

    $key1        = '🚀 تست سرعت';
    $key2        = '👨‍💻 حساب کاربری';
    $key5        = '📚 قوانین و راهنما';
    $support     = '👨‍💻 | پشتیبانی';
       
        $reply_keyboard = [
                            [$key1] ,
                            [$key2 , $key5] ,
                            [$support],
    
                          ];
     
        $reply_kb_options = [
                                'keyboard'          => $reply_keyboard ,
                                'resize_keyboard'   => true ,
                                'one_time_keyboard' => false ,
                            ];

    $key4                 = '📊 | امار ربات';
    $key_hmgani           = '📝 | پیام همگانی'; 
    $key_forvard          = '📝 | فوروارد همگانی';
    $suppprt_result       = '✍️ | پیام به کاربر';
    
    $reply_keyboard_panel = [
                                    [$key4] ,
                                    [$key_hmgani, $key_forvard] ,
                                    [$suppprt_result] ,
                            
                            ];
                             
        $reply_kb_options_panel = [
                                        'keyboard'          => $reply_keyboard_panel ,
                                        'resize_keyboard'   => true ,
                                        'one_time_keyboard' => false ,
                                ];

    $back = '◀️ بازگشت';

    $reply_keyboard_back = [
                                [$back] ,
                                
                            ];
                                 
        $reply_kb_options_back = [
                                    'keyboard'          => $reply_keyboard_back ,
                                    'resize_keyboard'   => true ,
                                    'one_time_keyboard' => false ,
                                ];

    $send_text      = '📝 ارسال متن';
    $send_inlinekey = '📝 ارسال دکمه شیشه ای';

    $reply_keyboard_test = [
                                [$send_text , $send_inlinekey] ,
                                [$back] ,
                            ];
                                 
        $reply_kb_options_test = [
                                    'keyboard'          => $reply_keyboard_test ,
                                    'resize_keyboard'   => true ,
                                    'one_time_keyboard' => false ,
                                ];
                                
// ------- if ------- 
$adminstep = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `step` FROM `users` WHERE `id`='$from_id' LIMIT 1"));

if($adminstep['step'] == "key_hmgani" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE `id`=$chat_id LIMIT 1");
    
$sql    = "SELECT `id` FROM `users`";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
        
    bot('sendMessage',[
'chat_id'=>$row['id'],
'text'=>"$text",
'parse_mode'=>"HTML",
]);
}
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "key_forvard" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$admin' LIMIT 1");
 
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    bot('ForwardMessage',[
'chat_id'=>$row['id'],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
    }
 
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "support" and $text != $back){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ پیام با موفقیت ارسال شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);

bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"👨‍💻 سلام ادمین یک پیام برات امده 

📝 متن پیام : $text
👤 ارسال کننده : $chat_id",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "suppprt_result" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    $text_admin = explode(",",$text);
    $user_id = $text_admin['0'];
    $text_admin = $text_admin['1'];
    
    
    bot('sendmessage',[
'chat_id'=>$user_id,
'text'=>"👨‍💻 یک پیام از طرف مدیریت براتون امد 

📝 : $text_admin",
]);

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ انجام شد",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
    switch($text) {
 
                                    case "/start"              : show_menu();        break;
                                    case $key1                 : test();             break;
                                    case $key2                 : profile();          break;
                                    case $key5                 : help();             break;
                                    case $support              : support();          break;
                                    case $back                 : back();             break;
                                    case $send_text            : send_text();        break;
                                    case $send_inlinekey       : send_inlinekey();   break;
                                  
                                    
}
                                
        if($from_id == $admin){
                                
                                switch($text) {
                             
                                    case $key4 : statistics();                break;
                                    case "/admin" : panel();                  break;
                                    case $key_hmgani : key_hmgani();          break;
                                    case $key_forvard : key_forvard();        break;
                                    case $suppprt_result : suppprt_result();  break;
                                    
                                }
}

// ------- if -------

if($data == "re"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تست",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"🔐 کانال ما",'url'=>"https://t.me/$channel_bot"]
],
]
])
]);
}
                        
if($data == "help"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تست",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"🔐 کانال ما",'url'=>"https://t.me/$channel_bot"]
],
]
])
]);
}
// ------- function -------

function show_menu(){
    global $reply_kb_options;
    global $chat_id;
    global $hosting;

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🚀 | سلام به ربات تست سرعت $hosting خوش امدید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);
}

function profile(){

    global $chat_id;
    global $first;

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 اطلاعات حساب شما :",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"👤 نام شما",'callback_data'=>"aaaa"],
    ['text'=>"$first",'callback_data'=>"aaaa"],
],
[
    ['text'=>"👤 شناسه کابری",'callback_data'=>"aaaa"],
    ['text'=>"$chat_id",'callback_data'=>"aaaa"],
],
]
])
]);
}

function test(){
    
    global $chat_id;
    global $reply_kb_options_test;
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 از منو زیر انتخاب کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_test),
]);
}

function support(){
    
    global $chat_id;
    global $reply_kb_options_back;
    global $conn;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='support' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📬 پیام خود را ارسال کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}

function back(){
    
    global $reply_kb_options;
    global $chat_id;

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"↩️ به منو اصلی برگشتیم",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);
}

function send_text(){

    global $chat_id;
    global $hosting;


for ( $i=1; $i <=10; $i++ ){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🚀 تست سرعت ارسال پیام $hosting",
        'parse_mode'=>"HTML",
        ]);

}

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تست به پایان رسید",
'parse_mode'=>"HTML",
]);
}
function send_inlinekey(){

    global $chat_id;
    global $hosting;


for ( $i=1; $i <=10; $i++ ){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🚀 تست سرعت ارسال دکمه شیشه ای $hosting",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
                ['text'=>"$hosting",'callback_data'=>"aaaa"],
            ],
            ]
            ])
        ]);

}

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تست به پایان رسید",
'parse_mode'=>"HTML",
]);
}

function help(){
    
    global $chat_id;
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 از منو زیر انتخاب کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"📚 راهنما",'callback_data'=>"help"],
    ['text'=>"📖 قوانین",'callback_data'=>"re"],
],
]
])
]);
}

function panel(){
    
    global $reply_kb_options_panel;
    global $admin;

bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"👨‍💻 به پنل مدیریت خوش امدید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}

function key_hmgani(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📝 پیام خود را بنویسید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='key_hmgani' WHERE id=$chat_id LIMIT 1");
}

function key_forvard(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📝 پیام خود را فوروارد کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='key_forvard' WHERE id=$chat_id LIMIT 1");
}
function suppprt_result(){
    
    global $chat_id;
    global $reply_kb_options_back;
    global $conn;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='suppprt_result' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 کاربری که میخای براش پیام بفرستی پیام را به صورت زیر بنویس
id,message",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}
function statistics(){
    
    global $chat_id;
    global $conn;
    
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_num_rows($result);

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 امار ربات شما",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"📊 امار کاربران",'callback_data'=>"ssss"],
    ['text'=>"$res",'callback_data'=>"ssss"],
],
]
])
]);
}
?>