# Learn Laravel

Laravel is based on MAV model(model,view,control);

1. View is where you get the frontend components

2. model is where evey data fetching, updating, deleting stuff happen

3. control is like a bridge between view and model. actullay view isn't directly serve a component. After receiveing the request from serve serve send the request to controller. Than according to the request controller fetch data using model then get the frontend component from view and then send it to user

## Route

Router is used to serve the webpage. It's the entry point. In laravel we have a routes directory. In Routes directory we have web.php. Every route we will must be define here. Every Route class has method like get,post,delete. As ar agument it's take route path and callback function or Controller. You can directly serve web page via view method or you can use specify controller and in controller you can serve web page.

1. In order to use route in ancor tag, you can directly put "/youroute" in href attribute.

2. In router you can pass data to a file using view method. In router you need the to put the variable you want to past in side {}. example yourroute/{yourvalue}. In the call back function Just pass the variable as an argument, Now you can asscess the value. As a second parameter on view method you can pass key value pair. you can asscess the key inside file using <?=$keyname; ?>. This will render the value of the key.

3. You can restrict the type of value provide by the route using where method. first parameter is value name and second is regex expression

## Custom css and javascript file

In laravel project we have a resources directory. Every item in the resources directory will be compailed to public directory.

1. So one way you can use custom css or js is to add file directly in public directory. Then inside in blade file link to the file. Remember when add the file the of you js or css file think of it the file exist in resource directory

## Blade

Blade is a laravel template engine to build dynamic website.

## Database

You can find all database config inside .env file. There you can set which database you are gonna use, port number, Ip and password. Then you need to run php artisan migrate. This command will create all nessesary tables for you. You will find the migration file inside database/migration directory. In the migration file you will see two method. One is up two create table with columns and down to remove table. If you want to change extra column or rename a column , then you can directly write it inside up method. After modifing it you need to run php artisan migrate in order take the effect of changes. You can also use php migrate:fresh which autometically drop and recreate database tables.

## Laravel eloquent model

Laravel eloquent model is class which interact with the database. Every table in your database has a eloquent model in order to interact with the table. One way You can access database using [tinker](https://laracasts.com/series/laravel-8-from-scratch/episodes/19?autoplay=true). It's a cli tool.

You can create new data my inporting the model to your controller and use YourModel::create() [command](https://laravel.com/docs/4.2/eloquent).

## Route model binding

When you inject data Id to the to a route, you will often query data from database. Laravel route model [binding](https://laravel.com/docs/8.x/routing#route-model-binding) is a convinient way autometically model Id to route and query data. [link](https://laracasts.com/series/laravel-8-from-scratch/episodes/23?autoplay=true)

## eloquent relationship

you can create a [relationship](https://laracasts.com/series/laravel-8-from-scratch/episodes/24) method between two tables based on foregin key. Let say we have a food table and a category table. we also have models for each table Food , Cateogory. In food table we have a foregin key column which points to category id. That means each food is belongs to certain category. Now laravel providate some methods to create relation ship. This methods are hasone,hasmany,belongsTo,belongsToMany. Now each row of Food table belongsTo a certain row of category table. So can create a method in Food model class and return

```
$this->belongsTo(Cateogory::class)
```

## Solve n+1 problem

Some time you table has foregin keys to represend relation ship with the table. You use eloquent relationship in table model to stablish that relationship.
Now you call the all data from a table and also each foregin key data. However when calling foreign key data in each loop cause n+1 problem. To solve this you use [with](https://laracasts.com/series/laravel-8-from-scratch/episodes/26) method
