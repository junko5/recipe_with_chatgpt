# Today's Menu

Today's Menu is a web application designed to generate recipes and images based on user-input words. 
This app uses ChatGPT API and Laravel.

- **Sample Web App**
[Today’s Menu](https://cooking.oshietenet.net/)

- **Generate recipes and images based on user input.**
![Generated Image Example](https://biz.addisteria.com/wp-content/uploads/2024/06/carrot-and-tomate.png)

- **Handles errors gracefully when input words are inappropriate.**
![Generated Image Example](https://biz.addisteria.com/wp-content/uploads/2024/06/inappropriate-message.png)

## Setting Up the Project

### 1. Create a new Laravel project
```bash
composer create-project --prefer-dist laravel/laravel todaysMenu
```

### 2. Install Vite
```bash
npm install
```

### 3. Obtain an API key from OpenAI
Visit the OpenAI site, register, and obtain an API key.

### 4. Configure the .env file
Include your OpenAI API key in your Laravel environment file.
```bash
OPENAI_API_KEY=sk-xxxxxxxxxxxxxxxxxxxxxxxx
```

### 5. Install the OpenAI PHP library
```bash
composer require openai-php/laravel
```
```bash
php artisan vendor:publish --provider="OpenAI\Laravel\ServiceProvider"
```

### 6. Set up config/openai.php according to this repository

### 7. Create a controller
```bash
php artisan make:controller ChatController
```

### 8. Implement routes, controller, view
Input the necessary code in routes/web.php, ChatController, and resources/views/chat/create.blade.php.

## Blog Articles in English
[ChatGPT and Laravel API Integration: Create an AI-Powered Web App](https://biz.addisteria.com/en/chatgpt_api-2/)

[Using ChatGPT and DALL·E 2  API in Laravel: How to Have AI Create Text and Images](https://biz.addisteria.com/en/using-chatgpt-and-dall%c2%b7e-2/)

## 日本語での参考ブログ記事
[ChatGPT APIを使ってLaravelと連携：Webアプリを作成する方法を解説](https://biz.addisteria.com/chatgpt_api/)

[LaravelでChatGPTとDALL·E 2 のAPIを使用：AIに文章と画像を作ってもらう方法](https://biz.addisteria.com/openai_image/)

## License
Today's Menu is built using the Laravel framework, which is open-sourced software licensed under the MIT license.


