## Detalles del proyecto
<p>
	El proyecto hace uso de:
</p>

	1. MySql
	2. Relaciones
	3. Sistema de Login (sin paquetes adicionales)
	 

# Obtener proyecto
<p>
	Para poder hacer uso de este proyecto, debes clonar el repositorio y configurar el archivo *.env*. 
    Debes agregar las credenciales a la conexión a la base de datos a usar.
</p>

## Ejecutar migraciones
<p>
    Para crear las tablas en la base de datos, solo debes ejecutar:
</p>

```
php artisan migrate
```

## A tener en cuenta
<p>
	En este proyecto se está usando Sql Server. Al manejar las fechas es algo distinto que en MySql. Puede que salga el siguiente error.
</p>

> Error de conversión. Estás insertando un dato de tipo nvarchar en un campo datetime.

<p>
	En mi caso, solucione este problema de la siguiente manera: En **App\Model\Link**, con una propiedad protegida, le quitamos los guiones a la fecha:
</p>

```
protected $dateFormat = 'Ymd H:i:s';
```
<p>
	Otra cosa que debe tener en cuenta es el cómo laravel maneja las rutas. Si queremos acortar una url corta personalizada, por ejemplo: *jhossweb/SdgS*, laravel va a seperar esa ruta y va a tomar cada parte
	como parámetros separados. 
</p>
<p>
	Para evitarlo, en el archvo routes.php, debemos crear una ruta de la siguiente manera:
</p>

```
Route::get("/{short}", [LinkController::class, 'searchShort'])
		->where('short', '.*')
		->name("short.search");
```
