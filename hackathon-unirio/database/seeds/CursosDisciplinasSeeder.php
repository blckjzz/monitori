<?php

use Illuminate\Database\Seeder;

class CursosDisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social_media = new \App\Curso([
            'codigo' => '001',
            'nome' => 'Social Media Marketing'
        ]);
        $social_media->save();
        $social_media->disciplinas()->saveMany([
            new \App\Disciplina([
                'codigo' => '0011',
                'nome' => 'Marketin nas Redes Sociais'
            ]),
            new \App\Disciplina([
                'codigo' => '0012',
                'nome' => 'Criação de Fanpages'
            ]),
            new \App\Disciplina([
                'codigo' => '0013',
                'nome' => 'Instagram Marketing'
            ]),
            new \App\Disciplina([
                'codigo' => '0014',
                'nome' => 'Twitter'
            ]),
        ]);

        $design_web = new \App\Curso([
            'codigo' => '002',
            'nome' => 'Design Web',
        ]);
        $design_web->save();
        $design_web->disciplinas()->saveMany([
            new \App\Disciplina([
                'codigo' => '0021',
                'nome' => 'Photoshop I'
            ]),
            new \App\Disciplina([
                'codigo' => '0022',
                'nome' => 'Photoshop II'
            ]),
            new \App\Disciplina([
                'codigo' => '0023',
                'nome' => 'Illustrator'
            ]),
            new \App\Disciplina([
                'codigo' => '0024',
                'nome' => 'Email Marketing'
            ]),
            new \App\Disciplina([
                'codigo' => '0024',
                'nome' => 'Facebook'
            ]),
        ]);

        $desenvolvedor_java = new \App\Curso([
            'codigo' => '003',
            'nome' => 'Desenvolvedor Java',
        ]);
        $desenvolvedor_java->save();
        $desenvolvedor_java->disciplinas()->saveMany([
            new \App\Disciplina([
                'codigo' => '0031',
                'nome' => 'Primeiros Passos com Java',
            ]),
            new \App\Disciplina([
                'codigo' => '0032',
                'nome' => 'Orientação a Objetos',
            ]),
            new \App\Disciplina([
                'codigo' => '0033',
                'nome' => 'Principais API e bibliotecas',
            ]),
            new \App\Disciplina([
                'codigo' => '0034',
                'nome' => 'Produtividade em Eclipse,'
            ]),
        ]);
    }
}
