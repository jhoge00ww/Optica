<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VentaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VentaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VentaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Venta::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/venta');
        CRUD::setEntityNameStrings('venta', 'ventas');
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
        // Columna para mostrar el nombre del cliente en lugar del ID
        CRUD::column([
            'name'      => 'cliente_id', // Columna en la base de datos
            'label'     => 'Cliente', // Encabezado en la tabla
            'type'      => 'select', // Tipo de columna para relaciones
            'entity'    => 'cliente', // Nombre de la relación en el modelo
            'attribute' => 'nombre', // Atributo que quieres mostrar en la lista (nombre del cliente)
            'model'     => 'App\\Models\\Cliente', // Modelo relacionado
        ]);
        CRUD::column([
            'name'  => 'fecha',
            'label' => 'Fecha de Venta',
            'type'  => 'datetime',
        ]);

        CRUD::column([
            'name'     => 'total',
            'label'    => 'Total',
            'type'     => 'number',
            'prefix'   => 'Bs', // Símbolo de moneda
            'decimals' => 2,   // Número de decimales
        ]);
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
        CRUD::setValidation(VentaRequest::class);
        //CRUD::setFromDb(); // set fields from db columns.
        CRUD::setOperationSetting('contentClass', 'col-md-12');
        // Cliente
        CRUD::field([
            'name'        => 'cliente_id',
            'label'       => 'Cliente',
            'type'        => 'select',
            'entity'      => 'cliente',
            'attribute'   => 'nombre',
            'model'       => 'App\\Models\\Cliente',
            'placeholder' => 'Selecciona un cliente',
            'options'     => (function ($query) {
                return $query->orderBy('nombre', 'ASC')->get();
            }),
        ]);

        // Fecha de la Venta
        CRUD::field([
            'name'    => 'fecha',
            'label'   => 'Fecha de Venta',
            'type'    => 'datetime',
            'default' => now(),
        ]);

        // Campo de solo lectura para el Total de la Venta
        CRUD::field([
            'name'        => 'total',
            'label'       => 'Total',
            'type'        => 'number',
            //'attributes'  => ['readonly' => 'readonly'],
            'prefix'      => 'Bs',
        ]);

        // Detalles de la Venta usando 'detalleventas' con subcampos
        /*CRUD::field('detalleventas')->subfields([
            [
                'name'    => 'montura_id',
                'label'   => 'Montura',
                'type'    => 'select',
                'entity'  => 'montura',
                'attribute' => 'modelo',
                'model'   => 'App\\Models\\Montura',
                'wrapper' => ['class' => 'form-group col-md-3'],
            ],
            [
                'name'    => 'lente_id',
                'label'   => 'Lente',
                'type'    => 'select',
                'entity'  => 'lente',
                'attribute' => 'tipo',
                'model'   => 'App\\Models\\Lente',
                'wrapper' => ['class' => 'form-group col-md-3'],
            ],
            [
                'name'       => 'cantidad',
                'label'      => 'Cantidad',
                'type'       => 'number',
                'wrapper'    => ['class' => 'form-group col-md-2'],
                'attributes' => ['step' => 1, 'min' => 1],
            ],
            [
                'name'       => 'precio_unitario',
                'label'      => 'Precio Unitario',
                'type'       => 'number',
                'prefix'     => 'Bs',
                'decimals'   => 2,
                'wrapper'    => ['class' => 'form-group col-md-2'],
                'attributes' => ['step' => 0.01, 'min' => 0],
            ],
        ])->reorder('order')->label('Detalles de la Venta')->hint('Agrega varios detalles a la venta.');
    */
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
