<?php

ob_start();
define('API_KEY','1000085807:AAFYj6Oyw0XExYR841nb1bL8xGK6aNrbJis');
echo file_get_contents("https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}

 function objectToArrays($object)
{
if (!is_object($object) && !is_array($object)) {
return $object;
}
if (is_object($object)) {
$object = get_object_vars($object);
}
return array_map("objectToArrays", $object);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$from_id = $message->from->id;
$tc = $update->message->chat->type;
$getfile = file_get_contents("data/$chat_id2/$chat_id2".'.txt');
$settings = json_decode(file_get_contents("data/$chat_id/$chat_id.json"),true);
$message_id2 = $update->callback_query->message->message_id;
$chat_id2 = $update->callback_query->message->chat->id;
$idBot = "";
$DevId = "576267439";
$Dev = array("$DevId","$DevId");

$statjson = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=".$from_id),true);
$status = $statjson['result']['status'];
mkdir("data");
if($tc == 'group' | $tc == 'supergroup'){
if($message and !is_dir("data/$chat_id")){
mkdir("data/$chat_id");
}
}
$idleft = $update->message->left_chat_member->id;
if($update->message->left_chat_member and $idleft==$idBot){
unlink("data/$chat_id.json");
unlink("data/$chat_id.txt");
rmdir("data/$chat_id");
}
$update = json_decode(file_get_contents('php://input'));
$php_aba = $update->message;
$u_nss = $php_aba->chat->id;
$F_PPP = $php_aba->text;
$u_nss2 = $update->callback_query->message->chat->id;
$php_aba_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $php_aba->from->id;
$m = file_get_contents("$u_nss.txt");

if (!is_dir('co')) {
	mkdir('co');
}

if($text  == "تفعيل التحويل") {
if($tc == 'group' | $tc == 'supergroup'){
if($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
	bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❏︙تم تفعيل التحويل...",'reply_to_message_id'=>$message->message_id,]);;
$settings["information"]["thuel"]="مفعل";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id/$chat_id.json",$settings);
} }
}
elseif($text  == "تعطيل التحويل"){
if($tc == 'group' | $tc == 'supergroup'){
if($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❏︙تم تعطيل التحويل...",'reply_to_message_id'=>$message->message_id,]);
$settings["information"]["thuel"]="معطل";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id/$chat_id.json",$settings);
} }
}
if($text  == "التحويلات") {
if($tc == 'group' | $tc == 'supergroup'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
اهلا بك عزيزي قائمه تحويل الصيغ ☑
*كل الاوامر تعمل بالرد ع الميديا بكلمه تحويل 
قائمة التحويلات :
ء---------------------------------------ء
ارسل بصمه  لتحويلها الى mp3
ء---------------------------------------ء
ارسل mp3  تحويلها الى بصمه
ء---------------------------------------ء
ارسل صورة  لتحويلها الى ملصق + png (512x512) + توسيط الصوره
ء---------------------------------------ء
ارسل ملصق  لتحويله الى صورة
ء---------------------------------------ء
ارسل فيدو يتحويله الى صوت + متحركة
ء---------------------------------------ء
ارسل فيديو نوت لتحويله الى فديو و بصمه
",
'reply_to_message_id'=>$message->message_id,
]);
}}
$re  = $update->message->reply_to_message->photo;
if($settings["information"]["thuel"] == "مفعل"){
if ($re and $text == "تحويل") {
	bot('sendMessage',[
		'chat_id'=>$u_nss,
		'text'=>'ᴏᴋ ʟᴏᴀᴅɪɴɢ ᴘʟᴇᴀsᴇ ᴡᴀᴛᴇ 📮๛'
	]);
	$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->reply_to_message->photo[1]->file_id])->result->file_path;
	file_put_contents("co/$u_nss.png",file_get_contents($file));
	bot('sendsticker',[
	'chat_id'=>$u_nss,
	'sticker'=>new CURLFile("co/$u_nss.png"),
'caption'=>" 🔘 𝐨𝐤 𝐝𝐨𝐧𝐞 𝐜𝐡𝐚𝐧𝐠𝐞",
	]);
	unlink("co/$u_nss.png");
}}
$hi  = $update->message->reply_to_message->sticker;
if($settings["information"]["thuel"] == "مفعل"){
if ($hi and $text == "تحويل") {
	bot('sendMessage',[
		'chat_id'=>$u_nss,
		'text'=>'ᴏᴋ ʟᴏᴀᴅɪɴɢ ᴘʟᴇᴀsᴇ ᴡᴀᴛᴇ 📮๛'
	]);
	$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->reply_to_message->sticker->file_id])->result->file_path;
	file_put_contents("co/$u_nss.jpg",file_get_contents($file));
	bot('sendphoto',[
	'chat_id'=>$u_nss,
	'photo'=>new CURLFile("co/$u_nss.jpg"),
'caption'=>" 🔘 𝐨𝐤 𝐝𝐨𝐧𝐞 𝐜𝐡𝐚𝐧𝐠𝐞",
	]);
	unlink("co/$u_nss.jpg");
}
}

