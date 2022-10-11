# Blade

## Vistas con Blade 

Blade compila el código **PHP** con una sintaxis simplidicada para el desarrollo de sitios web. Se requiere especificar en los archivos de las vistas el formato **"blade"** en su nombre, ej: **post.blade.php**
Se puede apreciar su implementación con la siguiente muestra de HTML, donde se obtiene el título de un post mediante php tradicional, y seguido a éste, la sintaxis de **blade**, que utiliza doble llaves conteniendo el elemento a consultar. Con ambos métodos se logra el mismo resultado:

    <!-- normal php --> <?= $post->title; ?> 
    <!-- blade--> {{ $post->title}} 

Debe tomarse en consideración que **blade** compila el código **PHP** sin problemas, aunque para trabajar con otros formatos, (por ejemplo HTML), debe modificarse la sintaxis para evitar resultados no deseados. En el caso de solicitar un bloque de HTML, se debe ingresar de esta manera:

    <!-- esto es HTML -->  {!! $post-> body !!} 

Nótese que ahora utiliza solo un par de llaves y en cada extremo dentro de éstas se coloca un par de símbolos de exclamación **(!)**.
De lo contrario, se mostrará el HTML con su estructura "cruda".

## Funciones con Blade

**Blade** también puede compilar código de funciones, como loops, aquí se comparan la forma tradicional de un **foreach**, primero con **PHP**, luego con la sintaxis de **Blade**.

PHP:

    <?php foreach ($posts as $post) : ?>
        
        do something...

    <?php endforeach; ?>

Blade:

    @foreach ($posts as $post)
     
     do something...

    @endforeach

## Layouts con Blade

Se entiende por **"layout"** como una plantilla con un formato HTML específico que comparten múltiples archivos. La idea es utilizar una sola cabecera con la meta-data y otros parámetros sin tener que repetirlo en cada uno de los documentos. Para eso, se crea un archivo llamado **"layout.blade.php"** en el directorio de las vistas. Éste contiene la información global del HTML:

        
    <!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="/app.css">
        <title>Laravel Workshop</title>
    </head>

    <body>
        @yield('content')
    </body>

Nótese en medio de los _<body>_ tags, la instrucción **"@yield('content')"**, 
en ella se "acoplará" la estructura desde otro archivo en el directorio **"views"** que cuente con la descripción de **'content'** utilizando el siguiente formato:

    @extends('layout') <--! adoptará el "layout" previamente creado -->

    @section('content') <--! define la sección 'content' que mostrará -->

    <div>
        <h1>{{$post ->title }}</h1>
    </div>
    <div>
    {!! $post-> body !!}
    </div>
    <a href="/">Volver</a>

    @endsection <--! señala el final de la sección 'content' -->

Los nombres de las secciones pueden ser cualquier cosa que las identifique.
Existe otra manera un poco más elavorada, aunque se utilizará ésta para fines prácticos.
