# Filtrar Búsquedas con Laravel

Es necesario agregar los parámetros de los elementos que se quieren filtrar en la función encargada de las búsquedas, (creada en el modelo **Post.php** durante la sección anterior), la cuál se subdivide en búsqueda general/búsqueda filtrando categorías/búsqueda filtrando autores :

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>

        $query->where(fn($query)=>
            $query->where('title', 'like', '%' . $search . '%')
            ->orwhere('body', 'like', '%' . $search . '%')));

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereHas('category', fn ($query) =>
        $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas('author', fn ($query) =>
        $query->where('username', $author)));
    }
    
Con esta función, el archivo con el controlador **PostController.php** requiere unas pequeñas adaptaciones para enviarle los nuevos parámetros de los filtros (_category_ , _author_). Además, se instancia la función **paginate** para organizar una cantidad a elegir de items por página (Sección 8 del tutorial): 

    class PostController extends Controller
    {
        public function index()
        {
            return view('posts.index',  [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString()
        ]);
    }


El archivo de las rutas **web.php** se simplificó al implementar las funciones en el modelo **Post.php** que son gestionadas por el controlador **PostController.php**:

    <?php # Archivo web.php

    use App\Http\Controllers\PostController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', [PostController::class, 'index'])->name('home');
    Route::get('posts/{post:slug}', [PostController::class, 'show']);





