<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\I18n;
use Cake\Event\EventInterface; // Importamos la clase Event para el beforeFilter

class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        
        // Cargamos el motor de seguridad (y evitamos llamar a RequestHandler)
        $this->loadComponent('Authentication.Authentication');
    }

    /**
     * Se ejecuta antes de cualquier acción en el controlador
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Preguntamos quién es el usuario logueado
        $identidad = $this->Authentication->getIdentity();
        
        if ($identidad) {
            // Obtenemos su idioma preferido de la base de datos
            $idioma = $identidad->get('language');
            
            // Cambiamos el idioma del sistema
            if ($idioma === 'en') {
                I18n::setLocale('en_US'); // Inglés
            } else {
                I18n::setLocale('es_ES'); // Español por defecto
            }
        }
    }
}