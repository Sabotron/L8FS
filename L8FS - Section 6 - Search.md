# Buscar con Laravel en la Base de Datos

En Laravel es posible encontrar datos que coincidan con el texto ingresado por el usuario en un campo de búsqueda. Hay dos maneras de hacerlo, la primera se ejecuta directamente desde el archivo **wep.php** que se encuentra en el directorio **routes** del proyecto:

    Route::get('/', function () {  # versión pobre
 
    $posts = Post::latest();
    if(request('search')){
        $posts
        ->where('title', 'like', '%' . request('search') . '%')
        ->orwhere('body', 'like', '%' . request('search') . '%');
    }
    return view('posts',  [
        'posts' => $posts->get(),
        'categories' => Category::all()
    ]);
    })->name('home');

El otro método requiere la utilización de un controlador, éste tiene el nombre descriptivo de **_PostController_**. Se creará un archivo con este mismo nombre, en la ruta **app/Http/Controllers**. El comando es el siguiente:

    $ sudo php artisan make:controller PostController

Así debe quedar el controlador con las funciones mejoradas:

    <?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use App\Models\Category;
    use Illuminate\Http\Request;

    class PostController extends Controller
    {
        public function index(){
            return view('posts',  [
                'posts' => Post::latest()->filter(request(['search']))->get(),
                'categories' => Category::all()
            ]);
        }


        public function show(Post $post){
            return view('post',[
                'post' => $post
            ]);
        }
    }

En el archivo **web.php** donde se manejan las rutas, se crea la invocación de las funciones correspondientes: 

    Route::get('/', [PostController::class, 'index'])->name('home');

    Route::get('posts/{post:slug}',[PostController::class,'show']);

En el modelo **(app/Models/Post.php)**, se debe agregar la función que hace la consulta con la base de datos: 
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){                 
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orwhere('body', 'like', '%' . $search . '%');
        });
  
    }



