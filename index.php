<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <form action="index.php" method="GET">
    
        <label for="todo">AddTodo</label>
        <input id="name" type="text" name="name">
        <button type="Submit">submit</button>
        </form>
  <?php
$servername = 'localhost';
$username='root';
$password='';
$db ='todo';
$conn=mysqli_connect($servername,$username,$password,$db);

if(!conn){
    die("connection failed:" . mysqli_connect_error());
}
$sql='create database todo';

if ($conn->query($sql)) {
    echo 'successfully created database';
}else{
    echo ' Error with the query' . $conn->error;
}
$sql='create table todos(
    id int(6) auto_increment,
    name varchar(255)  ,
    primary key (id)
);
';
if ($conn->query($sql)) {
    echo 'successfully created table';
}else{
    echo ' Error with the query' . $conn->error;
}
$sql ="
insert into todos(name)
values 
('$_GET[name]')
";
if ($conn->query($sql)) {
    echo 'successfully inserted data';
}else{
    echo ' Error with the query' . $conn->error;
}
$sql=
"select * from todos;";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    echo "\n Your Todo's: \n";
    
    foreach($result as $info){
        echo "Todo: " . $info
        ['name']."<h2> My Todo list </h2>"; }}else{
    echo "there are no more Todo's";
}
 
?>
 
  

</body>
</html>
