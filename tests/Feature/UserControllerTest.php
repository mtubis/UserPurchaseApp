<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Purchase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Seed test data
        User::factory()
            ->has(Purchase::factory()->count(3))
            ->count(10)
            ->create();
    }

    public function testUsersWithLastPurchaseDate()
    {
        $response = $this->get(route('users.last_purchase_date'));

        $response->assertStatus(200);
        $response->assertViewHas('users');
    }

    public function testUsersSortedByBirthday()
    {
        $user1 = User::factory()->create(['birthdate' => '1990-01-15']);
        $user2 = User::factory()->create(['birthdate' => '1990-02-20']);
        $user3 = User::factory()->create(['birthdate' => '1990-01-10']);

        $response = $this->get(route('users.sorted_by_birthdate'));

        $response->assertStatus(200);
        $response->assertViewIs('users.sorted_by_birthdate');
        $response->assertViewHas('users', function ($users) use ($user1, $user2, $user3) {
            return $users[0]->id === $user3->id && $users[1]->id === $user1->id && $users[2]->id === $user2->id;
        });
    }

    public function testUsersWithBirthdaysThisWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Users with birthdays this week
        $user1 = User::factory()->create(['birthdate' => $startOfWeek->copy()->addDay(1)->toDateString()]);
        $user2 = User::factory()->create(['birthdate' => $startOfWeek->copy()->addDay(2)->toDateString()]);
        $user3 = User::factory()->create(['birthdate' => $endOfWeek->copy()->subDay(1)->toDateString()]);

        // Users with birthdays outside this week
        $user4 = User::factory()->create(['birthdate' => $startOfWeek->copy()->subDay(1)->toDateString()]);
        $user5 = User::factory()->create(['birthdate' => $endOfWeek->copy()->addDay(1)->toDateString()]);

        $response = $this->get(route('users.birthdays_this_week'));

        $response->assertStatus(200);
        $response->assertViewIs('users.birthdays_this_week');
        $response->assertViewHas('users', function ($users) use ($user1, $user2, $user3, $user4, $user5) {
            return $users->contains($user1) && $users->contains($user2) && $users->contains($user3) && !$users->contains($user4) && !$users->contains($user5) &&
                $users[0]->is($user1) && $users[1]->is($user2) && $users[2]->is($user3);
        });
    }
}
