<table id="historyTable" class="table caption-top">
  <caption>History of user</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Result</th>
      <th scope="col">Lives</th>
      <th scope="col">UserId</th>
      <th scope="col">Level</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "phpgame";

    // create connection 

    $connection = new mysqli($servername, $username, $password, $database);

    // Check if connection works
    if($connection -> connect_error) {
        die("Connection failed: " . $connection -> connect_error);
    }

    //read all row from database table

    $sql = "SELECT * FROM historypage";
    $result = $connection -> query($sql);

    // Check if query works
    if(!$result) {
        die("Invalid query: " . $connection->error);
    }

    //read data of each row

    while($row = $result -> fetch_assoc()){

        echo "<tr>
        <td>". $row["id"] ."</td>
        <td>". $row["date"] ."</td>
        <td>". $row["result"] ."</td>
        <td>". $row["lives"] ."</td>
        <td>". $row["userId"] ."</td>
        <td>". $row["level"] ."</td>
      </tr>";

    }


    ?>
 
  </tbody>
</table>