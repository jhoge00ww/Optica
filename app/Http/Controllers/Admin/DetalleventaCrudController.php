<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DetalleventaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DetalleventaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DetalleventaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Detalleventa::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/detalleventa');
        CRUD::setEntityNameStrings('detalleventa', 'detalleventas');
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

        // Columna para la Venta
        CRUD::column([
            'name' => 'venta_id',
            'label' => 'Venta',
            'type' => 'select',
            'entity' => 'venta', // Relación en el modelo
            'attribute' => 'id', // Atributo que se muestra en la columna
            'model' => 'App\\Models\\Venta', // Modelo relacionado
        ]);

        // Columna para la Montura
        CRUD::column([
            'name' => 'montura_id',
            'label' => 'Montura',
            'type' => 'select',
            'entity' => 'montura', // Relación en el modelo
            'attribute' => 'modelo', // Atributo que se muestra en la columna
            'model' => 'App\\Models\\Montura', // Modelo relacionado
        ]);

        // Columna para el Lente
        CRUD::column([
            'name' => 'lente_id',
            'label' => 'Lente',
            'type' => 'select',
            'entity' => 'lente', // Relación en el modelo
            'attribute' => 'tipo', // Atributo que se muestra en la columna
            'model' => 'App\\Models\\Lente', // Modelo relacionado
        ]);

        // Columna para la Cantidad
        CRUD::column([
            'name' => 'cantidad',
            'label' => 'Cantidad',
            'type' => 'number',
        ]);

        // Columna para el Precio Unitario
        CRUD::column([
            'name' => 'precio_unitario',
            'label' => 'Precio Unitario',
            'type' => 'money', // Tipo de campo para mostrar como moneda
            'prefix' => 'Bs', // Prefijo para representar moneda
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
        CRUD::setValidation(DetalleventaRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([
            'name'        => 'venta_id',
            'label'       => 'Venta',
            'type'        => 'select',
            'entity'      => 'venta', // Relación en el modelo
            'attribute'   => 'id', // Atributo que se muestra en el selector
            'model'       => 'App\\Models\\Venta', // Modelo relacionado
            'placeholder' => 'Selecciona una venta', // Placeholder
            'options'     => (function ($query) {
                return $query->orderBy('id', 'ASC')->get();
            }), // Ordena las ventas por id
        ]);

        // Campo para la Montura
        CRUD::field([
            'name'        => 'montura_id',
            'label'       => 'Montura',
            'type'        => 'select',
            'entity'      => 'montura', // Relación en el modelo
            'attribute'   => 'modelo', // Atributo que se muestra en el selector
            'model'       => 'App\\Models\\Montura', // Modelo relacionado
            'placeholder' => 'Selecciona una montura', // Placeholder
            'options'     => (function ($query) {
                return $query->orderBy('modelo', 'ASC')->get();
            }), // Ordena las monturas por modelo
        ]);

        // Campo para el Lente
        CRUD::field([
            'name'        => 'lente_id',
            'label'       => 'Lente',
            'type'        => 'select',
            'entity'      => 'lente', // Relación en el modelo
            'attribute'   => 'tipo', // Atributo que se muestra en el selector
            'model'       => 'App\\Models\\Lente', // Modelo relacionado
            'placeholder' => 'Selecciona un lente', // Placeholder
            'options'     => (function ($query) {
                return $query->orderBy('tipo', 'ASC')->get();
            }), // Ordena los lentes por tipo
        ]);

        // Campo para la Cantidad
        CRUD::field([
            'name'  => 'cantidad',
            'label' => 'Cantidad',
            'type'  => 'number',
            'attributes' => [
                'placeholder' => 'Ingresa la cantidad', // Placeholder
            ],
        ]);

        // Campo para el Precio Unitario
        CRUD::field([
            'name'  => 'precio_unitario',
            'label' => 'Precio Unitario',
            'type'  => 'number',
            'attributes' => [
                'step'       => 0.01, // Paso decimal para valores monetarios
                'placeholder' => 'Ingresa el precio unitario', // Placeholder
            ],
            'prefix' => 'Bs', // Prefijo para representar moneda
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
