<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService {
    /**
     * Create customer in Database
     *
     * @param string $name
     * @param string $cpf
     * @param string $email
     * @return Customer
     */
    public function createCustomer(string $name, string $cpf, string|null $email)
    {
        $customer = new Customer();
        $customer->name = $name;
        $customer->cpf = $cpf;
        $customer->email = $email;
        $customer->save();

        return $customer;
    }

    /**
     * Get customer from database by id
     *
     * @param int $id
     * @return Customer|null
     */
    public function getCustomerById(int $id)
    {
        $customer = Customer::find($id);

        return $customer;
    }

    /**
     * Get customers from database, filters as params
     *
     * @param int $per_page
     * @param int $page
     * @param string $searchTerm
     * @param string $orderBy
     * @param string $orderDirection
     * @return Customer[]|null
     */
    public function getCustomers(int $per_page = 20, int $page = 0, string $searchTerm = '', string $orderBy = 'id', string $orderDirection = 'ASC'): array {
        $customers = Customer::
            orderBy($orderBy, $orderDirection)
            ->where('name', 'ILIKE', '%' . $searchTerm . '%')
            ->orWhere('cpf', 'ILIKE', '%' . $searchTerm . '%')
            ->orWhere('email', 'ILIKE', '%' . $searchTerm . '%')
            ->skip($per_page * $page)
            ->take($per_page)
            ->get();

        return $customers->all();
    }

    /**
     * Update customer in Database
     *
     * @param Customer $customer
     * @param string $name
     * @param string $cpf
     * @param string $email
     * @return Customer
     */
    public function updateCustomer(Customer $customer, string $name, string $cpf, string|null $email)
    {
        $customer->name = $name;
        $customer->cpf = $cpf;
        $customer->email = $email;
        $customer->save();

        return $customer;
    }

    /**
     * Delete customer in Database
     *
     * @param int $id
     * @return Customer
     */
    public function deleteCustomerById(int $id)
    {
        Customer::where('id', $id)->delete();
    }
}
