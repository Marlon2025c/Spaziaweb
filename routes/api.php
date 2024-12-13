use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EverGardenController;

Route::post('/EverGarden', [EverGardenController::class, 'store']);
