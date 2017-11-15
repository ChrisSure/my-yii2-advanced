My-yii2-advanced
============================

1. Відкрити композер і вставити     **composer create-project --prefer-dist --stability=dev snayper911/my-yii2-advanced name**

2. Створити бази даних name | name_test (в папці files існує дамп тестової бази)

3. В файлі common\config\main-local.php змінити назву бази на name, а в файлі common\config\test-local.php на test_name

4. Запустити міграції    **yii migrate created**

5. Запустити міграцію для ролей     **yii migrate --migrationPath=@yii/rbac/migrations**

6. Запустити команду для ініціалізації ролей     **yii rbac/init**

7. Зайти в папку vendor\dmstr\yii2-adminlte-asset\example-views\yiisoft\yii2-app і видалити там файли

8. Добавити папку ua в директорію vendor\yiisoft\yii2\messages видалити папку files

9. Скопіювати дамп в тестову базу, в таблиці security полю ip назначити за замовчуванням null. Запустити тести

-------------------------------------------------------------------------------------------------------------------------

Авторизація через соціальні мережі :
1. Створити додаток в developers.facebook.com 
2. Заповнити ключі секретні

-------------------------------------------------------------------------------------------------------------------------