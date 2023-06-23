<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComentariosTableTest extends TestCase
{
    use RefreshDatabase;

    public function test22ComentariosTableExists()
    {
        $this->assertTrue(Schema::hasTable('comentarios'));
    }
    
    public function test23ComentariosTableHasData()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
    
        DB::table('roles')->insert(['name' => 'Admin']);
    
        DB::table('users')->insert([
            'name' => 'User 1',
            'Rol_ID' => 1,
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
        ]);
    
        $ticketId = DB::table('tickets')->insertGetId([
            'title' => 'Ticket 1',
            'description' => 'Ticket 1 description',
            'archive' => 'path/to/archive',
            'Prioridad_ID' => 1,
            'Estados_ID' => 1,
            'Agentes_ID' => 1,
            'Fecha_Creacion' => now(),
            'Fecha_Actualizacion' => now(),
        ]);
    
        $userId = 1;
    
        DB::table('comentarios')->insert([
            'Ticket_ID' => $ticketId,
            'Usuario_ID' => $userId,
            'Content' => 'Este es un comentario de prueba',
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    
        $this->assertDatabaseHas('comentarios', [
            'Ticket_ID' => $ticketId,
            'Usuario_ID' => $userId,
        ]);
    }
    
    public function test24ComentariosTableCount()
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
    
        $ticketId = DB::table('tickets')->insertGetId([
            'title' => 'Ticket 1',
            'description' => 'Ticket 1 description',
            'archive' => 'path/to/archive',
            'Prioridad_ID' => 1,
            'Estados_ID' => 1,
            'Agentes_ID' => 1,
            'Fecha_Creacion' => now(),
            'Fecha_Actualizacion' => now(),
        ]);
    
        $usersCount = DB::table('users')->count();
    
        $comentariosData = [];
        for ($i = 1; $i <= $usersCount; $i++) {
            $comentariosData[] = [
                'Ticket_ID' => $ticketId,
                'Usuario_ID' => $i,
                'Content' => 'Este es un comentario de prueba',
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
        DB::table('comentarios')->insert($comentariosData);
    
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    
        $this->assertEquals($usersCount, DB::table('comentarios')->count());
    }
    
    
}



