use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Halaman depan
Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

// Halaman login dan register
Route::get('/login/{role}', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register/{role}', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Pengumuman
Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.detail');

// Dashboard
Route::middleware(['auth'])->group(function () {
    // Dashboard untuk siswa
    Route::get('/dashboard/siswa', [DashboardController::class, 'siswa'])->name('dashboard.siswa');

    // Dashboard untuk guru
    Route::get('/dashboard/guru', [DashboardController::class, 'guru'])->name('dashboard.guru');
    
    // Dashboard untuk administrasi
    Route::get('/dashboard/administrasi', [DashboardController::class, 'administrasi'])->name('dashboard.administrasi');

    // Dashboard untuk manajemen
    Route::get('/dashboard/management', [DashboardController::class, 'management'])->name('dashboard.management');

    // Dashboard untuk orang tua
    Route::get('/dashboard/orangtua', [DashboardController::class, 'orangTua'])->name('dashboard.orangtua');
});

// Siswa dan Guru
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/jadwal', [StudentController::class, 'showSchedule'])->name('student.schedule');
    Route::get('/presensi', [AttendanceController::class, 'showAttendance'])->name('student.attendance');
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/presensi/create', [AttendanceController::class, 'create'])->name('presensi.create');
    Route::post('/presensi/store', [AttendanceController::class, 'store'])->name('presensi.store');
    Route::get('/presensi/{attendance}/edit', [AttendanceController::class, 'edit'])->name('presensi.edit');
    Route::put('/presensi/{attendance}', [AttendanceController::class, 'update'])->name('presensi.update');
    Route::delete('/presensi/{attendance}', [AttendanceController::class, 'destroy'])->name('presensi.destroy');
});

// Administrasi
Route::middleware(['auth', 'role:administrasi'])->group(function () {
    // Manajemen Siswa dan Guru
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    
    // Pengelolaan Pembayaran
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
});

// Manajemen
Route::middleware(['auth', 'role:management'])->group(function () {
    // Laporan Kehadiran
    Route::get('/reports/attendance', [ReportController::class, 'attendance'])->name('reports.attendance');

    // Laporan Pembayaran
    Route::get('/reports/payments', [ReportController::class, 'payments'])->name('reports.payments');
    
    // Manajemen Pengguna
    Route::get('/users', [RoleController::class, 'index'])->name('users.index');
    Route::get('/users/create', [RoleController::class, 'create'])->name('users.create');
    Route::post('/users/store', [RoleController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [RoleController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [RoleController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [RoleController::class, 'destroy'])->name('users.destroy');
});

// Pengumuman untuk Management
Route::middleware(['auth', 'role:management'])->group(function () {
    Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
    Route::post('/announcements/store', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::put('/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
});
