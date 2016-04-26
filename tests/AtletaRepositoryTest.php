<?php

use App\Models\Atleta;
use App\Repositories\AtletaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AtletaRepositoryTest extends TestCase
{
    use MakeAtletaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AtletaRepository
     */
    protected $atletaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->atletaRepo = App::make(AtletaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAtleta()
    {
        $atleta = $this->fakeAtletaData();
        $createdAtleta = $this->atletaRepo->create($atleta);
        $createdAtleta = $createdAtleta->toArray();
        $this->assertArrayHasKey('id', $createdAtleta);
        $this->assertNotNull($createdAtleta['id'], 'Created Atleta must have id specified');
        $this->assertNotNull(Atleta::find($createdAtleta['id']), 'Atleta with given id must be in DB');
        $this->assertModelData($atleta, $createdAtleta);
    }

    /**
     * @test read
     */
    public function testReadAtleta()
    {
        $atleta = $this->makeAtleta();
        $dbAtleta = $this->atletaRepo->find($atleta->id);
        $dbAtleta = $dbAtleta->toArray();
        $this->assertModelData($atleta->toArray(), $dbAtleta);
    }

    /**
     * @test update
     */
    public function testUpdateAtleta()
    {
        $atleta = $this->makeAtleta();
        $fakeAtleta = $this->fakeAtletaData();
        $updatedAtleta = $this->atletaRepo->update($fakeAtleta, $atleta->id);
        $this->assertModelData($fakeAtleta, $updatedAtleta->toArray());
        $dbAtleta = $this->atletaRepo->find($atleta->id);
        $this->assertModelData($fakeAtleta, $dbAtleta->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAtleta()
    {
        $atleta = $this->makeAtleta();
        $resp = $this->atletaRepo->delete($atleta->id);
        $this->assertTrue($resp);
        $this->assertNull(Atleta::find($atleta->id), 'Atleta should not exist in DB');
    }
}
