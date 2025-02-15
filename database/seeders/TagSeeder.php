<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Tecnología' => 'Todo sobre tecnología y avances digitales.',
            'Salud' => 'Consejos y novedades sobre salud.',
            'Deportes' => 'Noticias y contenido sobre deportes.',
            'Cine' => 'Información y reseñas de películas.',
            'Música' => 'Noticias y tendencias del mundo musical.',
        ];

        foreach ($tags as $name => $description) {
            Tag::create(compact('name', 'description'));
        }
    }
}
