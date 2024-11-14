// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function showLoginForm($role)
    {
        return view('auth.login', compact('role'));
    }

    public function login(Request $request)
    {
        // Proses login berdasarkan role
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing');
    }
}
