<!DOCTYPE html>
<html>
<head>
  <title>Test</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password, "test");

      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $query = "SELECT * FROM colors";
      $colors_con = mysqli_query($conn, $query);

      $colors_array = [];
      while($cRow = mysqli_fetch_array($colors_con)){
        array_push($colors_array, $cRow['color']);
      }
      
    ?>
    <h1>Colors</h1>
    <p>Click on the Color Name to see how many votes for that color.</p>
    <p>When you do click on Total , the sume of above numbers will show</p>

    <table id="main_table">
      <tr>
        <th>Color</th>
        <th>Votes</th>
      </tr>
      <?php
        foreach ($colors_array as $key => $color) {
      ?>
        <tr>
          <td class="color_name"><?php echo $color ?></td>
          <td class="votes_number"></td>
        </tr>
      <?php
        }
      ?>
      <tr>
          <td class="total_name">Total</td>
          <td class="total_number"></td>
        </tr>
    </table>
</body>
</html>