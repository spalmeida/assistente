<?php

namespace world;

class wConnect
{

	public function connectDB(...$params)
	{

		$params = $params[0];

		try {
			$conn = new \PDO(
				"mysql:host=$params[1];
				dbname=$params[2];
				charset=utf8",
				$params[3],
				$params[4]
			);

			$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			die(json_encode(array('Connection' => false, 'message' => 'Unable to connect')));
		}

		return $conn;
	}

	public function testeC(...$testeC)
	{
		return $testeC;
	}
}
