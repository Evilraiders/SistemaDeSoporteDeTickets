<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\Ticket;
use App\Models\Comentario;

class MigrationTest extends TestCase
{
    use RefreshDatabase;


    public function test1RolesTableExists()
    {
        $this->assertTrue(Schema::hasTable('roles'));
    }
    
    public function test2RolesTableHasData()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
    
        $this->assertDatabaseHas('roles', [
            'name' => 'Admin',
        ]);
    }
    
    public function test3RolesTableCount()
    {
        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'User'],
            ['name' => 'Guest'],
        ]);
    
        $this->assertEquals(3, DB::table('roles')->count());
    }
    
    public function test4PrioridadesTableExists()
{
    $this->assertTrue(Schema::hasTable('prioridades'));
}

public function test5PrioridadesTableHasData()
{
    DB::table('prioridades')->insert([
        'name' => 'Alta',
    ]);

    $this->assertDatabaseHas('prioridades', [
        'name' => 'Alta',
    ]);
}

public function test6PrioridadesTableCount()
{
    DB::table('prioridades')->insert([
        ['name' => 'Alta'],
        ['name' => 'Media'],
        ['name' => 'Baja'],
    ]);

    $this->assertEquals(3, DB::table('prioridades')->count());
}

public function test7EstadosTableExists()
{
    $this->assertTrue(Schema::hasTable('estados'));
}

public function test8EstadosTableHasData()
{
    DB::table('estados')->insert([
        'name' => 'Activo',
    ]);

    $this->assertDatabaseHas('estados', [
        'name' => 'Activo',
    ]);
}

public function test9EstadosTableCount()
{
    DB::table('estados')->insert([
        ['name' => 'Activo'],
        ['name' => 'Inactivo'],
        ['name' => 'Pendiente'],
    ]);

    $this->assertEquals(3, DB::table('estados')->count());
}


public function test10AgentesTableExists()
{
    $this->assertTrue(Schema::hasTable('agentes'));
}

public function test11AgentesTableHasData()
{
    DB::table('agentes')->insert([
        'name' => 'Agent 1',
        'email' => 'agent1@example.com',
        'password' => bcrypt('password'),
    ]);

    $this->assertDatabaseHas('agentes', [
        'name' => 'Agent 1',
    ]);
}

public function test12AgentesTableCount()
{
    DB::table('agentes')->insert([
        ['name' => 'Agent 1', 'email' => 'agent1@example.com', 'password' => bcrypt('password')],
        ['name' => 'Agent 2', 'email' => 'agent2@example.com', 'password' => bcrypt('password')],
        ['name' => 'Agent 3', 'email' => 'agent3@example.com', 'password' => bcrypt('password')],
    ]);

    $this->assertEquals(3, DB::table('agentes')->count());
}

public function test13CategoriasTableExists()
{
    $this->assertTrue(Schema::hasTable('categorias'));
}

public function test14CategoriasTableHasData()
{
    DB::table('categorias')->insert([
        'name' => 'Category 1',
    ]);

    $this->assertDatabaseHas('categorias', [
        'name' => 'Category 1',
    ]);
}

public function test15CategoriasTableCount()
{
    DB::table('categorias')->insert([
        ['name' => 'Category 1'],
        ['name' => 'Category 2'],
        ['name' => 'Category 3'],
    ]);

    $this->assertEquals(3, DB::table('categorias')->count());
}

public function test16EtiquetasTableExists()
{
    $this->assertTrue(Schema::hasTable('etiquetas'));
}

public function test17EtiquetasTableHasData()
{
    DB::table('etiquetas')->insert([
        'name' => 'Tag 1',
    ]);

    $this->assertDatabaseHas('etiquetas', [
        'name' => 'Tag 1',
    ]);
}

public function test18EtiquetasTableCount()
{
    DB::table('etiquetas')->insert([
        ['name' => 'Tag 1'],
        ['name' => 'Tag 2'],
        ['name' => 'Tag 3'],
    ]);

    $this->assertEquals(3, DB::table('etiquetas')->count());
}

public function test19UsersTableExists()
    {
        $this->assertTrue(Schema::hasTable('users'));
    }
    
    public function test20UsersTableHasData()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
    

        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
    

        DB::table('users')->insert([
            'name' => 'User 1',
            'Rol_ID' => 1,
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
        ]);
    
   
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    
        $this->assertDatabaseHas('users', [
            'name' => 'User 1',
        ]);
    }
    
    public function test21UsersTableCount()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
    

        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'User'],
            ['name' => 'Guest'],
        ]);
    

        DB::table('users')->insert([
            ['name' => 'User 1', 'Rol_ID' => 1, 'email' => 'user1@example.com', 'password' => bcrypt('password')],
            ['name' => 'User 2', 'Rol_ID' => 2, 'email' => 'user2@example.com', 'password' => bcrypt('password')],
            ['name' => 'User 3', 'Rol_ID' => 3, 'email' => 'user3@example.com', 'password' => bcrypt('password')],
        ]);
    

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    
        $this->assertEquals(3, DB::table('users')->count());
    }
public function test22TicketsTableExists()
{
    $this->assertTrue(Schema::hasTable('tickets'));
}

public function test23TicketEtiquetaTableExists()
{
    $this->assertTrue(Schema::hasTable('ticket_etiqueta'));
}

public function test24TicketCategoriaTableExists()
{
    $this->assertTrue(Schema::hasTable('ticket_categoria'));
}

public function test25ComentariosTableExists()
{
    $this->assertTrue(Schema::hasTable('comentarios'));
}

public function test26TicketsTableHasData()
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

    // Activar restricciones de clave externa
    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    $this->assertDatabaseHas('tickets', [
        'title' => 'Ticket 1',
    ]);
}

public function test27TicketsTableCount()
{
    // Desactivar restricciones de clave externa
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
