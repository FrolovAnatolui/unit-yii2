# Запуск
1. docker-compose up -d --build 
2. docker-compose exec -w /www/basic composer update
3. ссылки
---
5. список заявок http://localhost:8080/www/basic/web/index.php?r=claim%2Findex
5. создание заявки http://localhost:8080/www/basic/web/index.php?r=claim%2Fclaim
---
6. Запуск тестов
---
7. docker-compose exec -w /www/basic php /bin/sh 
8. vendor/bin/codecept run unit models/ClaimTest.php


