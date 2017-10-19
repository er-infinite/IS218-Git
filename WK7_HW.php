<?php
echo "<h1>Week 7 Homework - PDO Practice</h1>";
$hostname = "sql.njit.edu";
$username = "elr9";
$password = "barnes26";
try {

		//--------------------- [DEFINE PDO] ---------------------
	    $conn = new PDO("mysql:host=$hostname;dbname=elr9",
	    $username, $password);
	    echo "Connected successfully <br><br><br><br>"; 
	    // echo "<br><br>";
	    //--------------------------------------------------------

	    $sql = "SELECT id,email,fname,lname,phone,birthday,gender,password FROM accounts WHERE id < 6";
	    $q = $conn->prepare($sql);
	    $q->execute();
	    $results = $q->fetchAll();

	    // $sql2 = "SELECT count(id) FROM accounts WHERE id < 6"; 
	    // $q = $conn->prepare($sql2);
	    // $q->execute();
	    // $results = $q->fetchAll();

	    // $id = 1;
	    // $sql = "select id,email from accounts where id = '$id' ";
	    // $q = $conn->prepare($sql);
	    // $q->execute();

	    if($q->rowCount()){
	    	$rows = count($results);
	    	echo "Number of records displayed: $rows &lt;br> <br><br>";

	    	echo "<table border=\"1\">
	    			<tr>
	    				<th>ID</th>
	    				<th>Email</th>
	    				<th>First Name</th>
	    				<th>Last Name</th>
	    				<th>Phone</th>
	    				<th>Birthday</th>
	    				<th>Gender</th>
	    				<th>Password</th>
    				</tr>";
	    	foreach ($results as $row) {
        		echo "<tr>
        				<td>" . $row["id"] . "</td>
        				<td>" . $row["email"]  . "</td>
        				<td>" . $row["fname"]  . "</td>
        				<td>" . $row["lname"]  . "</td>
        				<td>" . $row["phone"]  . "</td>
        				<td>" . $row["birthday"]  . "</td>
        				<td>" . $row["gender"]  . "</td>
        				<td>" . $row["password"]  . "</td>
    				  </tr>";
    		}
    		$row_count = $results->rowCount();
    		echo $row_count;
	    }else{
	    	echo '0 results';
	    } 




	}//END TRY BLOCK


// 	    $date = date('Y-m-d', time());
// 	    $sql ="INSERT INTO accounts (email,fname,lname,phone,birthday,gender,password)
//     	VALUES ('john@example.com','John', 'Doe',911,'$date','M','1234')";
//     	$q = $conn->prepare($sql);
//     	$q->execute();
// 	    $sql = "select id,email from accounts";
// 	    $q = $conn->prepare($sql);
// 	    $q->execute();
// 	    $results = $q->fetchAll();
// 	    if($q->rowCount()){
// 	    	echo "<table border=\"1\"><tr><th>ID</th><th>Email</th></tr>";
// 	    	foreach ($results as $row) {
//         		echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td></tr>";
//     		}
// 	    }else{
// 	    	echo '0 results';
// 	    }
//     }
catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }//END CATCH BLOCK

$conn = null;


?>