# front-project
A student project for web design class in university.
In this project, back-end created with raw php, like front-end using raw html, css and js.
Database created using Mysql.
## UI/UX
Component used in this application are created with raw css and js, but styles and colors are based on **material design 3**.
## Setting Up
For running this project you just need a php server and a Mysql database.

### PHP server
Create php server and put root of project in it. like localhost:8000/front-project/...

### DataBase
Create a Mysql database in your server and then set it name with DB const created in `setting` file `front-project/php-actions/includes/setting.php`
Other server setting stored there too, you can change host, username and password of your database too.
> Default database name is **front**
All tables create after running any page of applicaiton so dont worry.
### Database seeding
You can seed your database using  `seeder` file `front-project/php-actions/includes/seeder.php`. This file will create a test user with this credentials:
<br/>
  email: `test@testmail.com` <br/>
  password: `password`
