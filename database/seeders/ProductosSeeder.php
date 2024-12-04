<?php

// database/seeders/ProductosSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Comida para perro',
            'imagen' => 'imagenes/comida_perro.webp',
            'precio' => 50.00,
            'descripcion' => 'Comida para perro de alta calidad',
        ]);
        
        Producto::create([
            'nombre' => 'Juguete interactivo para mascotas',
            'imagen' => 'imagenes/juguete_mascota.jpg',
            'precio' => 150.00,
            'descripcion' => 'Juguete interactivo para mascotas',
        ]);
        
        Producto::create([
            'nombre' => 'Rascador para gatos',
            'imagen' => 'imagenes/rascador_gatos.jpg',
            'precio' => 260.00,
            'descripcion' => 'Rascador para gatos',
        ]);
        
        Producto::create([
            'nombre' => 'Cama para perros',
            'imagen' => 'imagenes/cama_perro.webp',
            'precio' => 120.00,
            'descripcion' => 'Cama para perros',
        ]);
        
        Producto::create([
            'nombre' => 'Hueso de goma para masticar',
            'imagen' => 'imagenes/hueso_goma.webp',
            'precio' => 45.00,
            'descripcion' => 'Hueso de goma para masticar',
        ]);
        
        Producto::create([
            'nombre' => 'Comedero para gatos',
            'imagen' => 'imagenes/comedor_gatos.webp',
            'precio' => 200.00,
            'descripcion' => 'Comedero para gatos',
        ]);
        
        Producto::create([
            'nombre' => 'Correa para perros',
            'imagen' => 'imagenes/correa_perros.webp',
            'precio' => 1.00,
            'descripcion' => 'Correa para perros',
        ]);
        
        Producto::create([
            'nombre' => 'Juguete de peluche para gatos',
            'imagen' => 'imagenes/peluche_gato.webp',
            'precio' => 50.00,
            'descripcion' => 'Juguete de peluche para gatos',
        ]);
        
        Producto::create([
            'nombre' => 'Cama ortopédica para perros',
            'imagen' => 'imagenes/cama_ortopedica_perros.jpeg',
            'precio' => 450.00,
            'descripcion' => 'Cama ortopédica para perros',
        ]);
        
        Producto::create([
            'nombre' => 'Arenero para gatos',
            'imagen' => 'imagenes/arenero_gatos.webp',
            'precio' => 75.00,
            'descripcion' => 'Arenero para gatos',
        ]);
        
        Producto::create([
            'nombre' => 'Manta suave para perros',
            'imagen' => 'imagenes/manta_perros.jpeg',
            'precio' => 24.00,
            'descripcion' => 'Manta suave para perros',
        ]);
        
        Producto::create([
            'nombre' => 'Jaula para perros pequeños',
            'imagen' => 'imagenes/jaula_perros.jpeg',
            'precio' => 122.00,
            'descripcion' => 'Jaula para perros pequeños',
        ]);
        
        Producto::create([
            'nombre' => 'Cama para gatos',
            'imagen' => 'imagenes/cama_gatos.jpeg',
            'precio' => 130.00,
            'descripcion' => 'Cama para gatos',
        ]);
        
        Producto::create([
            'nombre' => 'Plato para perros',
            'imagen' => 'imagenes/plato_perro.jpeg',
            'precio' => 30.00,
            'descripcion' => 'Plato para perros',
        ]);
        
    }
}
