<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProveedorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProveedorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProveedorCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Proveedor::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/proveedor');
        CRUD::setEntityNameStrings('proveedor', 'proveedors');
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
        CRUD::setValidation(ProveedorRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([
            'name'  => 'nombre',
            'label' => 'Nombre',
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingresa el nombre del proveedor',
            ],
        ]);

        CRUD::field([
            'name'  => 'contacto',
            'label' => 'Contacto',
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingresa el nombre del contacto',
            ],
        ]);

        CRUD::field([
            'name'  => 'telefono',
            'label' => 'Teléfono',
            'type'  => 'number',
            'attributes' => [
                'placeholder' => 'Ingresa el teléfono del proveedor',
                'min' => 60000000,  // Número mínimo (ajusta según tu preferencia)
                'max' => 99999999,  // Número máximo (ajusta según tu preferencia)
                'step' => 1,  // Para que no acepte decimales
            ],
            'prefix' => '+591',
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
