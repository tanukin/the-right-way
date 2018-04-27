php the right way
=================

Setting
---
File ./matrix.json with an incidence matrix
~~~
[
     [14,  9,  7,  0,  0,  0,  0,  0,  0],
     [ 0,  0, -1, 10, 15,  0,  0,  0,  0],
     [ 0, -1,  0, -1,  0, 11,  2,  0,  0],
     [ 0,  0,  0,  0, -1, -1,  0,  0,  9],
     [ 0,  0,  0,  0,  0,  0,  0, -1, -1],
     [-1,  0,  0,  0,  0,  0, -1,  9,  0]
 ]
~~~

Use
---
```yaml
composer install
```

```yaml
docker build -t right-way .
```

```yaml
docker run --rm right-way ./bin/console app:Dijkstra-algorithm matrix.json
```

Description
---
* Для управления пакетами использовался **composer**.
* Использовал паттерны/шаблоны проектирования:
    * Порождающие шаблоны проектирования
        * **Factory Method** (Фабричный метод)
    * Структурные шаблоны проектирования
        * **Dependency Injection** (Внедрение зависимости)
    * Поведенческие шаблоны проектирования
        * **Command** (Команда)
    * Основные шаблоны
        * **Delegation** (Делегирование)
* Стратегия обработки ошибок и исключений.
    * Генерировал ошибки и исключения с помощью оператора **throw**. Передавав на уровень выше. 
    Отлавливал и обрабатывал все ошибки и исключения с помощью оператора **catch** в точке входа приложения.

Create documentation
---       
```yaml
./vendor/bin/phpdoc -d src -t docs 
```
Run automatic code style checking
---   
```yaml
 ./vendor/bin/phpcpd src/
 ```
 ```yaml
 ./vendor/bin/phpcs src/
```
    
