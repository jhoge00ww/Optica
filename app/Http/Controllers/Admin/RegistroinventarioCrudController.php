<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegistroinventarioRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RegistroinventarioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RegistroinventarioCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Registroinventario::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/registroinventario');
        CRUD::setEntityNameStrings('registroinventario', 'registroinventarios');
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
        CRUD::setValidation(RegistroinventarioRequest::class);
        //CRUD::setFromDb(); // set fields from db columns.
        $this->crud->setTitle('Registro Inventario', 'create');
        $this->crud->setHeading('Registro Inventario', 'create');


        // Define cada campo y sus propiedades
        CRUD::field([
            'name'  => 'producto',
            'label' => 'Producto',
            'attributes' => [
                'placeholder' => '-- Ingresa el nombre del producto',
            ],
        ]);

        CRUD::field([
            'name'  => 'categoria',
            'label' => 'Categoría',
            'attributes' => [
                'placeholder' => '-- Ingresa la categoría del producto', // Placeholder
            ],
        ]);

        CRUD::field([
            'name'  => 'cantidad_vendida',
            'label' => 'Cantidad Vendida',
            'attributes' => [
                'placeholder' => '-- Ingresa la cantidad vendida', // Placeholder
            ],
        ]);

        CRUD::field([
            'name'  => 'fecha_registro',
            'label' => 'Fecha de Registro',
            'type'  => 'datetime', // Especifica el tipo de campo, si es necesario
            'attributes' => [
                'placeholder' => '-- Selecciona la fecha de registro', // Placeholder
            ],
            'default' => now()->subHours(4), // Establece el valor por defecto, si corresponde
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
        $this->crud->setTitle('Registro Inventario');
        $this->crud->setHeading('Registro Inventario');
    }
}
