## Rutas en Laravel

Una gran ventaja de sincronizar los directorios **"sites"** de la máquina virtual y de la anfitriona, es que permite trabajar en los archivos de la página web desde un editor de texto de preferencia, en este caso, se utilizó **VSCodium**.

Todos los sitios aquí mencionados se encuentran dentro del entorno **lfts.isw811.xyz** creado con **Laravel**.

En la carpeta **"routes"** está el archivo **web.php** que administra las vistas con sus endpoints respectivos. Los archivos con las vistas están en la carpeta **resources/views**.
Por defecto, se establece la vista **"welcome"** asignada al endpoint **GET "/"**:

    Route::get('/', function () {
        return view('welcome');
    });
El archivo con la vista **"welcome"** se llama **welcome.blade.php**, pero solo se debe ingresar el primer string descriptivo de su nombre para que pueda ser encontrado. 
Por otro lado, la función puede modificarse eliminando la palabra **"view"** y escribiendo directamente un mensaje dentro del **return**. Esto funcionará, aunque es poco práctico:

    Route::get('/', function () {
        return ('welcome');
    });


## Archivos CSS y JS en Laravel

Para crear estilos propios o scripts dentro de la página, se requiere agregar los archivos tipo **.css, .js** dentro del directorio  **public**.

## Crear Nueva Vista

Dentro de la ruta **resources/views** se creará un archivo con fines ilustrativos llamado **"posts.blade.php"**, donde se agregará una estructura básica de html para desarrollar un blog.
Dentro del archivo **"web.blade.php"** de incorpora un nuevo endpoint que retorne la vista creada anteriormente:

## Agregar Clases

Las clases para crear objetos se ubican en el directorio **Models**.
Al utilizar una clase debe importarse el entorno con **use App\Models\ _nombre de la clase_;**. En el ejemplo se contruye la clase **Post**, con sus atributos y constructor:

    class Post
    {
        public $title;
        public $excerpt;
        public $date;
        public $body;
        public $slug;

        public function __construct($title, $excerpt, $date, $body, $slug){
            $this->title = $title;
            $this->excerpt = $excerpt;
            $this->date = $date;
            $this->body = $body;
            $this->slug = $slug;
        }
    }

## Subdividir archivos HTML

Para lograr ordenar la estructura del archivo HTML, se pueden crear subdivisiones que contengan información y mostrarlas solo cuando sea requerido, ésto aporta dinamismo a la página web. En el ejemplo se guardan varios **posts** del usuario en archivos por separado, contenidos en un directorio creado manualmente para los mismos , dentro de la carpeta **Resources** (**_resources/ posts_**). Para que ésto funcione, es necesario crear un método que cargue el **"post"** correspondiente.

## Memoria Cache

Es posible crear una función que alamcene información en la memoria cache para reducir el tiempo de carga de la página. Se puede establecer el tiempo de expiración de la memoria a conveniencia (segundos, minutos, horas, días, etc).
En la siguiente función de la clase **Post**, se encuentra envuelta en un método que guarda la información del _return_ de forma indefinida 
(**return cache()->remenberForever(...)**):

        public static function all()
    {
        return cache()->rememberForever('post.all', function(){
            return collect(File::files(resource_path("posts")))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            ->sortByDesc('date');
        });
    }

## Yaml Front Matter

Yaml Front Matter es una herramienta que permite acceder a la información contenida en la _metadata_ de un archivo, funciona de manera similar al formato **Json**. Yaml Front Matter se puede instalar por medio de **Composer** con el siguiente comando dentro de la terminal: 
    
    $ composer require spatie/yaml-front-matter

La metadata debe estar contenida dentro de tres guiones seguidos al inicio y al final de ella. En el siguiente ejemplo, se nota la similitud con archivos tipo **Json** que utilizarn pares de _llave => valor_, para este caso, se anotan valores a las propiedades de **_title, slug, excerpt y date_ **:

    ---
    title: Primer Post
    slug: primer-post
    excerpt: Una hablada random.
    date: 24-12-1998
    ---

Para obtener la información se puede utilizar una función que cree un objeto, la instrucción **"YamlFrontMatter::parseFile(...)"** será la encargada de "convertir" los datos para su obtención, se utiliza el ejemplo anterior ya implementado:

            public static function all()
    {
        return cache()->rememberForever('post.all', function(){
            return collect(File::files(resource_path("posts")))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            ->sortByDesc('date');
        });
    }

**collect** crea un array con los archivos **("posts")** contenidos en el directorio **"resources"**, utilizando un método que lleva directamente a la ruta **(resource_path)**. 
La función **->map(fn ($file) => YamlFrontMatter::parseFile($file))** recorre cada archivo para crear un objeto usando la clase **Post**, que itera uno por uno con la siguente función **->map(fn ($document) => new Post(...)**. 
Al final de la función es posible ordenar los datos por determinados parámetros, en este caso, se organiza la información por medio de la fecha de forma descendiente: 
    
    ->sortByDesc('date')



