<?php


		$reply_contents = isset($_SESSION['reply_contents']);

		for ($i=0; $i < strlen($reply_contents); $i++) 
		{ 

			$substr_contents = substr($reply_contents, $i);

			if ($substr_contents = "'") 
			{
				substr_replace($substr_contents, "\'\'", $i);

				$i += $i + 1;
			}
		}
		