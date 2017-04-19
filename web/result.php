<?php
//Host, Username, and your password to the SQL Database//Default variable to output the output
$output = '';

$servername = "sfsuse.com";
$username = "sp17g07";
$password = "csc648sp17g07";// Create connection
$conn = new mysqli($servername, $username, $password);// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

/*
$host="sfsuse.com";
$user="bchiong";
$password="913389274";
$db="sfsuse_db";
$connection =  mysqli_connect($host,$user,$password,$db);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
*/
/*
//Collecting data for the SQL
//If the search has been posted to the website..
//Assign search Q = to the search bar that has been posted
if (isset($_POST['search']))
{
   $searchq = $_POST['search'];
   //Only allow the search q to have numbers 0-9 or a-z in the input
   $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);    //SELECT FOROM TABLE
   $query = mysqli_query("SELECT * FROM test WHERE firstname LIKE '$searchq%' ") or die("Nothing found to match");    //Output failed if there were no search results
   //Get the number of rows from the SQL query
   $count = mysqli_num_rows($query);
   if ($count == 0)
   {
       $output = 'There were no search results stupid!';
   }    else
   {
   // while loop collect information we want
       while ($row = mysqli_fetch_array($query))
           {
               $fname = $row['firstname'];
               $output .= '<div>'.$fname.';
           }
   }
}
*/
?><form action = "results.php" method = "post">
    <input type = "text" name = "search" placeholder = "Search for Members..." /><br />
    <input type = "submit" value = ">>"/>
</form><?php print("$output");?>
