<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AtletaApiTest extends TestCase
{
    use MakeAtletaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAtleta()
    {
        $atleta = $this->fakeAtletaData();
        $this->json('POST', '/api/v1/atletas', $atleta);

        $this->assertApiResponse($atleta);
    }

    /**
     * @test
     */
    public function testReadAtleta()
    {
        $atleta = $this->makeAtleta();
        $this->json('GET', '/api/v1/atletas/'.$atleta->id);

        $this->assertApiResponse($atleta->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAtleta()
    {
        $atleta = $this->makeAtleta();
        $editedAtleta = $this->fakeAtletaData();

        $this->json('PUT', '/api/v1/atletas/'.$atleta->id, $editedAtleta);

        $this->assertApiResponse($editedAtleta);
    }

    /**
     * @test
     */
    public function testDeleteAtleta()
    {
        $atleta = $this->makeAtleta();
        $this->json('DELETE', '/api/v1/atletas/'.$atleta->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/atletas/'.$atleta->id);

        $this->assertResponseStatus(404);
    }
}
