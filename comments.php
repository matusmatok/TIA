<?php
	if (session_status() !== PHP_SESSION_ACTIVE){
		session_start();
	}
	
	include "dbh.php";
	
	$sql = "SELECT user.name AS username, comments.comment AS comment FROM comments JOIN user ON comments.author_id = user.id WHERE tmid = '".$_POST['tmid']."' LIMIT 5";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while ($row = $result->fetch_assoc()){
			echo "<div id = 'comment'><h4>".$row['username']."</h4><pre id= 'commentBody'>".$row['comment']."</pre></div>";
		}
	}

?>