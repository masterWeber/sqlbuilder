# SQLBuilder

If you're looking for something that is not an ORM but can generate SQL for
you, you just found the right one.

SQLBuilder is not an ORM system, but a toolset that helps you generate 
SQL queries in PHP.

## Features

* Simple API, easy to remember.
* Fast.
* Zero dependency.

## Synopsis

Here is a short example of using

```php
$builder = new SQLBuilder();

$sql = $builder->select(['id' => 'alias_id', 'name', 'phone'], Select::DISTINCT)
  ->from(['users' => 'u'])
  ->join('posts')
  ->as('p')
  ->on('p.user_id','u.id')
  ->where()
  ->in('id', [1, 2, 3])
  ->orderBy('name')
  ->orderBy('id', 'DESC');
```
