<?php

require './database/models/Story.php';


class StoryController 
{
    protected $story;
    
    public function __construct()
    {
        $this->story = new Story();
    }
    
    public static function index()
    {
        $stories = Story::get_last_five_stories_and_name();
        require './views/index.view.php';
    }

    public static function readStory($id)
    {
        $story = Story::getStoryById($id);
        require './views/story.view.php';
    }
    public static function deleteStory($id,$user)
    {
        if(Story::delete_story($id)) $message = "juttu on poistettu";
        else $message="jutun poistaminen ei onnistu";
    }
// view
    public static function readstoriesById()
    {
    $account_id = $user->getId();
    $stories = Story::get_stories_by_id($account_id);
    require './views/index.view.php';

    }
    
}