<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MonturaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MonturaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MonturaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Montura::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/montura');
        CRUD::setEntityNameStrings('montura', 'monturas');
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
        CRUD::setValidation(MonturaRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([
            'name'  => 'modelo',
            'label' => 'Modelo',
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingresa el modelo de la montura', // Placeholder
            ],
        ]);

        // Campo para la Marca
        CRUD::field([
            'name'  => 'marca',
            'label' => 'Marca',
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingresa la marca de la montura', // Placeholder
            ],
        ]);

        // Campo para el Precio
        CRUD::field([
            'name'  => 'precio',
            'label' => 'Precio',
            'type'  => 'number',
            'attributes' => [
                'step'       => 0.01, // Paso decimal para valores monetarios
                'placeholder' => 'Ingresa el precio de la montura', // Placeholder
            ],
            'prefix' => 'Bs', // Prefijo para representar moneda
        ]);

        // Campo para el Inventario
        CRUD::field([
            'name'  => 'inventario',
            'label' => 'Inventario',
            'type'  => 'number',
            'attributes' => [
                'placeholder' => 'Ingresa la cantidad en inventario', // Placeholder
            ],
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
