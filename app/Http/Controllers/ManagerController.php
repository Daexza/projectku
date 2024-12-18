<?php
namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Booking;
use Illuminate\Http\Request;

// app/Http/Controllers/ManagerController.php
class ManagerController extends Controller
{
    public function dashboard()
    {
        $totalCustomers = User::where('role', 'customer')->count();
        $totalPenginapan = booking::count();

        return view('manager.dashboard', [
            'totalCustomers' => $totalCustomers,
            'totalPenginapan' => $totalPenginapan
        ]);
    }

    public function daftarPenginapan()
    {
        // Hanya tampilkan penginapan milik manager yg login
        $penginapan = booking::where('manager_id', auth()->id())
            ->paginate(10);

        return view('manager.daftar-penginapan', compact('penginapan'));
    }

    public function tambahPenginapan()
    {
        return view('manager.tambah-penginapan');
    }

    public function simpanPenginapan(Request $request)
{
    // Validasi input
    $validasi = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:100',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'phone_number' => 'required|string|max:20',
        'facilities' => 'required|string',
        'rating' => 'required|numeric|min:0|max:5',
        'image_url' => 'nullable|url',
        'available_from' => 'required|date',
        'available_to' => 'required|date|after:available_from'
    ]);

    // Tambahkan logika upload foto jika diperlukan
    $imageUrl = $request->image_url;
    if ($request->hasFile('image')) {
        // Upload foto dan dapatkan URL
        $imagePath = $request->file('image')->store('pencarian_images', 'public');
        $imageUrl = Storage::url($imagePath);
    }

    // Simpan data ke tabel pencarian
    $pencarian = DB::table('pencarian')->insertGetId([
        'name' => $request->name,
        'description' => $request->description,
        'location' => $request->location,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'phone_number' => $request->phone_number,
        'facilities' => $request->facilities,
        'rating' => $request->rating,
        'image_url' => $imageUrl,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'available_from' => $request->available_from,
        'available_to' => $request->available_to
    ]);

    // View tambah penginapan
    return view('manager.tambah-penginapan');
}

public function customerList()
{
    // Dapatkan ID manager yang sedang login
    $managerId = auth()->id();

    // Ambil customers yang terkait dengan manager ini
    // Asumsikan Anda memiliki relasi antara booking, user, dan manager
    $customers = User::whereHas('bookings', function($query) use ($managerId) {
        $query->whereHas('manager', function($subQuery) use ($managerId) {
            $subQuery->where('user_id', $managerId);
        });
    })
    ->where('role', 'user') // Sesuaikan dengan skema role di database
    ->distinct()
    ->paginate(10);

    return view('manager.customer-list', compact('customers'));
}

// Atau versi alternatif dengan query mentah
public function listCustomers(Request $request)
    {
        // Query dasar untuk user
        $query = User::where('role', 'user');

        // Tambahkan fitur pencarian
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('full_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('phone_number', 'like', '%' . $searchTerm . '%');
            });
        }

        // Filter berdasarkan tanggal pendaftaran
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [
                $request->input('start_date'), 
                $request->input('end_date')
            ]);
        }

        // Tambahkan sorting
        $sortBy = $request->input('sort_by', 'created_at');
        $sortDirection = $request->input('sort_direction', 'desc');
        
        // Validasi kolom sort
        $allowedSortColumns = ['created_at', 'full_name', 'email', 'user_id'];
        $sortBy = in_array($sortBy, $allowedSortColumns) ? $sortBy : 'created_at';
        $sortDirection = in_array(strtolower($sortDirection), ['asc', 'desc']) ? $sortDirection : 'desc';

        $query->orderBy($sortBy, $sortDirection);

        // Ambil data dengan pagination
        $customers = $query->paginate(10);

        // Kembalikan view dengan data
        return view('manager.customer-list', [
            'customers' => $customers,
            'searchTerm' => $request->input('search'),
            'startDate' => $request->input('start_date'),
            'endDate' => $request->input('end_date'),
            'sortBy' => $sortBy,
            'sortDirection' => $sortDirection
        ]);
    }

    // Method untuk detail customer
    public function detailCustomer($id)
{
    // Cari customer berdasarkan ID
    $customer = User::where('role', 'user')
        ->findOrFail($id);

    // Ambil booking terkait dengan relasi
    $bookings = $customer->bookings()->paginate(10);

    return view('manager.customer-detail', [
        'customer' => $customer,
        'bookings' => $bookings
    ]);
}

    // Method untuk ekspor data customer
    public function exportCustomers(Request $request)
    {
        // Query dasar
        $query = User::where('role', 'user');

        // Terapkan filter yang sama seperti di listCustomers
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('full_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('phone_number', 'like', '%' . $searchTerm . '%');
            });
        }

        // Filter tanggal
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [
                $request->input('start_date'), 
                $request->input('end_date')
            ]);
        }

        // Ambil data
        $customers = $query->get();

        // Ekspor ke CSV
        $filename = 'customers_export_' . date('YmdHis') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $handle = fopen('php://output', 'w');
        
        // Header CSV
        fputcsv($handle, [
            'ID', 
            'Nama Lengkap', 
            'Email', 
            'Nomor Telepon', 
            'Alamat', 
            'Tanggal Daftar'
        ]);

        // Isi data
        foreach ($customers as $customer) {
            fputcsv($handle, [
                $customer->user_id,
                $customer->full_name,
                $customer->email,
                $customer->phone_number,
                $customer->address,
                $customer->created_at
            ]);
        }

        fclose($handle);

        return response()->stream(
            function() use ($handle) {},
            200,
            $headers
        );
    }
}
