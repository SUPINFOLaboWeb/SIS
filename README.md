# SIS
Site Inter SIS


# Installation

- Clone the project
- Install all dependencies with composer by using composer install
```sh 
cd ./SIS
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install
npm install bower gulp -g
npm install
bower install
gulp
```

URI                | HTTP Method | Response   | Action
------------------ | ----------- | ---------- | -------------
/user/login        | GET         |            | Login
/user/login        | POST        |            | Post login
/user/register     | GET         |            | Register
/user/register     | POST        |            | Post Register
/users             | GET         | [{user}]   | List the users
/users/:id         | GET         | {user}     | Get one user
/users/:id         | PUT         |            | Update user
/users/:id         | DELETE      |            | Delete user
/posts             | GET         | [{post}]   | List the posts
/posts/:id         | GET         | {post}     | Get one post
/posts/:id         | POST        |            | Create one post

/posts?campus=:id&page=:page
GET, POST /posts/:id/comments
GET, PUT, DELETE /posts/:id/comments/:id_comment

/projects?campus=:id&page=:page
/projects/:id/tasks
/projects/
PUT /projects/:id/technologies
PUT /projects/:id/managers
PUT /projects/:id/documents

/documents
/loan

TODO: login fail -> renvoyer json error
