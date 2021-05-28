
<!-- THE DATABASE  CONNECTION STRINGS (JUST AS IT IS IN .NET)
      THE CODE BELOW IS A PHP CODE
    THAT ENABLES A DATABASE CONECTION TO THE BACKEND -->
<?php
  
   $dsn = 'mysql:host=localhost;dbname=chirps'; /* $dsn => DATASOURCE NAME ,which consist of servername(host) 
                                                and databasename(dbname).In this case host is localhost
                                                  and dbname  is chirps **/
   $username = 'root';  // mysql username is root and stored in variable $username
   $password = 'root'; // mysql password  is root and stored in variable $password

   $db = new PDO($dsn, $username, $password); /* PDO => PHP DATA OBJECT, which is a class that enables
                                             an access/connection to the database.It normally 
                                             contains 3 arguments namely $dsn, $username, and $password
                                             The new keyword creates and an object of the class PDO 
                                              and stores in variable $db**/

   $query = "SELECT * FROM chirp"; /**once a connection is establisehed to the database,the "SELECT * FROM chirp"
                                   query selects all columns within the table chirp and stores the result
                                    in a variable called $query **/
   $statement = $db->prepare($query); /* the prepare method use the sql statement stored in variable $query 
                                      to connect with the database connection string , so as to initialize
                                       an execution of the command.This is stored in variable $statement **/
                                    
   $statement->execute();            // staement variable runs the query using the execute method
   $chirp = $statement->fetchAll();  /* fetchAll is a method that returns the records in all rows in the
                                        table.Forexample  if the table 'chirp' contains 4 records of id's and texts,then
                                         it will be extracted and stored in variablle $chirp **/
                                         //NOTE: variable names are user defined

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHIRPS</title>
</head>
<body>
    <h1><b>CHIRPS<b><h1>
    <ul>
        <?php foreach($chirp as $chirpp) :?> <!--the for each iterative statement is used to get 
                                                all records within the 'chirp' variable above, there is none left
                                                 and then stored in a new variable $chirpp 
                                                 Hence that is why we have '$chirp as $chirpp  -->

        <li style = "list-style:none"><?php  echo $chirpp['id'];?>--<?php echo $chirpp['texts'];?>.<br></li>
        
        <?php endforeach; ?>

        <!--Each of this record is displayed within the li element using the the word 'echo'.In php
         echo means display, so in english, the  statement above means: foreach of the records stored in 
         chirp, store it in a new variable called 'chirpp' and then display each of 
         this record within the li element-->
    
    </ul>
    
</body>
</html>