$jk  = $update->message->reply_to_message->video;
if($settings["information"]["thuel"] == "مفعل"){
if ($jk and $text == "تحويل") {
	bot('sendMessage',[
		'chat_id'=>$u_nss,
		'text'=>'🕧ᴏᴋ ʟᴏᴀᴅɪɴɢ ᴘʟᴇᴀsᴇ ᴡᴀᴛᴇ 📮๛'
	]);
	$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->reply_to_message->video->file_id])->result->file_path;
	file_put_contents("co/$u_nss.gif",file_get_contents($file));
	bot('senddocument',[
	'chat_id'=>$u_nss,
	'document'=>new CURLFile("co/$u_nss.gif"),
'caption'=>" 🔘 𝐨𝐤 𝐝𝐨𝐧𝐞 𝐜𝐡𝐚𝐧𝐠𝐞",
	]);
	unlink("co/$u_nss.gif");
}}
$jk  = $update->message->reply_to_message->video;
if($settings["information"]["thuel"] == "مفعل"){
if ($jk and $text == "تحويل") {
	bot('sendMessage',[
		'chat_id'=>$u_nss,
		'text'=>'🕧┇جاري التحويل انتظر قليلا'
	]);
	$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->reply_to_message->video->file_id])->result->file_path;
	file_put_contents("co/$u_nss.ogg",file_get_contents($file));
	bot('sendvoice',[
	'chat_id'=>$u_nss,
	'voice'=>new CURLFile("co/$u_nss.ogg"),
'caption'=>" 🔘 𝐨𝐤 𝐝𝐨𝐧𝐞 𝐜𝐡𝐚𝐧𝐠𝐞",
	]);
	unlink("co/$u_nss.ogg");
}}
$jk  = $update->message->reply_to_message->video;
if($settings["information"]["thuel"] == "مفعل"){
if ($jk and $text == "تحويل") {
bot('sendMessage',[
'chat_id'=>$u_nss,
'text'=>'🕧┇جاري التحويل انتظر قليلا'
	]);
	$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->reply_to_message->video->file_id])->result->file_path;
	file_put_contents("co/$u_nss.mp3",file_get_contents($file));
	bot('sendaudio',[
	'chat_id'=>$u_nss,
	'audio'=>new CURLFile("co/$u_nss.mp3"),
'caption'=>" 🔘 𝐨𝐤 𝐝𝐨𝐧𝐞 𝐜𝐡𝐚𝐧𝐠𝐞",
	]);
	unlink("co/$u_nss.mp3");
}}
$vh  = $update->message->reply_to_message->voice;
if($settings["information"]["thuel"] == "مفعل"){
if ($vh and $text == "تحويل") {
	bot('sendMessage',[
	'chat_id'=>$u_nss,
	'text'=>'ᴏᴋ ʟᴏᴀᴅɪɴɢ ᴘʟᴇᴀsᴇ ᴡᴀᴛᴇ 📮๛'
	]);
	$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->reply_to_message->voice->file_id])->result->file_path;
	file_put_contents("co/$u_nss.mp3",file_get_contents($file));
	bot('sendaudio',[
	'chat_id'=>$u_nss,
	'audio'=>new CURLFile("co/$u_nss.mp3"),
'caption'=>" 🔘 𝐨𝐤 𝐝𝐨𝐧𝐞 𝐜𝐡𝐚𝐧𝐠𝐞",
	]);
	unlink("co/$u_nss.mp3");
}}
$ivh  = $update->message->reply_to_message->audio;
if($settings["information"]["thuel"] == "مفعل"){
if ($ivh and $text == "تحويل") {
	bot('sendMessage',[
	'chat_id'=>$u_nss,
		'text'=>'ᴏᴋ ʟᴏᴀᴅɪɴɢ ᴘʟᴇᴀsᴇ ᴡᴀᴛᴇ 📮๛'
]);
	$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->reply_to_message->audio->file_id])->result->file_path;
	file_put_contents("co/$u_nss.ogg",file_get_contents($file));
	bot('sendvoice',[
'chat_id'=>$u_nss,
'voice'=>new CURLFile("co/$u_nss.ogg"),
'caption'=>" 🔘 𝐨𝐤 𝐝𝐨𝐧𝐞 𝐜𝐡𝐚𝐧𝐠𝐞",
]);
unlink("co/$u_nss.ogg");
}}

 if($text  == "تفعيل اليوتيوب ") {
if($tc == 'group' | $tc == 'supergroup'){
if($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❏︙تم تفعيل اليوتيوب ...",'reply_to_message_id'=>$message->message_id,]);
$settings["information"]["youtube"]="مفعل";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id/$chat_id.json",$settings);
} }
}

