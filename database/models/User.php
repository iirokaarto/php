<?php
// Modified from https://alexwebdevelop.com/user-authentication/
class User {
    
    private $id; //KIRJAUTUNEEN KÄYTTÄJÄN id TAI null
    private $name; //Kirjautuneen käyttäjän account_name tai NULL
    private $last_name;
    private $first_name;
    private $account_passwd;
    
    public function __construct() // Alustetaan arvoiksi NULL
    {
        $this->id = NULL;
        $this->name = NULL;
        $this->last_name = NULL;
        $this->first_name = NULL;
    }

    public function __destruct() //tuhoaja - ei toteutettu
    {
        
    }    

    public function addAccount(string $last_name,string $first_name,string $name, string $passwd): int
    {
        global $db;
        
        if (!is_null($this->getIdFromName($name,$db))) //tarkistaa, ettei kenelläkä'än muulla ole samaa nimeä
        {
            throw new Exception('User name not available');
        }

        $sql = 'INSERT INTO users (last_name,first_name,account_name, account_passwd) VALUES (:last_name, :first_name, :name, :passwd)';
        $values = array(':last_name' => $last_name, ':first_name' => $first_name, ':name' => $name, ':passwd' => $passwd);
        try
        {
            $res = $db->prepare($sql);
            $res->execute($values);
        }
        catch (PDOException $e) //If there is a PDO exception, throw a standard exception
        {
           throw new Exception('Database query error');
        }
        return $db->lastInsertId();        //palauttaa uuden id:n
    }
    
    
    public function getIdFromName(string $name): ?int  //jos jollakulla käyttäjällä on sama nimi, palauttaa sen id:n, muuten NULL
    {
        global $db;
                
        $id = NULL;/* Alustaa palautusarvon - jos ei onnistu, palauttaa NULL */
    
        $query = 'SELECT account_id FROM users WHERE (account_name = :name)';//    Hakee ID:tä
        $values = array(':name' => $name);
        try
        {
            $res = $db->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e) // jos tulee virhe, palauttaa standardi-ilmoituksen
        {
           throw new Exception('Database query error');
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);

        if (is_array($row)) //         There is a result: get it's ID 
        {
            $id = intval($row['account_id'], 10);
        }
        return $id;
    }
}