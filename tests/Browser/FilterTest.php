<?php

namespace Tests\Browser;

use App\Models\Type;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FilterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSearchFilter(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('search', 'Pikachu')
                ->waitForText('Pikachu')
                    ->assertSee('Laravel');
        });
    }

    public function testTypeFilter()
    {
        $this->browse(function (Browser $browser) {
            $type = Type::first();
            $browser->visit('/')
                ->select('type', $type->name)
                ->waitForText($type->name)
                ->assertSee($type->name);
        });
    }
}
