<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Menampilkan daftar kamar
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.room.room_list', compact('rooms')); // Use forward slashes
    }

    /**
     * Menampilkan form tambah kamar
     */
    public function create()
    {
        return view('admin.room.create');
    }

    /**
     * Menyimpan kamar baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_number' => 'required|unique:rooms|max:10',
            'room_type' => 'required|in:standard,deluxe,suite',
            'price_per_night' => 'required|numeric|min:0',
            'status' => 'required|in:available,occupied,maintenance',
            'facilities' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();
        
        // Encode facilities jika ada
        if (isset($validatedData['facilities'])) {
            $validatedData['facilities'] = json_encode($validatedData['facilities']);
        }

        Room::create($validatedData);

        return redirect()->route('admin.room.room_list') // Ensure this route name matches your routes
            ->with('success', 'Kamar berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit kamar
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.room.edit', compact('room')); // Ensure you have this view
    }

    /**
     * Menampilkan detail kamar
     */
    public function show($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('admin.room.detail', compact('room')); // Ensure this view path is correct
    }

    /**
     * Memperbarui data kamar
     */
    public function update(Request $request, $room_id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'room_number' => 'required|unique:rooms,room_number,' . $room_id, // Ensure unique validation ignores current room
            'room_type' => 'required|in:standard,deluxe,suite',
            'price_per_night' => 'required|numeric|min:0',
            'status' => 'required|in:available,occupied,maintenance'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Cari kamar
            $room = Room::findOrFail($room_id);

            // Update data
            $room->update($validator->validated());

            // Kembalikan respons sukses
            return response()->json([
                'message' => 'Kamar berhasil diperbarui',
                'room' => $room
            ], 200);

        } catch (\Exception $e) {
            // Tangani error
            return response()->json([
                'message' => 'Gagal memperbarui kamar',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menghapus kamar
     */
    public function destroy($room_id)
    {
        try {
            $room = Room::findOrFail($room_id);
            $room->delete();

            return redirect()->route('admin.room.room_list') // Ensure this route name matches your routes
                ->with('success', 'Kamar berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus kamar');
        }
    }
}