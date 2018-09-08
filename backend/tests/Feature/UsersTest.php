<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Address;
use App\Geo;
use App\Company;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function list_all_users()
    {
        $this->withoutExceptionHandling();

        $geo1 = factory(Geo::class)->create();
        $address1 = factory(Address::class)->create([
            'geoId' => function() use ($geo1) {
                return $geo1;
            }
        ]);
        $company1 = factory(Company::class)->create();
        $user1 = factory(User::class)->create([
            'addressId' => function() use ($address1) {
                return $address1;
            },
            'companyId' => function() use ($company1) {
                return  $company1;
            },
        ])->toArray();

        $response = $this->get('/api/users');
        $response->assertStatus(200);

        $address1 = $address1->toArray();
        $address1['geo'] = $geo1->toArray();
        $user1['address'] = $address1;
        $user1['company'] = $company1->toArray();

        $response->assertJson([$user1]);
    }
}
