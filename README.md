## Сайты, использующие Freeland OAuth

 1. [MFCoin Escrow](https://bazar.mfcoin.net)
 2. [Рубрикатор Фриленда](https://pages.freeland.land)
 3. [Сервис локальных голосований](https://vote.mfcoin.su/)
 4. [MFCoin Faucet](https://faucet.mfcoin.su/)
 5. [Сервис MFinotaurAPI](https://mfinotaur.mfcoin.su)
 6. [Сервис Freeland GameID](https://freeland-game.ru/)

# Установка

Клонируйте репозиторий
```
git clone https://github.com/Sagleft/Freeland-Auth.git
```
или через SSH
```
git clone git@github.com:Sagleft/Freeland-Auth.git
```
Выполните
```
composer update
```
Не знакомы с Composer? Найти его вы можете на https://getcomposer.org/
## На CentOS
Для установки composer на CentOS выполните:
```
yum install -y composer
```
## На Windows
Если вы используете Windows, то перед установкой Composer необходимо установить PHP.
Создайте файл start.bat, внесите в него строку
```
cmd
```
запустите start.bat, введите
```
composer update
```
Если возникнет ошибка с openssl - необходимо зайти в директорию установки PHP, найти php.ini и раскомментировать строчку с extinsion openssl.
# Настройка
* Переименуйте auth_config_example.php в auth_config.php

* Внести параметры в auth_config.php
где **client_id** - ваш OAuth ID;
**client_secret** - секретный ключ авторизации;
**oauth_url** - url по которому пользователь будет направлен для авторизации, по-умолчанию https://profile.mfcoin.net;
**redirect_url** - url, по которому пользователь будет направлен после авторизации на profile.mfcoin.

Получить client_id, client_secret можно подав заявку:

* *Вариант 1.*
[написать заявку на форуме](https://forum.mfcoin.net/topic/278): в заявке укажите **свой email** с profile.mfcoin, **наименование** вашего сайта или сервиса и **redirect_url** по которому перенаправлять пользователей после авторизации.

* *Вариант 2.*
Напишите [Alexander Mamchenkov](https://tele.click/alex_mamchenkov) в Telegram. Сообщите **свой email** с profile.mfcoin, **наименование** вашего сайта или сервиса и **redirect_url** по которому перенаправлять пользователей после авторизации.

---

![image](https://github.com/Sagleft/Sagleft/raw/master/image.png)

### :globe_with_meridians: [Telegram канал](https://t.me/+VIvd8j6xvm9iMzhi)
