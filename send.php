<?php
// Кому надсилати
$to = 'kozhukharirin@gmail.com, ask.voln@gmail.com';

// reCAPTCHA
$secret = 'YOUR_RECAPTCHA_SECRET_KEY';
$token  = $_POST['recaptcha_token'] ?? '';

function verify_recaptcha($secret, $token){
  $resp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secret).'&response='.urlencode($token));
  if(!$resp) return false;
  $data = json_decode($resp, true);
  return $data && $data['success'] === true && $data['score'] >= 0.3;
}

if(!verify_recaptcha($secret, $token)){
  http_response_code(403);
  exit('reCAPTCHA failed');
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

if($name==='' || $email==='' || $message===''){
  http_response_code(422);
  exit('Заповніть усі обов’язкові поля');
}

$subject = "Нова заявка з сайту Ваш Фундамент";
$body = "Ім'я: $name\nEmail: $email\nТелефон: $phone\n---\nПовідомлення:\n$message\n";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "From: Ваш Фундамент <no-reply@example.com>\r\n";
$headers .= "Reply-To: $email\r\n";

// Надсилаємо
if(@mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $body, $headers)){
  header('Location: /form.html?ok=1');
  exit;
} else {
  http_response_code(500);
  echo "Помилка надсилання. Спробуйте пізніше.";
}
