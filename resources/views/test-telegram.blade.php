<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Web App</title>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
</head>
<body>
<h1>Привіт, користувачу!</h1>
<div id="user-info"></div>

<script>
    // 1. Ініціалізація Web App
    Telegram.WebApp.ready();

    // 2. Отримання даних про користувача через initData
    const initData = Telegram.WebApp.initData || "";
    const initDataUnsafe = Telegram.WebApp.initDataUnsafe || {};
    //
    // // Виведення даних для тестування
    // console.log("Init Data:", initData);
    // console.log("Init Data Unsafe:", initDataUnsafe);
    //
    // // 3. Виведення інформації про користувача на сторінці
    // document.getElementById('user-info').innerText = `Привіт, ${initDataUnsafe.user?.first_name || 'користувач'}!`;
    //
    // // Якщо необхідно отримати chat_id
    const userId = initDataUnsafe.user?.id;
    // console.log("User ID (chat_id):", userId);
    alert(userId);
    var WebApp = window.Telegram.WebApp;
    WebApp.showAlert(`Добро пожаловать, @${WebApp.WebAppUser.username}.`);
    // Якщо потрібно відправити ці дані на сервер
    fetch('/handle-webapp-data', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ userId }),
    });
</script>
</body>
</html>
