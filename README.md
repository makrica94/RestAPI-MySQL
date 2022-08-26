# RestAPI-MySQL

Закидываем папку в "MAMP\htdocs"

Cоздаем БД через MyPHPAdmin с названием "notebook". После чего создаем таблицу test_api c такими колонками:

![image](https://user-images.githubusercontent.com/35145737/186931802-66abbb15-03f3-4ed4-91fb-7af292ff0fb5.png)

Запускаем MAMP. Переходим по адресу http://localhost/test_api/.

Мамонт настроен.

Api работает по внутреннему адресу http://localhost/test_api/api/posts

Проверить GET POST DELETE запросы можно через https://postman.co/

http://localhost/test_api/api/posts/123 - выдаст вам json под id - 123