elseif($text  == "تعطيل اليوتيوب "){
if($tc == 'group' | $tc == 'supergroup'){
if($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❏︙تم تعطيل اليوتيوب ...",'reply_to_message_id'=>$message->message_id,]);
$settings["information"]["youtube"]="معطل";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id/$chat_id.json",$settings);
} }
}

if($settings["information"]["youtube"] == "مفعل"){
if(preg_match('/^(تحميل) (.*)/s', $text, $dwd)){
$api = json_decode(file_get_contents("https://forhassan.ml/%D9%85%D9%8A%D8%B1%D9%88.php?url=".urlencode($dwd[1])), true);
$UrlD = $api['url'][0]['url'];
$title = $api['meta']['title'];
$duration = $api['meta']['duration'];
$filesize = $api["url"][1]["filesize"];
if($filesize < 20971520){
$video = bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>$UrlD,
"caption"=>"$title",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🎶 ┇ ملف صوتي •','callback_data' =>"au#".urlencode($dwd[2])],['text'=>'🔉 ┇ بصمه صوتيه •','callback_data' =>"vo#".urlencode($dwd[2])]],
]])
])->result->video->file_id;
$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$video])->result->file_path;
file_put_contents("data/$chat_id/$chat_id".'.txt',$file);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️┇*حجم المقطع كبير جدا لايمكنني ارساله*
🚸┇*يمكنك تحميل المقطع مباشر من خلال الضغط على الزر في الاسفل *",
'parse_mode'=>"Markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$title,'url'=>$UrlD]],
]])
]);
}
}}
if($settings["information"]["youtube"] == "مفعل"){
if(preg_match('/^(بحث) (.*)/s', $text, $dwd)){
$api = json_decode(file_get_contents("https://forhassan.ml/my_ip/searyu.php?serch=".urlencode($dwd[2])), true);
$keyboard["inline_keyboard"]=[];
for ($i=0; $i < 11; $i++) { 
$keyboard["inline_keyboard"][$i] = [['text'=>$api['Info']['Title'][$i],'callback_data'=>'dl#'.$api['Info']['Id'][$i].'#'.$from_id]];
}
$reply_markup = json_encode($keyboard);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'🔎┇نتائج بحث اليوتيوب لـ ↫ "*'.$dwd[2].'*"','parse_mode'=>"Markdown",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>$reply_markup
]);
}
}
$from_id2 = $update->callback_query->from->id;
$yt = explode('#',$data);
if($yt[0] == 'dl'){
if($from_id2 == $yt[2]){
$api = json_decode(file_get_contents("https://forhassan.ml/%D9%85%D9%8A%D8%B1%D9%88.php?url=http://www.youtube.com/watch?v=".$yt[1]), true); 
$UrlD = $api['url'][0]['url']; 
$title = $api['meta']['title']; 
$duration = $api['meta']['duration']; 
$filesize = $api["url"][1]["filesize"];
$done = "http://www.youtube.com/watch?v=".$do[1]."";
if($filesize < 20971520){
bot('deleteMessage',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
]);
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"جاري ارسال مقطع الفيديو",
]);
$video = bot('sendvideo',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'video'=>$UrlD,
"caption"=>"$title",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🎶 ┇ ملف صوتي •','callback_data' =>"au#".$done.'#'.$from_id2],['text'=>'🔉 ┇ بصمه صوتيه •','callback_data' =>"vo#".$done.'#'.$from_id2]],
]])
])->result->video->file_id;
$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$video])->result->file_path;
file_put_contents("data/$chat_id2/$chat_id2".'.txt',$file);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"⚠️┇*حجم المقطع كبير جدا لايمكنني ارساله*
🚸┇*يمكنك تحميل المقطع مباشر من خلال الضغط على الزر في الاسفل *",
'parse_mode'=>"Markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$title,'url'=>$UrlD]],
]])
]);
}
} else {
 bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"الطلب ليس لك عزيزي",
'show_alert'=>true,
]);
}
}
$from_id2 = $update->callback_query->from->id;
$exaudio = explode("#",$data);
if($exaudio[0] == "au"){
if($from_id2 == $exaudio[2]){
$api = json_decode(file_get_contents("https://forhassan.ml/%D9%85%D9%8A%D8%B1%D9%88.php?url=".$exaudio[1]), true);
$UrlD = $api['url'][0]['url'];
$title = $api['meta']['title'];
$duration = $api['meta']['duration'];
file_put_contents("$title.mp3",file_get_contents($getfile));
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"جاري ارسال الملف الصوتي",
]);
bot('deleteMessage',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
]);
bot('sendaudio',[
'chat_id'=>$chat_id2,
'audio'=>new CURLFile("$title.mp3")  ,
'title'=>$title,
"caption"=>"@EvEoE - 🕒 $duration",
'reply_to_message_id'=>$message->message_id,
]);
unlink("$title.mp3");
}}
$from_id2 = $update->callback_query->from->id;
$exvoice = explode("#",$data);
if($exvoice[0] == "vo"){
if($from_id2 == $exvoice[2]){
$api = json_decode(file_get_contents("https://forhassan.ml/%D9%85%D9%8A%D8%B1%D9%88.php?url=".$exvoice[1]), true);
$UrlD = $api['url'][0]['url'];
$title = $api['meta']['title'];
$duration = $api['meta']['duration'];
file_put_contents("$title.ogg",file_get_contents($getfile));
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"جاري ارسال البصمه الصوتيه",
]);
bot('deleteMessage',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
]);
bot('sendvoice',[
'chat_id'=>$chat_id2,
'voice'=>new CURLFile("$title.ogg")  ,
"caption"=>"@EvEoE - 🕒 $duration",
'reply_to_message_id'=>$message->message_id,
]);
unlink("$title.ogg");
}}
if($text  == "تفعيل الانستا") {
if($tc == 'group' | $tc == 'supergroup'){
if($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
	bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❏︙تم تفعيل الانستا...",'reply_to_message_id'=>$message->message_id,]);
$settings["information"]["insta"]="مفعل";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id/$chat_id.json",$settings);
} }
}
elseif($text  == "تعطيل الانستا"){
if($tc == 'group' | $tc == 'supergroup'){
if($status == 'creator' or $status == 'administrator' or in_array($from_id,$Dev)){
	bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❏︙تم تعطيل الانستا...",'reply_to_message_id'=>$message->message_id,]);
$settings["information"]["insta"]="معطل";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id/$chat_id.json",$settings);
} }
}
if($settings["information"]["insta"] == "مفعل"){
$nli = explode("تنزيل ",$text);
if($nli[1]){
$APish = json_decode(file_get_contents("https://forhassan.ml/my_ip/post.php?post=".$nli[1]),true);
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$APish['Info']["jpg"]["0"]['url'],
#'photo'=>$text,
'caption'=>"✝️تم تنزيل الصوره من الانستا",
]);
bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>$APish['Info']["mp4"]["0"]['url'],
#'video'=>$text,
'caption'=>"✝️تم تنزيل الفيديو من الانستا",
'reply_to_message_id'=>$message->message_id
]);
}}
$msgtx = $message->text;
$msgth= $update->callback_query;
$msgda = $msgth->data;
$new_chat_member = $message->new_chat_member;
$ne_member = $new_chat_member->first_name;
$id_member = $new_chat_member->id;
$nee_member = $msgth->from->first_name;
$msgidfr = $msgth->from->id;
$msgih = $msgth->message->chat->id;
if($msgtx  == "تفعيل التحقق") {
if($tc == 'group' | $tc == 'supergroup'){
if($status == 'creator' or $status == 'administrator' or in_array($msgidfr,$Dev)){
mkdir("data");
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❏︙تم تفعيل التحقق...",'reply_to_message_id'=>$message->message_id,]);
$settings["information"]["rebot"]="مفعل";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id/$chat_id.json",$settings);
} }
}

