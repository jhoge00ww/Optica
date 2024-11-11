<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InventarioRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InventarioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InventarioCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Inventario::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/inventario');
        CRUD::setEntityNameStrings('inventario', 'inventarios');
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

        CRUD::column([
            'name'  => 'montura_id',
            'label' => 'Montura',
            'type'  => 'select',
            'entity' => 'montura', // Relación definida en el modelo Inventario
            'attribute' => 'modelo', // Cambia 'nombre' al atributo que desees mostrar
            'model' => 'App\\Models\\Montura', // Modelo relacionado
        ]);

        CRUD::column([
            'name'  => 'lente_id',
            'label' => 'Lente',
            'type'  => 'select',
            'entity' => 'lente', // Relación definida en el modelo Inventario
            'attribute' => 'tipo', // Cambia 'nombre' al atributo que desees mostrar
            'model' => 'App\\Models\\Lente', // Modelo relacionado
        ]);

        CRUD::column([
            'name'  => 'sucursal_id',
            'label' => 'Sucursal',
            'type'  => 'select',
            'entity' => 'sucursal', // Relación definida en el modelo Inventario
            'attribute' => 'nombre', // Cambia 'nombre' al atributo que desees mostrar
            'model' => 'App\\Models\\Sucursal', // Modelo relacionado
        ]);

        CRUD::column([
            'name'  => 'cantidad',
            'label' => 'Cantidad',
            'type'  => 'number', // Tipo numérico para cantidad
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
        CRUD::setValidation(InventarioRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([
            'name'        => 'montura_id',
            'label'       => 'Montura',
            'type'        => 'select', // Tipo de campo select
            'entity'      => 'montura', // La relación definida en el modelo Inventario
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
            'type'        => 'select', // Tipo de campo select
            'entity'      => 'lente', // La relación definida en el modelo Inventario
            'attribute'   => 'tipo', // Atributo que se muestra en el selector
            'model'       => 'App\\Models\\Lente', // Modelo relacionado
            'placeholder' => 'Selecciona un lente', // Placeholder
            'options'     => (function ($query) {
                return $query->orderBy('tipo', 'ASC')->get();
            }), // Ordena los lentes por tipo
        ]);

        // Campo para la Sucursal
        CRUD::field([
            'name'        => 'sucursal_id',
            'label'       => 'Sucursal',
            'type'        => 'select', // Tipo de campo select
            'entity'      => 'sucursal', // La relación definida en el modelo Inventario
            'attribute'   => 'nombre', // Atributo que se muestra en el selector
            'model'       => 'App\\Models\\Sucursal', // Modelo relacionado
            'placeholder' => 'Selecciona una sucursal', // Placeholder
            'options'     => (function ($query) {
                return $query->orderBy('nombre', 'ASC')->get();
            }), // Ordena las sucursales por nombre
        ]);

        // Campo para la Cantidad
        CRUD::field([
            'name'        => 'cantidad',
            'label'       => 'Cantidad',
            'type'        => 'number', // Campo de tipo número
            'attributes'  => [
                'placeholder' => 'Ingresa la cantidad de inventario', // Placeholder
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
