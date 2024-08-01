<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissions = [
            'voir utilisateur',
            'créer utilisateur',
            'modifier utilisateur',
            'supprimer utilisateur',
            'voir projet',
            'créer projet',
            'modifier projet',
            'supprimer projet',
            'voir tache',
            'créer tache',
            'modifier tache',
            'supprimer tache',
            'voir commentaire',
            'créer commentaire',
            'modifier commentaire',
            'supprimer commentaire',
            'voir sous tache',
            'créer sous tache',
            'modifier sous tache',
            'supprimer sous tache',
            'voir role',
            'créer role',
            'modifier role',
            'supprimer role',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // \App\Models\User::factory(10)->créer );

        // \App\Models\User::factory()->créer [
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
