1. scope на статус в модели (использовался только в апи запросе)
2. Api запрос на получение данных тоже реализован (также не использовался по тз)
3. soft delete не помечал в интерфейсе т.к. про восстановление в тз тоже не было сказано
4. для фронта использовал laravel breeze (не увидел сначала что роль это просто статическое значение из конфига,
думал нужна система ролей и прав - реализовал через хелпер)
5. action классы и интерфейсы: логика вынесена из контроллеров в отдельные action классы, которые реализуют интерфейсы. это добавляет структуру и упрощает замену реализации
6. Enum для статуса: указание статуса происходит строго через него, плюс есть метод для преобразования в вид available/unavailable
7. залил на сервер http://92.118.114.246/ 
(почту и планировщик команды не настраивал)
