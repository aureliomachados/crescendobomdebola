<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContatoApiTest extends TestCase
{
    use MakeContatoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateContato()
    {
        $contato = $this->fakeContatoData();
        $this->json('POST', '/api/v1/contatos', $contato);

        $this->assertApiResponse($contato);
    }

    /**
     * @test
     */
    public function testReadContato()
    {
        $contato = $this->makeContato();
        $this->json('GET', '/api/v1/contatos/'.$contato->id);

        $this->assertApiResponse($contato->toArray());
    }

    /**
     * @test
     */
    public function testUpdateContato()
    {
        $contato = $this->makeContato();
        $editedContato = $this->fakeContatoData();

        $this->json('PUT', '/api/v1/contatos/'.$contato->id, $editedContato);

        $this->assertApiResponse($editedContato);
    }

    /**
     * @test
     */
    public function testDeleteContato()
    {
        $contato = $this->makeContato();
        $this->json('DELETE', '/api/v1/contatos/'.$contato->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/contatos/'.$contato->id);

        $this->assertResponseStatus(404);
    }
}
