<html>
    <head>
	<title>Sample PHP page</title>
    </head>
    <body>
	    <h1>Enter query or leave blank to see all results</h1>
	    
	    <h2>Query</h2>
	    <form action="" method="get">
		Name to find: <input name="name" type="text" /> <br/>
		<input type="submit" />
	    </form>

	    <h2>Records Found</h2>
		<?php
		
		try
		{
		    // Connect to the database.
		    $ok = mysql_connect("127.0.0.1", "root", "password");
		    if (!$ok) throw new Exception("Can't connect to database: " . mysql_error());

		    $ok = mysql_select_db("sample_db");
		    if (!$ok) throw new Exception("Can't select database: " . mysql_error());

		    // Basic query.
		    $query = "SELECT * FROM sample_table";

		    // Search for a name is supplied.
		    $nameToFind = $_GET["name"];
		    if (isset($nameToFind) and $nameToFind != "") $query .= " where name LIKE '%$nameToFind%'";

		    // Execute query, get results.
		    $result = mysql_query($query);
		    if (!$result) throw new Exception("Could not execute query: " . mysql_error());

		    // Fetch results of query.
		    echo "<blockquote>";
		    while($line = mysql_fetch_array($result, MYSQL_BOTH))
		    {
			echo("<p>");
			echo("Name: " . 	$line["name"] . "<br />");
			echo("Information: " . 	$line["info"]);
			echo("</p>");
		    };
		    echo "</blockquote>";

		    // Free the results object.
		    mysql_free_result($result);
		}
		
		//***************************************************
		// If an exception is thrown, this code will execute.
		//***************************************************
		
		catch(Exception $e) { 
		    echo "<hr />";
		    echo "<h1>Error thrown</h1>";
		    echo "<em>" . $e->getMessage() . "</em>";
		    ?>
    
		    <h2>To make this code work</h2>
		    <p>
			<ol>
			    <li>
				Create the database by logging into mysql and enter the following commands:
				<blockquote style="font-family:mono; font-size:.8em;">
				    create database sample_db;<br>
				    create table sample_db.sample_table (name varchar(25) NOT NULL,info varchar(25) NOT NULL);<br>
				    insert into sample_db.sample_table values("Ted Ward", "Human");<br>
				    insert into sample_db.sample_table values("Randy Ritchey", "Mostly Human");<br>
				</blockquote>
			    </li>
			    <li>
				Change the database password in the PHP code.
			    </li>
			</ol>
		    </p>
	      
		<?php
		}	// End the exception block.
		?>
	</body>
</html>
