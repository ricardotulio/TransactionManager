<?php

namespace TransactionManager\Model;

class Address {

	private $id;

	private $customer;

	private $street;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getCustomer() {
		return $this->customer;
	}

	public function setCustomer($customer) {
		$this->customer = $customer;
	}

	public function getStreet() {
		return $this->street;
	}

	public function setStreet($street) {
		$this->street = $street;
	}

}