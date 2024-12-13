namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModLog extends Model
{
    use HasFactory;

    // Déclare les champs qui peuvent être remplis via l'attribut `$fillable`
    protected $fillable = ['mod_name', 'detected_at'];
}
