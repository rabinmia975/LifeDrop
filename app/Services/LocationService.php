<?php

namespace App\Services;

use App\Models\Division;
use Illuminate\Support\Facades\Cache;

class LocationService
{
    /**
     * Nested location tree for the cascading dropdowns:
     * [ 'ঢাকা' => ['name' => 'ঢাকা', 'districts' => [ 'ঢাকা' => ['name' => ..., 'upazilas' => [...]] ] ] ]
     */
    public static function tree(): array
    {
        return Cache::rememberForever('bd_locations_tree', function () {
            $tree = [];

            Division::with('districts.upazilas')->orderBy('name')->get()->each(function ($division) use (&$tree) {
                $districts = [];
                $division->districts->each(function ($district) use (&$districts) {
                    $districts[$district->name] = [
                        'name' => $district->name,
                        'upazilas' => $district->upazilas->pluck('name')->values()->all(),
                    ];
                });

                $tree[$division->name] = [
                    'name' => $division->name,
                    'districts' => $districts,
                ];
            });

            return $tree;
        });
    }

    public static function flush(): void
    {
        Cache::forget('bd_locations_tree');
    }
}
