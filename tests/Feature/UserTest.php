<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserTest extends TestCase
{

    public function test_register(){

        Artisan::call('migrate');

        $carga = $this->get(route('register'));
        $carga ->assertStatus(200)->assertSee('register');

        $registroMal = $this->post(route('register'),["email"=>"aaa", "password"=>"123"]);
        $registroMal-> assertStatus(302)->assertRedirect(route('registerPost'))->assertSessionHasErrors([
            'name' => __('validation.required',['attribute' => 'name']),
            'email' => __('validation.email',['attribute'=>'email']),
            'password' => __('validation.min.string',['attribute'=>'password', 'min' => 6])
        ]);


        $registroBien = $this->post(route('register'),['email' => "Cris1997@gmail.com",
        'password' => "Password1",'name' => "Testing",]);
        $registroBien->assertStatus(302)->assertRedirect(route('register'));
        $this->assertDatabaseHas('users',['email'=>"Cris1997@gmail.com"]);
    }


    public function test_login(){
        Artisan::call('migrate');

        User::create(["name" =>"Test", "email"=>"test123@gmail.com","password"=>Hash::make('Password1'),"Rol_ID" => 1,]);

        $carga = $this->get(route('login'));
        $carga ->assertStatus(200)->assertSee('login');

        $response = $this->post(route('login'), [
            'email' => 'Test',
            'password' => 'No es',
        ]);
    
        $response->assertStatus(302)
            ->assertRedirect(route('loginPost'))
            ->assertSessionHasErrors(['error' => 'Correo electrónico o contraseña incorrectos']);
    

            $accesoBien = $this->post(route('loginPost'),['email' => "Cris1997@gmail.com",
            'password' => "Password1",'name' => "Testing",]);
            $accesoBien->assertStatus(302)->assertRedirect(route('login'));

            $logout = $this->delete('logout');
            $logout->assertStatus(302)->assertRedirect(route('login'));

            $Userdestroy = $this->delete('user.destroy');
    }


}
