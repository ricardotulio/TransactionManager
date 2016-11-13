<?php

namespace TransactionManager\Repository\PDO;

use PDO;
use TransactionManager\Repository\CustomerRepository;
use TransactionManager\Model\Customer;

final class PDOCustomerRepository implements CustomerRepository {

	private $conn;

	public function __construct(PDO $conn) {
		$this->conn = $conn;
	}

	public function persist(Customer $customer) {
		$stmt = $this->conn->prepare("INSERT INTO customer (name) VALUES (?)");
		
		if(!$stmt->execute(array($customer->getName())))
			throw new \PDOException("Erro ao persistir endereço.");

		$customer->setId((int) $this->conn->lastInsertId());
	}

}