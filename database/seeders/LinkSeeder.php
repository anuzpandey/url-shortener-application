<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LinkSeeder extends Seeder
{

    public function run(): void
    {
        Link::factory(100)->create(
            ['created_at' => now()->subDays(random_int(1, 20))->format('Y-m-d H:i:s')]
        )
            ->each(function (Link $link) {

                $data = [
                    'viewable_id' => $link->id,
                    'viewable_type' => Link::class,
                ];

                $records = [];

                for ($i = 0; $i < random_int(1, 10); $i++) {
                    $records[] = [
                        ...$data,
                        'visitor' => Str::random(80),
                        'viewed_at' => now()->subDays(random_int(1, 10))->format('Y-m-d H:i:s'),
                    ];
                }

                DB::table('views')->insert($records);
            });
    }
}
