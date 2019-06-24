# book-shop
для выполнения миграции базы данных :
1 создайте бд с именем test-migrate(или любую другую пустую)
2. внесите изменения в файл config/db_params.php

3. в консоли прописываем php migrate.php up - запуск миграции
 php migrate.php down - откатить на одну миграцию
 php migrate.php create - создать новую миграцию 
