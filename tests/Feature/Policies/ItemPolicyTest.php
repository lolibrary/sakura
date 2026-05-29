<?php

namespace Tests\Feature\Policies;

use App\Models\Item;
use App\Models\User;
use Tests\TestCase;

class ItemPolicyTest extends TestCase
{
    private function makeUser(string $state = null): User
    {
        $factory = User::factory();

        if ($state !== null) {
            $factory = $factory->{$state}();
        }

        $payload = $factory->raw();

        return User::unguarded(function () use ($payload) {
            return new User($payload);
        });
    }

    private function makeItem(string $state, array $attributes = []): Item
    {
        $factory = Item::factory()->{$state}();
        $payload = $factory->raw($attributes);

        return Item::unguarded(function () use ($payload) {
            return new Item($payload);
        });
    }

    public function test_junior_users_can_delete_their_drafts()
    {
        $user = $this->makeUser('junior');
        $item = $this->makeItem('draft', ['user_id' => $user->id]);

        $this->assertTrue($user->can('delete', $item));
    }

    public function test_junior_users_cannot_delete_other_drafts()
    {
        $user = $this->makeUser('junior');
        $item = $this->makeItem('draft', ['user_id' => uuid4()]);

        $this->assertFalse($user->can('delete', $item));
    }

    public function test_junior_users_cannot_delete_published_items()
    {
        $user = $this->makeUser('junior');

        $item1 = $this->makeItem('published', ['user_id' => $user->id]);
        $item2 = $this->makeItem('published', ['user_id' => uuid4()]);

        $this->assertFalse($user->can('delete', $item1));
        $this->assertFalse($user->can('delete', $item2));
    }

    public function test_regular_users_cannot_delete_items()
    {
        $user = $this->makeUser();

        $item1 = $this->makeItem('published', ['user_id' => $user->id]);
        $item2 = $this->makeItem('published', ['user_id' => uuid4()]);
        $item3 = $this->makeItem('draft', ['user_id' => $user->id]);
        $item4 = $this->makeItem('draft', ['user_id' => uuid4()]);

        $this->assertFalse($user->can('delete', $item1));
        $this->assertFalse($user->can('delete', $item2));
        $this->assertFalse($user->can('delete', $item3));
        $this->assertFalse($user->can('delete', $item4));
    }

    public function test_lolibrarians_can_delete_their_drafts()
    {
        $user = $this->makeUser('lolibrarian');

        $item1 = $this->makeItem('draft', ['user_id' => $user->id]);

        $this->assertTrue($user->can('delete', $item1));
    }

    public function test_lolibrarians_cannot_delete_other_drafts()
    {
        $user = $this->makeUser('lolibrarian');

        $item1 = $this->makeItem('draft', ['user_id' => uuid4()]);

        $this->assertFalse($user->can('delete', $item1));
    }

    public function test_lolibrarians_cannot_delete_published_items()
    {
        $user = $this->makeUser('lolibrarian');

        $item1 = $this->makeItem('published', ['user_id' => $user->id]);
        $item2 = $this->makeItem('published', ['user_id' => uuid4()]);

        $this->assertFalse($user->can('delete', $item1));
        $this->assertFalse($user->can('delete', $item2));
    }

    public function test_senior_lolibrarians_can_delete_any_item()
    {
        $user = $this->makeUser('senior');

        $item1 = $this->makeItem('published', ['user_id' => $user->id]);
        $item2 = $this->makeItem('published', ['user_id' => uuid4()]);
        $item3 = $this->makeItem('draft', ['user_id' => $user->id]);
        $item4 = $this->makeItem('draft', ['user_id' => uuid4()]);

        $this->assertTrue($user->can('delete', $item1));
        $this->assertTrue($user->can('delete', $item2));
        $this->assertTrue($user->can('delete', $item3));
        $this->assertTrue($user->can('delete', $item4));
    }

    public function test_admins_can_delete_any_item()
    {
        $user = $this->makeUser('admin');

        $item1 = $this->makeItem('published', ['user_id' => $user->id]);
        $item2 = $this->makeItem('published', ['user_id' => uuid4()]);
        $item3 = $this->makeItem('draft', ['user_id' => $user->id]);
        $item4 = $this->makeItem('draft', ['user_id' => uuid4()]);

        $this->assertTrue($user->can('delete', $item1));
        $this->assertTrue($user->can('delete', $item2));
        $this->assertTrue($user->can('delete', $item3));
        $this->assertTrue($user->can('delete', $item4));
    }

    public function test_developers_can_delete_any_item()
    {
        $user = $this->makeUser('developer');

        $item1 = $this->makeItem('published', ['user_id' => $user->id]);
        $item2 = $this->makeItem('published', ['user_id' => uuid4()]);
        $item3 = $this->makeItem('draft', ['user_id' => $user->id]);
        $item4 = $this->makeItem('draft', ['user_id' => uuid4()]);

        $this->assertTrue($user->can('delete', $item1));
        $this->assertTrue($user->can('delete', $item2));
        $this->assertTrue($user->can('delete', $item3));
        $this->assertTrue($user->can('delete', $item4));
    }

    public function test_lolibrarians_can_delete_items_they_published()
    {
        $user = $this->makeUser('lolibrarian');

        $item1 = $this->makeItem('published', ['user_id' => $user->id]);
        $item2 = $this->makeItem('published', ['user_id' => uuid4()]);

        $this->assertFalse($user->can('delete', $item1));
        $this->assertFalse($user->can('delete', $item2));

        $item1->publisher_id = $user->id;
        $item2->publisher_id = $user->id;

        $this->assertTrue($user->can('delete', $item1));
        $this->assertTrue($user->can('delete', $item2));
    }
}
