<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompraRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CompraCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CompraCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Compra::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/compra');
        CRUD::setEntityNameStrings('compra', 'compras');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // set columns from db columns.

        // Columnas personalizadas
        CRUD::column([
            'name'  => 'proveedor_id',
            'label' => 'Proveedor',
            'type'  => 'select',
            'entity' => 'proveedor', // Nombre de la relación en el modelo
            'model' => 'App\Models\Proveedor', // Clase del modelo
            'attribute' => 'nombre', // Atributo que se mostrará en la tabla
        ]);

        CRUD::column([
            'name'  => 'fecha',
            'label' => 'Fecha',
            'type'  => 'datetime',
        ]);

        CRUD::column([
            'name'  => 'total',
            'label' => 'Total',
            'type'  => 'number',
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CompraRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        // Campos personalizados
        CRUD::field([
            'name'  => 'proveedor_id',
            'label' => 'Proveedor',
            'type'  => 'select',
            'entity' => 'proveedor', // Nombre de la relación en el modelo
            'model' => 'App\Models\Proveedor', // Clase del modelo
            'attribute' => 'nombre', // Atributo que se mostrará en la selección
            'default' => '', // Valor por defecto (si es necesario)
        ]);

        CRUD::field([
            'name'  => 'fecha',
            'label' => 'Fecha',
            'type'  => 'datetime',
            'attributes' => [
                'placeholder' => '-- Selecciona la fecha de registro', // Placeholder
            ],
            'default' => now()->subHours(4),
        ]);

        CRUD::field([
            'name'  => 'total',
            'label' => 'Total',
            'type'  => 'number',
            'attributes' => [
                'step' => '0.01', // Para permitir decimales
                'placeholder' => 'Ingresa el total de la compra',
            ],
            'prefix' => 'Bs',
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
