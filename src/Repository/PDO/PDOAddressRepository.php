<?php

namespace TransactionManager\Repository\PDO;

use PDO;
use TransactionManager\Repository\AddressRepository;
use TransactionManager\Model\Address;

final class PDOAddressRepository implements AddressRepository {

	private $conn;

	public function __construct(PDO $conn) {
		$this->conn = $conn;
	}

	public function persist(Address $address) {
		$stmt = $this->conn->prepare("INSERT INTO customer_address (customer_id, street) VALUES (?, ?)");
		
		if(!$stmt->execute(array(
			$address->getCustomer()->getId(), 
			$address->getStreet())))
			throw new \PDOException("Erro ao persistir endereço.");

		$address->setId((int) $this->conn->lastInsertId());	
	}

}