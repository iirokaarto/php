<?php
require './Route.php'; // routing class
require './database/db.php'; // database connection

require './controllers/StoryController.php'; // controller
$storyController = new StoryController();

require './controllers/UserController.php'; // user controller
$userController = new UserController();

//every route gets its own controller or view
Route::add('/',function() {
    global $storyController;
    $storyController->index();    
},'get');


Route::add('/story/(.*)',function($id) use ($storyController){
    $storyController->readStory($id);
},'get');

Route::add('/register/',function() {
    require './views/registerform.view.php';
},'get');

Route::add('/register/',function() use ($userController) {
    $userController->register();
},'post');




//start...
Route::run('/');



?>