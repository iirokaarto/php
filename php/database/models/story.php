<?php


class Story 
{
    private $story_id;
    private $headline;
    private $article;
    private $published;
    private $hidedate;

    
    public function __construct()
    {
        $this->story_id = NULL;
        $this->headline = NULL;
        $this->article = NULL;
        $this->published = NULL;
        $this->hidedate = NULL;
    }
    
    
    public static function get_last_five_stories_and_name()
    {
        global $db;
        
        try 
        {
            $statement = $db->prepare("SELECT stories.story_id,stories.headline,stories.article,stories.published,stories.hidedate,stories.account_id,users.account_name FROM stories INNER JOIN users ON stories.account_id= users.account_id ORDER BY stories.published desc LIMIT 5;");
            
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        }
        catch (PDOException $e)
        {
              /* Exception (SQL error) */
              echo $e->getMessage();
              return FALSE;
        }    
     }


    public static function getStoryById($id)
    {
        global $db;
        
        try  {
            $statement = $db->prepare("SELECT * FROM stories WHERE story_id = ?");
            $statement->execute(array($id));
                    return $statement->fetchAll(PDO::FETCH_CLASS);
        }
        catch (PDOException $e)
        {
          /* Exception (SQL error) */
          echo $e->getMessage();
          return FALSE;
        }
    }
    public static function readstoriesById()
    {
        global $db;
        
        try  {
            $statement = $db->prepare("SELECT * FROM stories WHERE account_id = ?");
            $statement->execute(array($id));
                    return $statement->fetchAll(PDO::FETCH_CLASS);
        }
    
        catch (PDOException $e)
        {
          /* Exception (SQL error) */
          echo $e->getMessage();
          return FALSE;
        }
    }
    public static function getId()
    {
        global $db;
        
        try {
            $statement = $db->prepare("SELECT * FROM users WHERE account_id");
            $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
        }

    catch (PDOException $e)
    {
     /* Exception (SQL error) */
     echo $e->getMessage();
      return FALSE;
    }    
}
}
?>