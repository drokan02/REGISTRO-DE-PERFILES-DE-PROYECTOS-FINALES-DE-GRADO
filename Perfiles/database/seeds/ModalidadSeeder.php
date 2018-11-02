<?php

use Illuminate\Database\Seeder;
use App\Modal;
class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modal::create([
            'codigo_mod' => 'td-12',
            'nombre_mod' => 'Trabajo Dirigido',
            'descripcion_mod' => 'Consiste en trabajos prácticos evaluados y supervisados en instituciones, empresas públicas o privadas, 
            encargadas de proyectar o implementar obras para lo cual y sobre la base de un temario se proyecta, dirige o fiscaliza bajo
             la dirección de un supervisor o guía de la institución o empresa, también otro campo de acción es el de verificar las 
             soluciones de problemas específicos, demostrando dominio amplio del tema y capacidad para resolver.'
        ]);

        Modal::create([
            'codigo_mod' => 'pdg-01',
            'nombre_mod' => 'Proyecto de Grado',
            'descripcion_mod' => 'Es el trabajo de investigación, análisis y diseño de <b>objetos de fin social</b> y que cumple con 
            exigencias de metodología cientifica con profundidad similar al de un proyecto de investigación (tesis).'
        ]);

        Modal::create([
            'codigo_mod' => 'ad-12',
            'nombre_mod' => 'Adscripción',
            'descripcion_mod' => 'Se establece la Adscripción como la incorporación de estudiantes de la UMSS a la realización de actividades
             en los ámbitos académico, de investigación, interacción, y/o de gestión universitaria. La Adscripción consiste en la realización
              de un Trabajo Dirigido y/o una práctica profesional supervisada (internado) dentro de la Universidad Mayor de San Simón, 
              que desarrollado dentro del marco de las disposiciones del presente reglamento, habilita al estudiante a presentar 
              como Proyecto Final. Para las Carreras de Informática y Sistemas, se plantea clasificar esta modalidad en dos:Adscripción 
              a la Catedra,si las actividades a realizar persiguen fines netamente académicos y de investigación enmarcadas en el proceso
               enseñanza-aprendizaje de las carreras de Informática y Sistemas.Adscripción,si las actividades a realizar no están enmarcadas
                en el ámbito de la Adscripción a la Cátedra.'
        ]);

        Modal::create([
            'codigo_mod' => 'ts-01',
            'nombre_mod' => 'Tesis',
            'descripcion_mod' => 'Es un trabajo de investigación, que cumple con exigencias de metodología científica, a objeto de conocer y
             dar respuestas a un problema, planteando alternativas aplicables o proponiendo soluciones prácticas y/o teóricas.'
        ]);


    }
}
