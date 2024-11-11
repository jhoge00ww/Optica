<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SucursalRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SucursalCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SucursalCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Sucursal::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sucursal');
        CRUD::setEntityNameStrings('sucursal', 'sucursals');
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
        CRUD::setValidation(SucursalRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        // Campo para el Nombre de la Sucursal
        CRUD::field([
            'name'  => 'nombre',
            'label' => 'Nombre',
            'type'  => 'text', // Campo de texto
            'attributes' => [
                'placeholder' => 'Ingresa el nombre de la sucursal', // Placeholder
            ],
        ]);

        // Campo para la Dirección de la Sucursal
        CRUD::field([
            'name'  => 'direccion',
            'label' => 'Dirección',
            'type'  => 'text', // Campo de texto
            'attributes' => [
                'placeholder' => 'Ingresa la dirección de la sucursal', // Placeholder
            ],
        ]);

        // Campo para el estado de la Clínica
        CRUD::field([
            'name'  => 'tiene_clinica',
            'label' => '¿Tiene Clínica?',
            'type'  => 'boolean', // Campo de tipo booleano
        ]);
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
