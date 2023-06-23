<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function testTicketTablesAreCreated()
    {
        $this->artisan('migrate');

        $this->assertTrue(Schema::hasTable('tickets'));
        $this->assertTrue(Schema::hasTable('ticket_etiqueta'));
        $this->assertTrue(Schema::hasTable('ticket_categoria'));

        $this->assertTrue(Schema::hasColumn('tickets', 'Prioridad_ID'));
        $this->assertTrue(Schema::hasColumn('tickets', 'Estados_ID'));
        $this->assertTrue(Schema::hasColumn('tickets', 'Agentes_ID'));

        $this->assertTrue(Schema::hasColumn('ticket_etiqueta', 'ticket_id'));
        $this->assertTrue(Schema::hasColumn('ticket_etiqueta', 'etiqueta_id'));

        $this->assertTrue(Schema::hasColumn('ticket_categoria', 'ticket_id'));
        $this->assertTrue(Schema::hasColumn('ticket_categoria', 'categoria_id'));
    }

   
    

    public function testTicketsTableHasData()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('tickets')->insert([
            'title' => 'Ticket 1',
            'description' => 'Ticket 1 description',
            'archive' => 'path/to/archive',
            'Prioridad_ID' => 1,
            'Estados_ID' => 1,
            'Agentes_ID' => 1,
            'Fecha_Creacion' => now(),
            'Fecha_Actualizacion' => now(),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->assertDatabaseHas('tickets', [
            'title' => 'Ticket 1',
        ]);
    }

    public function testTicketsTableCount()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('tickets')->insert([
            [
                'title' => 'Ticket 1',
                'description' => 'Ticket 1 description',
                'archive' => 'path/to/archive',
                'Prioridad_ID' => 1,
                'Estados_ID' => 1,
                'Agentes_ID' => 1,
                'Fecha_Creacion' => now(),
                'Fecha_Actualizacion' => now(),
            ],
            [
                'title' => 'Ticket 2',
                'description' => 'Ticket 2 description',
                'archive' => 'path/to/archive',
                'Prioridad_ID' => 2,
                'Estados_ID' => 1,
                'Agentes_ID' => 2,
                'Fecha_Creacion' => now(),
                'Fecha_Actualizacion' => now(),
            ],
            [
                'title' => 'Ticket 3',
                'description' => 'Ticket 3 description',
                'archive' => 'path/to/archive',
                'Prioridad_ID' => 3,
                'Estados_ID' => 2,
                'Agentes_ID' => 3,
                'Fecha_Creacion' => now(),
                'Fecha_Actualizacion' => now(),
            ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->assertEquals(3, DB::table('tickets')->count());
    }
}
