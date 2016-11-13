<?php

namespace TransactionManager\Repository;

use TransactionManager\Model\Customer;

interface CustomerRepository {
	
	public function persist(Customer $customer);

}