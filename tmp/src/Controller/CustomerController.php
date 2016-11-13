<?php

namespace TransactionManager\Controller;

use TransactionManager\Model\Customer;
use TransactionManager\Model\Address;
use TransactionManager\Repository\CustomerRepository;
use TransactionManager\Repository\AddressRepository;
use TransactionManager\Annotations\Transactional;

class CustomerController__AopProxied {

	private $customerRepository;
	private $addressRepository;

	public function __construct(CustomerRepository $customerRepository, AddressRepository $addressRepository) {
		$this->customerRepository = $customerRepository;
		$this->addressRepository = $addressRepository;
	}

	/**
	 * @Transactional
	 */
	public function post() {
		$customer = new Customer();
		$customer->setName("ricardoledo");
		$this->customerRepository->persist($customer);

		$address = new Address();
		$address->setCustomer($customer);
		$address->setStreet("Rua Mangaíba");

		$this->addressRepository->persist($address);
	}

}

include_once AOP_CACHE_DIR . '/_proxies/src/Controller/CustomerController.php';

