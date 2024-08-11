<?php
declare(strict_types=1);
// use PDO;
class Home
{
//fetch_assoc-index array  by column name each row is associacted aray and fecth_class ->fetch rows object as given class name ass another arguments fetch_obj tech as object
    public function index()
    {
       try{
        $db = new PDO('mysql:host=localhost;dbname=my_db','root','',[
            // PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_OBJ
        ]);  // for fetching the default mmod
        // $stmt = $db->query($query); 
        //it will retrn object
        // var_dump($stmt->fetchAll());
        $email = 'mawdhu122@gmail.com';
        $name ='madhu';
        $is_active = 1;
        $created_at= date('Y-m-d H:m:i', strtotime('07/08/2024 9:00PM'));
        // $query = 'SELECT * FROM users WHERE email = ?';  
        $query = 'INSERT INTO users (email,full_name,is_active,created_at,updated_at) VALUES (:email,:name,:active,:date,:date)' ;  

        echo $query .'<br>';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':name',$name);
        $stmt->bindValue(':email',$email);
        $stmt->bindParam(':active',$is_active, PDO::PARAM_BOOL);
        $stmt->bindValue(':date',$created_at);

        $stmt->execute();
        $id = $db->lastInsertId();
        $user = $db->query('SELECT * FROM users WHERE id= '.$id)->fetch();
        // foreach( as $user){
            // echo '<pre>';
            // var_dump($user);
            // echo '</pre>';
        // }
         echo '<pre>';
 var_dump($user);
 echo '</pre>';
       } catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), $e->getCode());
       }

        var_dump($db);
    }

}
$home = new Home();
$home->index();