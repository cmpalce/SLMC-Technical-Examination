<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Geo;
use App\Address;
use App\Company;
use App\User;
use App\RestApi;

use DB;

class FetchUsers extends Command
{
    protected $signature = 'users:fetch';

    protected $description = 'Fetch all users in https://jsonplaceholder.typicode.com/users';

    private $restApi;

    public function __construct(RestApi $restApi)
    {
        parent::__construct();
        $this->restApi = $restApi;
    }

    public function handle()
    {
        $this->info("fetcing https://jsonplaceholder.typicode.com/users");

        $users = $this->restApi->fetch('https://jsonplaceholder.typicode.com/users');
        $this->info("fetch done");
        $this->info("inserting to db");

        foreach ($users as $user) {
            DB::transaction(function () use  ($user) {
                $geo = (new Geo())->storeFromApi($user);
                $address = (new Address())->storeFromApi($user, $geo->id);
                $company = (new Company())->storeFromApi($user);
                (new User())->storeFromApi($user, $address->id, $company->id);
            });
        }

        $this->info("db insertion done");
    }
}
