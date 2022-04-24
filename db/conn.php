<?Php
    $host = '127.0.0.1';
    $db = 'attendance';
    $user = 'root';
    $password = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo 'Hello Database!';
    }catch(PDOException $e){
        throw new PDOException($e->getMessage());
        echo "<h1 class='text-success'>No Database Found</h1>";
        // echo "<p class='text-center'>Copywright &copy; 1999-" .date("Y")." PHP Masterclass</p>";

        


    }
    require_once 'crud.php';
    require_once 'user.php';
    $user = new user($pdo);
    $crud = new crud($pdo);

    $user -> insertUser("admin", "password");
    


?>
