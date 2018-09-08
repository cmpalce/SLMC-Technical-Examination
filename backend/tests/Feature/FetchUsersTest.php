<?php
namespace Tests\Feature; 
use Tests\TestCase;
use Mockery;
use stdClass;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Address;
use App\Geo;
use App\Company;
use App\RestApi;

class FetchUsersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function fetch_users()
    {
        $geo = new stdClass;
        $geo->lat = 12.2131;
        $geo->lng = 13.24123;
    
        $address = new stdClass;
        $address->street = 'test street';
        $address->suite = 'test suite';
        $address->city = 'test city';
        $address->zipcode = 'test zipcode';
        $address->geo = $geo;
        
        $company = new stdClass;
        $company->name = 'test name';
        $company->catchPhrase = 'test catchPhrase';
        $company->bs = 'test bs';
    
        $user = new stdClass;
        $user->id = 1;
        $user->name ='test name';
        $user->username = 'test username';
        $user->phone = 'test phone';
        $user->website = 'test website';
        $user->email = 'test@email.com';
        $user->address = $address;
        $user->company = $company;
    
        $restApi = Mockery::mock(RestApi::class);

        $restApi->shouldReceive('fetch')
                ->with('https://jsonplaceholder.typicode.com/users')
                ->once()
                ->andReturn([$user]);
 
        $this->app->instance(RestApi::class, $restApi); 

        $this->assertDatabaseMissing('users', ['name' => $user->name]);
        $this->assertDatabaseMissing('companies', ['name' => $company->name]);
        $this->assertDatabaseMissing('addresses', ['city' => $address->city]);

        $this->artisan('users:fetch');

        $this->assertDatabaseHas('users', ['name' => $user->name]);
        $this->assertDatabaseHas('companies', ['name' => $company->name]);
        $this->assertDatabaseHas('addresses', ['city' => $address->city]);
    }
}
