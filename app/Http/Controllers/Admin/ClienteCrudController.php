<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClienteRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClienteCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClienteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Cliente::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cliente');
        CRUD::setEntityNameStrings('cliente', 'clientes');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ClienteRequest::class);

        // Define cada campo y sus propiedades
        CRUD::field([
            'name'  => 'nombre',
            'label' => 'Nombre',
            'type'  => 'text', // Tipo de campo texto
            'attributes' => [
                'placeholder' => 'Ingresa el nombre del cliente', // Placeholder
            ],
        ]);

        CRUD::field([
            'name'  => 'apellido',
            'label' => 'Apellido',
            'type'  => 'text', // Tipo de campo texto
            'attributes' => [
                'placeholder' => 'Ingresa el apellido del cliente', // Placeholder
            ],
        ]);

        CRUD::field([
            'name'  => 'correo',
            'label' => 'Correo Electrónico',
            'type'  => 'email', // Tipo de campo correo electrónico
            'attributes' => [
                'placeholder' => 'Ingresa el correo electrónico del cliente', // Placeholder
            ],
        ]);

        CRUD::field([
            'name'  => 'telefono',
            'label' => 'Teléfono',
            'type'  => 'number', // Tipo de campo número
            'attributes' => [
                'placeholder' => 'Ingresa el número de teléfono (opcional)', // Placeholder
                'min' => 60000000,  // Número mínimo (ajusta según tu preferencia)
                'max' => 99999999,  // Número máximo (ajusta según tu preferencia)
                'step' => 1,  // Para que no acepte decimales
            ],
            'prefix' => '+591',  // Agrega un prefijo de número de país si es necesario
        ]);


        // También puedes añadir más campos o personalizar los existentes
    }


    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
