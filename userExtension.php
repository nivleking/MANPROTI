<?php
    require 'connect.php';

    // var_dump($_POST);
	if (isset($_POST['deleteUser'])) {
		if (isset($_POST['team_name'])) {
			$id = htmlspecialchars($_POST['team_name']);
			$query = "DELETE FROM user WHERE team_name = '$id'";
			$result = mysqli_query($con, $query);
			if (mysqli_affected_rows($con) > 0) {
				echo "1";
				exit();
			} else {
				echo "2";
                exit();
			}
            exit();
		}
	}

	if (isset($_POST['register'])) {
		$username = htmlspecialchars($_POST['teamUserName']);
		$password = htmlspecialchars($_POST['teamPassword']);
		$confirmPassword = htmlspecialchars($_POST['teamPasswordConfirm']);
		$resultAll = mysqli_query($con, "SELECT * FROM user");

		while ($row = mysqli_fetch_assoc($resultAll)) {
			if ($row['team_name'] === $username) {
                echo "1";
				exit();
			}
		}

		if ($password !== $confirmPassword) {
			echo "2";
			exit();
		} else {
			$layout = [
				[
					[0, 0, 0],
					[0, 0, 0],
					[0, 0, 0]
				],
				[
					[0, 0, 0],
					[0, 0, 0],
					[0, 0, 0]
				],
				[
					[0, 0, 0],
					[0, 0, 0],
					[0, 0, 0]
				]
			];
			$layout = json_encode($layout);

			$query = "INSERT INTO user VALUES('$username','$password', '$layout',0,0,'SBY',0)";
			$result = mysqli_query($con, $query);
			echo "3";
            exit();
		}
        exit();
	}
?>