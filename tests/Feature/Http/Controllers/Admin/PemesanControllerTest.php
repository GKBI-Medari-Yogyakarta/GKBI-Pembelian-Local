<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Model\Pemesan;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PemesanControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = \factory(User::class)->create();
        $pemesan = \factory(Pemesan::class)->create();
        $response = $this->actingAs($user)
            ->post(\route('admin-pemesan.store'), [
                // 'name' => $this->faker->words(3, \true),
                // 'email' => $this->faker->unique()->safeEmail,
                // 'password' => $this->Hash::make('password'),
                'name' => ('pemesan'),
                'email' => ('pemesan@mail.com'),
                'password' => Hash::make('pemesan'),
            ]);
        $response->assertStatus(302);
        $response->assertRedirect(\route('admin.user-pemesan.index'));
    }
}
