<?php

use App\Models\Contato;
use App\Repositories\ContatoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContatoRepositoryTest extends TestCase
{
    use MakeContatoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContatoRepository
     */
    protected $contatoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->contatoRepo = App::make(ContatoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateContato()
    {
        $contato = $this->fakeContatoData();
        $createdContato = $this->contatoRepo->create($contato);
        $createdContato = $createdContato->toArray();
        $this->assertArrayHasKey('id', $createdContato);
        $this->assertNotNull($createdContato['id'], 'Created Contato must have id specified');
        $this->assertNotNull(Contato::find($createdContato['id']), 'Contato with given id must be in DB');
        $this->assertModelData($contato, $createdContato);
    }

    /**
     * @test read
     */
    public function testReadContato()
    {
        $contato = $this->makeContato();
        $dbContato = $this->contatoRepo->find($contato->id);
        $dbContato = $dbContato->toArray();
        $this->assertModelData($contato->toArray(), $dbContato);
    }

    /**
     * @test update
     */
    public function testUpdateContato()
    {
        $contato = $this->makeContato();
        $fakeContato = $this->fakeContatoData();
        $updatedContato = $this->contatoRepo->update($fakeContato, $contato->id);
        $this->assertModelData($fakeContato, $updatedContato->toArray());
        $dbContato = $this->contatoRepo->find($contato->id);
        $this->assertModelData($fakeContato, $dbContato->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteContato()
    {
        $contato = $this->makeContato();
        $resp = $this->contatoRepo->delete($contato->id);
        $this->assertTrue($resp);
        $this->assertNull(Contato::find($contato->id), 'Contato should not exist in DB');
    }
}
