<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmpleadoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EmpleadoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmpleadoCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Empleado::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/empleado');
        CRUD::setEntityNameStrings('empleado', 'empleados');
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
            'name'  => 'nombre',
            'label' => 'Nombre',
        ]);

        CRUD::column([
            'name'  => 'apellido',
            'label' => 'Apellido',
        ]);

        CRUD::column([
            'name'  => 'correo',
            'label' => 'Correo Electrónico',
        ]);

        CRUD::column([
            'name'  => 'telefono',
            'label' => 'Teléfono',
        ]);

        CRUD::column([
            'name'  => 'sucursal_id',
            'label' => 'Sucursal',
            'type'  => 'select',
            'entity' => 'sucursal', // Relación definida en el modelo Empleado
            'attribute' => 'nombre', // Atributo que se muestra en el listado
            'model' => 'App\\Models\\Sucursal', // Modelo relacionado
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
        CRUD::setValidation(EmpleadoRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([
            'name'  => 'nombre',
            'label' => 'Nombre',
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingresa el nombre del empleado',
            ],
        ]);

        CRUD::field([
            'name'  => 'apellido',
            'label' => 'Apellido',
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingresa el apellido del empleado',
            ],
        ]);

        CRUD::field([
            'name'  => 'correo',
            'label' => 'Correo Electrónico',
            'type'  => 'email',
            'attributes' => [
                'placeholder' => 'Ingresa el correo electrónico',
            ],
        ]);

        CRUD::field([
            'name'  => 'telefono',
            'label' => 'Teléfono',
            'type'  => 'text',
            'attributes' => [
                'placeholder' => 'Ingresa el teléfono del empleado',
                'min' => 60000000,  // Número mínimo (ajusta según tu preferencia)
                'max' => 99999999,  // Número máximo (ajusta según tu preferencia)
                'step' => 1,  // Para que no acepte decimales
            ],
            'prefix' => '+591',
        ]);

        CRUD::field([
            'name'  => 'sucursal_id',
            'label' => 'Sucursal',
            'type'  => 'select',
            'entity' => 'sucursal', // Relación definida en el modelo Empleado
            'attribute' => 'nombre', // Atributo que se muestra en el selector
            'model' => 'App\\Models\\Sucursal', // Modelo relacionado
            'placeholder' => 'Selecciona una sucursal', // Placeholder
            'options' => (function ($query) {
                return $query->orderBy('nombre', 'ASC')->get();
            }), // Ordena las sucursales por nombre
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
