<?php

namespace TransactionManager\Repository;

use TransactionManager\Model\Address;

interface AddressRepository {

	public function persist(Address $address);

}