elseif($msgtx  == "تعطيل التحقق"){
if($tc == 'group' | $tc == 'supergroup'){
if($status == 'creator' or $status == 'administrator' or in_array($msgidfr,$Dev)){
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❏︙تم تعطيل التحقق...",'reply_to_message_id'=>$message->message_id,]);
$settings["information"]["rebot"]="معطل";
$settings = json_encode($settings,true);
file_put_contents("data/$chat_id/$chat_id.json",$settings);
} }
}
if($settings["information"]["rebot"] == "مفعل"){
if($new_chat_member){
bot('restrictChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$id_member,
]);
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"• اهلا بك يا [$ne_member](tg://user?id=$id_member) ❤️.
• المعذرة تم تقييدك من ارسال الرسائل ⚠️.
• يرجى الضغط على أنا لست روبوت الموجودة في الأسفل حتى يتم فك التقييد عنك 🛑.",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[["text"=>"• انا لست ربوت 📛","callback_data"=>"RoBot-$id_member"]],
]])
]);
}}
$ROrebot = explode('-', $msgda);
if($msgda == "RoBot-$ROrebot[1]" and $msgidfr == $ROrebot[1]){
bot('promoteChatMember',[
'chat_id'=>$msgih,
'user_id'=>$msgidfr,
]);
bot('EditMessageText',[
'chat_id'=>$msgih,
'message_id'=>$msgth->message->message_id,
'text'=>"• أهلا بك يا [$nee_member](tg://user?id=$msgidfr) ❤️.
• تم الغاء التقييد عنك بنجاح يمكنك ارسال الرسائل الآن 📝.",
'parse_mode'=>"MarkDown",
]);
}