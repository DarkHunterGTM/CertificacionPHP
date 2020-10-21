<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware'=>['auth','estado'] ],
function(){
    Route::get('/admin','HomeController@index')->name('dashboard');
    Route::get('/construccion','HomeController@construccion')->name('construccion');

    Route::get('user/getJson' , 'UsersController@getJson' )->name('users.getJson');
    Route::get('users' , 'UsersController@index' )->name('users.index');
    Route::post('users' , 'UsersController@store' )->name('users.store');
    Route::delete('users/{user}' , 'UsersController@destroy' );
    Route::post('users/update/{user}' , 'UsersController@update' );
    Route::get('users/{user}/edit', 'UsersController@edit' );
    Route::post('users/reset/tercero' , 'UsersController@resetPasswordTercero')->name('users.reset.tercero');
    Route::post('users/reset' , 'UsersController@resetPassword')->name('users.reset');
    Route::get( '/users/cargar' , 'UsersController@cargarSelect')->name('users.cargar');
    Route::get( '/users/cargarA' , 'UsersController@cargarSelectApertura')->name('users.cargarA');

    Route::get( '/negocio/{negocio}/edit' , 'NegocioController@edit')->name('negocio.edit');
    Route::put( '/negocio/{negocio}/update' , 'NegocioController@update')->name('negocio.update');

    Route::get( '/proveedores' , 'ProveedoresController@index')->name('proveedores.index');
    Route::get( '/proveedores/getJson/' , 'ProveedoresController@getJson')->name('proveedores.getJson');
    Route::get( '/proveedores/new' , 'ProveedoresController@create')->name('proveedores.new');
    Route::get( '/proveedores/edit/{proveedor}' , 'ProveedoresController@edit')->name('proveedores.edit');
    Route::put( '/proveedores/{proveedor}/update' , 'ProveedoresController@update')->name('proveedores.update');
    Route::post( '/proveedores/save/' , 'ProveedoresController@store')->name('proveedores.save');
    Route::post('/proveedores/{proveedor}/delete' , 'ProveedoresController@destroy');
    Route::post('/proveedores/{proveedor}/activar' , 'ProveedoresController@activar');
    Route::get('/proveedores/nitDisponible/', 'ProveedoresController@nitDisponible')->name('proveedores.nitDisponible');

    Route::get( '/territorios' , 'TerritoriosController@index')->name('territorios.index');
    Route::get( '/territorios/getJson/' , 'TerritoriosController@getJson')->name('territorios.getJson');
    Route::get( '/territorios/new' , 'TerritoriosController@create')->name('territorios.new');
    Route::get( '/territorios/edit/{territorio}' , 'TerritoriosController@edit')->name('territorios.edit');
    Route::put( '/territorios/{territorio}/update' , 'TerritoriosController@update')->name('territorios.update');
    Route::post( '/territorios/save/' , 'TerritoriosController@store')->name('territorios.save');
    Route::post('/territorios/{territorio}/delete' , 'TerritoriosController@destroy');
    Route::post('/territorios/{territorio}/activar' , 'TerritoriosController@activar');

    Route::get( '/clientes' , 'ClientesController@index')->name('clientes.index');
    Route::get( '/clientes/getJson/' , 'ClientesController@getJson')->name('clientes.getJson');
    Route::get( '/clientes/new' , 'ClientesController@create')->name('clientes.new');
    Route::get( '/clientes/edit/{cliente}' , 'ClientesController@edit')->name('clientes.edit');
    Route::put( '/clientes/{cliente}/update' , 'ClientesController@update')->name('clientes.update');
    Route::post( '/clientes/save/' , 'ClientesController@store')->name('clientes.save');
    Route::post('/clientes/{cliente}/delete' , 'ClientesController@destroy');
    Route::post('/clientes/{cliente}/activar' , 'ClientesController@activar');
    Route::get('/clientes/nitDisponible/', 'ClientesController@nitDisponible')->name('clientes.nitDisponible');

    Route::get( '/puestos' , 'PuestosController@index')->name('puestos.index');
    Route::get( '/puestos/getJson/' , 'PuestosController@getJson')->name('puestos.getJson');
    Route::get( '/puestos/new' , 'PuestosController@create')->name('puestos.new');
    Route::get( '/puestos/edit/{puesto}' , 'PuestosController@edit')->name('puestos.edit');
    Route::put( '/puestos/{puesto}/update' , 'PuestosController@update')->name('puesto.update');
    Route::post( '/puestos/save/' , 'PuestosController@store')->name('puestos.save');
    Route::post('/puestos/{puesto}/delete' , 'PuestosController@destroy');
    Route::post('/puestos/{puesto}/activar' , 'PuestosController@activar');
    Route::get('/puestos/nombreDisponible/' , 'PuestosController@puestoDisponible')->name('puestos.puestoDisponible');
    Route::get('/puestos/nombreDisponibleEditar/', 'PuestosController@puestoDisponibleEditar')->name('puestos.puestoDisponibleEditar');

    Route::get( '/bancos', 'BancosController@index')->name('bancos.index');
    Route::get( '/bancos/getJson/' , 'BancosController@getJson')->name('bancos.getJson');
    Route::get( '/bancos/new' , 'BancosController@create')->name('bancos.new');
    Route::get( '/bancos/edit/{banco}' , 'BancosController@edit')->name('bancos.edit');
    Route::put( '/bancos/{banco}/update' , 'BancosController@update')->name('bancos.update');
    Route::post( '/bancos/save/' , 'BancosController@store')->name('bancos.save');
    Route::post( '/bancos/{banco}/delete' , 'BancosController@destroy');
    Route::post( '/bancos/{banco}/activar' , 'BancosController@activar');
    Route::get( '/bancos/bancoDisponible/' , 'BancosController@bancoDisponible')->name('bancos.bancoDisponible');
    Route::get( '/bancos/bancoDisponibleEditar/' , 'BancosController@bancoDisponibleEditar')->name('bancos.bancoDisponibleEditar');

    Route::get( '/cheques' , 'ChequesController@index')->name('cheques.index');
    Route::get( '/cheques/getJson/' , 'ChequesController@getJson')->name('cheques.getJson');
    Route::get( '/cheques/new' , 'ChequesController@create')->name('cheques.new');
    Route::get( '/cheques/edit/{cheque}' , 'ChequesController@edit')->name('cheques.edit');
    Route::put( '/cheques/{cheque}/update', 'ChequesController@update')->name('cheques.update');
    Route::post( '/cheques/save/', 'ChequesController@store')->name('cheques.save');
    Route::post( '/cheques/{cheque}/delete', 'ChequesController@destroy');
    Route::post( '/cheques/{cheque}/activar', 'ChequesController@activar');
    Route::get( '/cheques/chequeDisponible/' , 'ChequesController@chequeDisponible')->name('cheques.chequeDisponible');
    Route::get( '/cheques/chequeDisponibleEditar/' , 'ChequesController@chequeDisponibleEditar')->name('cheques.chequeDisponibleEditar');
    Route::get( '/cheques/validacionCheque/' , 'ChequesController@validacionCheque')->name('cheques.validacionCheque');
    Route::get( '/cheques/validacionChequeEditar/' , 'ChequesController@validacionChequeEditar')->name('cheques.validacionChequeEditar');
    Route::get( '/cheques/pdf/{cheque}', 'ChequesController@pdf');
    Route::get( '/cheques/chequepdf/{cheque}', 'ChequesController@Chequepdf');
    Route::post( '/cheques/{cheque}/impreso', 'ChequesController@impreso');
    Route::post( '/cheques/{cheque}/entregado', 'ChequesController@entregado');
    Route::post( '/cheques/{cheque}/cobrado', 'ChequesController@cobrado');

    //Route::get( '/detallesCuentas', 'DetallesCuentasController@index')->name('detallesCuentas.index');
    //Route::get( '/detallesCuentas/getJson/', 'DetallesCuentasController@getJson')->name('detallesCuentas.getJson');


    Route::get( '/detallesCuentas/{detallecuenta}', 'DetallesCuentasController@index')->name('detallesCuentas.index');
    Route::get( '/detallesCuentas/{detallecuenta}/getJson/', 'DetallesCuentasController@getJson')->name('detallesCuentas.getJson');
    Route::get( '/detallesCuentas /new', 'DetallesCuentasController@create')->name('detallesCuentas.new');
    Route::get( '/detallesCuentas/edit/{detallecuenta}', 'DetallesCuentasController@edit')->name('detallesCuentas.edit');
    Route::put( '/detallesCuentas/{detalleCuenta}/update', 'DetallesCuentasController@update')->name('detallesCuentas.update');
    Route::post( '/detallesCuentas/save/', 'DetallesCuentasController@store')->name('detallesCuentas.save');
    Route::post( '/detallesCuentas/{detalleCuenta}/delete', 'DetallesCuentasController@destroy');
    Route::post( '/detallesCuentas/{detalleCuenta}/activar', 'DetallesCuentasController@activar' );
    Route::get('/detallesCuentas/show/{detalleCuenta}' , 'DetallesCuentasController@show')->name('detallesCuentas.show');

    Route::get( '/marcasCamiones', 'MarcasCamionesController@index')->name('marcasCamiones.index');
    Route::get( '/marcasCamiones/getJson/' , 'MarcasCamionesController@getJson')->name('marcasCamiones.getJson');
    Route::get( '/marcasCamiones/new' , 'MarcasCamionesController@create')->name('marcasCamiones.new');
    Route::get( '/marcasCamiones/edit/{marca}' , 'MarcasCamionesController@edit')->name('marcasCamiones.edit');
    Route::put( '/marcasCamiones/{marca}/update', 'MarcasCamionesController@update')->name('marcasCamiones.update');
    Route::post( '/marcasCamiones/save/' , 'MarcasCamionesController@store')->name('marcasCamiones.save');
    Route::post( '/marcasCamiones/{marca}/delete' , 'MarcasCamionesController@destroy');
    Route::post( '/marcasCamiones/{marca}/activar' , 'MarcasCamionesController@activar');
    Route::get( '/marcasCamiones/marcaDisponible/' , 'MarcasCamionesController@marcaDisponible')->name('marcasCamiones.marcaDisponible');
    Route::get( '/marcasCamiones/marcaDisponibleEditar/' , 'MarcasCamionesController@marcaDisponibleEditar')->name('marcasCamiones.marcaDisponibleEditar');


    Route::get('/camiones' , 'CamionesController@index')->name('camiones.index');
    Route::get('/camiones/getJson/', 'CamionesController@getJson')->name('camiones.getJson');
    Route::get('/camiones/new', 'CamionesController@create')->name('camiones.new');
    Route::get('/camiones/edit/{camion}', 'CamionesController@edit')->name('camiones.edit');
    Route::put('/camiones/{camion}/update', 'CamionesController@update')->name('camiones.update');
    Route::post('/camiones/save/', 'CamionesController@store')->name('camiones.save');
    Route::post('/camiones/{camion}/delete', 'CamionesController@destroy');
    Route::post('/camiones/{camion}/activar', 'CamionesController@activar');
    Route::get('/camiones/placaDisponible/', 'CamionesController@placaDisponible')->name('camiones.placaDisponible');

    Route::get('/empleados' , 'EmpleadosController@index')->name('empleados.index');
    Route::get('/empleados/getJson/', 'EmpleadosController@getJson')->name('empleados.getJson');
    Route::get('/empleados/new', 'EmpleadosController@create')->name('empleados.new');
    Route::get('/empleados/edit/{empleado}', 'EmpleadosController@edit')->name('empleados.edit');
    Route::put('/empleados/{empleado}/update', 'EmpleadosController@update')->name('empleados.update');
    Route::post('/empleados/save/', 'EmpleadosController@store')->name('empleados.save');
    Route::post('/empleados/{empleado}/delete', 'EmpleadosController@destroy');
    Route::post('/empleados/{empleado}/activar', 'EmpleadosController@activar');
    Route::get('/empleados/dpiDisponible/', 'EmpleadosController@dpiDisponible')->name('empleados.dpiDisponible');
    Route::get('/empleados/dpiDisponibleEdit/', 'EmpleadosController@dpiDisponibleEdit')->name('empleados.dpiDisponibleEdit');

    Route::get( '/cuentasBancarias' , 'CuentasBancariasController@index')->name('cuentasBancarias.index');
    Route::get( '/cuentasBancarias/getJson' , 'CuentasBancariasController@getJson')->name('cuentasBancarias.getJson');
    Route::get( '/cuentasBancarias/new' , 'CuentasBancariasController@create')->name('cuentasBancarias.new');
    Route::get( '/cuentasBancarias/edit/{cuentaBancaria}', 'CuentasBancariasController@edit')->name('cuentasBancarias.edit');
    Route::put( '/cuentasBancarias/{cuentaBancaria}/update', 'CuentasBancariasController@update')->name('cuentasBancarias.update');
    Route::post( '/cuentasBancarias/save/', 'CuentasBancariasController@store')->name('cuentasBancarias.save');
    Route::post( '/cuentasBancarias/{cuentaBancaria}/delete', 'CuentasBancariasController@destroy');
    Route::post( '/cuentasBancarias/{cuentaBancaria}/activar', 'CuentasBancariasController@activar');
    Route::get( '/cuentasBancarias/cuentaDisponible', 'CuentasBancariasController@cuentaDisponible')->name('cuentasBancarias.cuentaDisponible');
    Route::get( '/cuentasBancarias/cuentaDisponibleEditar', 'CuentasBancariasController@cuentaDisponibleEditar')->name('cuentasBancarias.cuentaDisponibleEditar');

    Route::get( '/bodegas' , 'BodegasController@index')->name('bodegas.index');
    Route::get( '/bodegas/getJson/' , 'BodegasController@getJson')->name('bodegas.getJson');
    Route::get( '/bodegas/new' , 'BodegasController@create')->name('bodegas.new');
    Route::get( '/bodegas/edit/{bodega}' , 'BodegasController@edit')->name('bodegas.edit');
    Route::put( '/bodegas/{bodega}/update' , 'BodegasController@update')->name('bodegas.update');
    Route::post( '/bodegas/save/' , 'BodegasController@store')->name('bodegas.save');
    Route::post('/bodegas/{bodega}/delete' , 'BodegasController@destroy');
    Route::post('/bodegas/{bodega}/activar' , 'BodegasController@activar');

    Route::get( '/formas_pago' , 'FormasPagoController@index')->name('formas_pago.index');
    Route::get( '/formas_pago/getJson/' , 'FormasPagoController@getJson')->name('formas_pago.getJson');
    Route::get( '/formas_pago/new' , 'FormasPagoController@create')->name('formas_pago.new');
    Route::get( '/formas_pago/edit/{formaPago}' , 'FormasPagoController@edit')->name('formas_pago.edit');
    Route::put( '/formas_pago/{formaPago}/update' , 'FormasPagoController@update')->name('formas_pago.update');
    Route::post( '/formas_pago/save/' , 'FormasPagoController@store')->name('formas_pago.save');
    Route::post('/formas_pago/{formaPago}/delete' , 'FormasPagoController@destroy');
    // Route::post('/formas_pago/{formaPago}/activar' , 'FormasPagoController@activar');
    Route::get('/formas_pago/nombreDisponible/', 'FormasPagoController@nombreDisponible')->name('formas_pago.nombreDisponible');

    Route::get( '/presentaciones_producto' , 'PresentacionesProductoController@index')->name('presentaciones_producto.index');
    Route::get( '/presentaciones_producto/getJson/' , 'PresentacionesProductoController@getJson')->name('presentaciones_producto.getJson');
    Route::get( '/presentaciones_producto/new' , 'PresentacionesProductoController@create')->name('presentaciones_producto.new');
    Route::get( '/presentaciones_producto/edit/{presentacionProducto}' , 'PresentacionesProductoController@edit')->name('presentaciones_producto.edit');
    Route::put( '/presentaciones_producto/{presentacionProducto}/update' , 'PresentacionesProductoController@update')->name('presentaciones_producto.update');
    Route::post( '/presentaciones_producto/save/' , 'PresentacionesProductoController@store')->name('presentaciones_producto.save');
    Route::post('/presentaciones_producto/{presentacionProducto}/delete' , 'PresentacionesProductoController@destroy');
    // Route::post('/presentaciones_producto/{presentacionProducto}/activar' , 'PresentacionesProductoController@activar');
    Route::get('/presentaciones_producto/nombreDisponible/', 'PresentacionesProductoController@nombreDisponible')->name('presentaciones_producto.nombreDisponible');

    Route::get( '/productos' , 'ProductosController@index')->name('productos.index');
    Route::get( '/productos/getJson/' , 'ProductosController@getJson')->name('productos.getJson');
    Route::get( '/productos/new' , 'ProductosController@create')->name('productos.new');
    Route::get( '/productos/edit/{producto}' , 'ProductosController@edit')->name('productos.edit');
    Route::put( '/productos/{producto}/update' , 'ProductosController@update')->name('productos.update');
    Route::post( '/productos/save/' , 'ProductosController@store')->name('productos.save');
    Route::post('/productos/{producto}/delete' , 'ProductosController@destroy');
    Route::post('/productos/{producto}/activar' , 'ProductosController@activar');
    Route::get('/productos/codigoDisponible' , 'ProductosController@codigoDisponible')->name('productos.codigoDisponible');



    //Cuentas por Pagar

    Route::get( '/cuenta/{cuentas}', 'ComprasController@detallesCuentas')->name('cuentas.detalle');
    Route::get('/cuentas' , 'ComprasController@cuentas')->name('cuentas.index');
    Route::get( '/cuenta/{cuenta}/getJson', 'ComprasController@detalleCuentasPagarJson')->name('cuenta.detalle');
    Route::get( '/cuenta/pdf/{cuenta}', 'ComprasController@pdf');
    Route::post( '/cuenta/{cuenta}/eliminar', 'ComprasController@eliminar');

    Route::get( '/pagoProveedor/new' , 'PagoProveedorController@create')->name('pagoProveedor.new');
    Route::post( '/pagoProveedor/save/' , 'PagoProveedorController@store')->name('pagoProveedor.save');
    Route::get( '/pagoProveedor/validacionPago/' , 'PagoProveedorController@ValidacionPago')->name('pagoProveedor.ValidacionPago');




    Route::get('/compras/getProductoData/{producto}' , 'ComprasController@getProductoData')->name('compras.getProductoData');
    Route::get('/compras' , 'ComprasController@index')->name('compras.index');
    Route::get('/compras/getJson/' , 'ComprasController@getJson')->name('compras.getJson');
    Route::get('/compras/cuentasPagarJson/' , 'ComprasController@cuentasPagarJson')->name('compras.cuentasPagarJson');
    Route::get('/compras/new' , 'ComprasController@create')->name('compras.new');
    Route::post( '/compras/save/' , 'ComprasController@store')->name('compras.save');
    Route::get('/compras/{ingresoMaestro}' , 'ComprasController@show')->name('compras.show');
    Route::get('/compras/edit/{compra}' , 'ComprasController@edit')->name('compras.edit');
    Route::put('/compras/{compra}/update' , 'ComprasController@update')->name('compras.update');
    Route::post('/compras/{ingresoMaestro}/delete' , 'ComprasController@destroy');
    Route::post('/compras/{ingresoDetalle}/deleteDetalle' , 'ComprasController@destroyDetalle');
    Route::get('/compras/{ingresoMaestro}/getDetalles' , 'ComprasController@getDetalles')->name('compras.getDetalles');

    Route::get('/traspasos_bodega/getJson/' , 'TraspasosBodegaController@getJson')->name('traspasos_bodega.getJson');
    Route::get('/traspasos_bodega/getProducto/{producto}/{bodega}' , 'TraspasosBodegaController@getProduct')->name('traspasos_bodega.getProducto');
    Route::get('/traspasos_bodega' , 'TraspasosBodegaController@index')->name('traspasos_bodega.index');
    Route::get('/traspasos_bodega/new' , 'TraspasosBodegaController@create')->name('traspasos_bodega.new');
    Route::post( '/traspasos_bodega/save/' , 'TraspasosBodegaController@store')->name('traspasos_bodega.save');
    Route::get('/traspasos_bodega/{traspasoBodega}' , 'TraspasosBodegaController@show')->name('traspasos_bodega.show');
    Route::get('/traspasos_bodega/edit/{compra}' , 'TraspasosBodegaController@edit')->name('traspasos_bodega.edit');
    Route::put('/traspasos_bodega/{compra}/update' , 'TraspasosBodegaController@update')->name('traspasos_bodega.update');
    Route::post('/traspasos_bodega/{traspasoBodega}/delete' , 'TraspasosBodegaController@destroy');
    Route::post('/traspasos_bodega/{ingresoDetalle}/deleteDetalle' , 'TraspasosBodegaController@destroyDetalle');
    Route::get('/traspasos_bodega/{traspasoBodega}/getDetalles' , 'TraspasosBodegaController@getDetalles')->name('traspasos_bodega.getDetalles');

    Route::get('/pedidos/getJson/' , 'PedidosController@getJson')->name('pedidos.getJson');
    Route::get('/pedidos/getProductoData/{producto}' , 'PedidosController@getProductoData')->name('pedidos.getProductoData');
    Route::get('/pedidos' , 'PedidosController@index')->name('pedidos.index');
    Route::get('/pedidos/new' , 'PedidosController@create')->name('pedidos.new');
    Route::post('/pedidos/save/' , 'PedidosController@store')->name('pedidos.save');
    Route::get('/pedidos/{pedidoMaestro}' , 'PedidosController@show')->name('pedidos.show');
    Route::post('/pedidos/{pedidoMaestro}/delete' , 'PedidosController@destroy');
    Route::post('/pedidos/{pedidoDetalle}/deleteDetalle' , 'PedidosController@destroyDetalle');
    Route::get('/pedidos/{pedidoMaestro}/getDetalles' , 'PedidosController@getDetalles')->name('pedidos.getDetalles');
});


Route::get('/', function () {

    return view('welcome');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home')->middleware(['estado']);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user/get/' , 'Auth\LoginController@getInfo')->name('user.get');
Route::post('/user/contador' , 'Auth\LoginController@Contador')->name('user.contador');
Route::post('/password/reset2' , 'Auth\ForgotPasswordController@ResetPassword')->name('password.reset2');
Route::get('/user-existe/', 'Auth\LoginController@userExiste')->name('user.existe');

//Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
/*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/
