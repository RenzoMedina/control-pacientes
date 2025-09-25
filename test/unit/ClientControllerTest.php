<?php 

namespace Test\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Event\Code\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ClientControllerTest extends TestCase{

    #[Test]
    #[TestDox('Return status Patient create')]
    public function testClientCreate(){
        $mock = new MockHandler(
            [new Response(201,[], json_encode(['status' => 'Patient created'
            ])
        )]);
        $clientPatient = new Client(['handler'=> HandlerStack::create($mock)]);
        $request = $clientPatient->post(("/home/clients"),[
            "form_params"=>[
                "rut"=>"12.345.678-9",
                "name"=>"Juan Manuel",
                "last_name"=>"Peréz Quispe",
                "age"=>29,
                "weight"=>78.8,
                "size"=>1.75
            ]
        ]);
        $response = json_decode($request->getBody(), true);
        $this->assertEquals(201, $request->getStatusCode());
        $this->assertEquals("Patient created", $response['status']);
    }

}