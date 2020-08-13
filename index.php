<?php
require './Route.php'; // routing class
require './database/db.php'; // database connection

require './controllers/StoryController.php'; // controller
$storyController = new StoryController();

//every route gets its own controller or view
Route::add('/',function() {
    global $storyController;
    $storyController->index();    
},'get');


Route::add('/story/(.*)',function($id) use ($storyController){
    $storyController->readStory($id);
},'get');


//start...
Route::run('/');



?>