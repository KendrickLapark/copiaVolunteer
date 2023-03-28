<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'activity_id' => 1,
            'nameAct' => 'Carrera solidaria',
            'descAct' => 'Carrera de 10 km por el núcleo urbano de la ciudad, pasando por diferentes puntos de interés arquitectónico y cultural.',
            'direAct' => 'Calle María Zambrano',
            'timeAct' => '09:00:00',
            'endTimeAct' => '13:00:00',
            'dateAct' => '2023-03-28',
            'requiAct' => 'Ninguno',
            'requiPrevAct' => 'No se requiere',
            'formaAct' => 'No necesita Formación',
            'isPreseAct' => 1,
            'quotasAct' => 200,
            'isVisible' => 1,
            'isNulledAct' => 0

        ]);

        Activity::create([
            'activity_id' => 2,
            'nameAct' => 'Senderismo',
            'descAct' => 'Senderismo por el campo a través de rutas con distinta riqueza paisajística y vegetal.',
            'direAct' => 'Calle María la Judía',
            'timeAct' => '10:00:00',
            'endTimeAct' => '11:00:00',
            'dateAct' => '2023-03-28',
            'requiPrevAct' => 'No se requiere',
            'requiAct' => 'Ninguno',
            'formaAct' => 'No necesita Formación',
            'isPreseAct' => 1,
            'quotasAct' => 200,
            'isVisible' => 1,
            'isNulledAct' => 0

        ]);

        Activity::create([
            'activity_id' => 3,
            'nameAct' => 'Recogida de alimentos',
            'descAct' => 'Recogida de comida para personas en situacion de discriminacion social y personas con dificultades económicas',
            'direAct' => 'Calle Sin Hambre',
            'timeAct' => '10:00:00',
            'endTimeAct' => '11:00:00',
            'dateAct' => '2023-03-28',
            'requiPrevAct' => 'No se requiere',
            'requiAct' => 'Ninguno',
            'formaAct' => 'No necesita Formación',
            'isPreseAct' => 1,
            'quotasAct' => 200,
            'isVisible' => 1,
            'isNulledAct' => 0

        ]);

    }
}
