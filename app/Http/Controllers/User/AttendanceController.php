<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttendanceController extends Controller
{
    public function absenPagiCreate(Request $request)
    {
        $validated = $request->validate([
            'start' => ['date_format:H:i', 'required'],
            'start_activity' => ['string', 'min:5', 'required'],
            'img_start' => ['required'],
        ]);

        // Decode Base64 image
        $img = $validated['img_start'];
        $image_parts = explode(';base64,', $img);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        // Generate unique filename
        $fileName = uniqid().'.'.$image_type;

        // Save file to 'public' disk
        $filePath = 'img/img_start/'.$fileName;
        Storage::disk('public')->put($filePath, $image_base64);

        // Update img_start path for database
        $validated['img_start'] = $filePath;

        // Save to database
        Attendance::create([
            'start' => $validated['start'],
            'start_activity' => $validated['start_activity'],
            'user_id' => $request->user()->id,
            'img_start' => $validated['img_start'],
        ]);

        return redirect()->route('user.attendance.index')->with('success', 'Attendance created successfully!');
    }

    public function absenSiangCreate(Request $request)
    {
        $latestAttendance = $request->user()->attendances()->latest('created_at')->first();

        $validated = $request->validate([
            'middle' => ['date_format:H:i'],
            'middle_activity' => ['string', 'min:5'],
        ]);

        $latestAttendance->fill([
            'middle' => $validated['middle'],
            'middle_activity' => $validated['middle_activity'],
        ]);

        $latestAttendance->save();

        return redirect()->route('user.attendance.index');
    }

    public function absenSoreCreate(Request $request)
    {
        $latestAttendance = $request->user()->attendances()->latest('created_at')->first();

        $validated = $request->validate([
            'end' => ['date_format:H:i', 'required'],
            'img_end' => ['required'],
        ]);

        // Decode Base64 image
        $img = $validated['img_end'];
        $image_parts = explode(';base64,', $img);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        // Generate unique filename
        $fileName = uniqid().'.'.$image_type;

        // Save file to 'public' disk
        $filePath = 'img/img_end/'.$fileName;
        Storage::disk('public')->put($filePath, $image_base64);

        $validated['img_end'] = $filePath;

        $latestAttendance->fill([
            'end' => $validated['end'],
            'img_end' => $validated['img_end'],
        ]);

        $latestAttendance->save();

        return redirect()->route('user.attendance.index');
    }

    public function absenIzinCreate(Request $request)
    {
        $validated = $request->validate([
            'alasan_izin' => 'required|min:5',
        ]);

        Attendance::create([
            'alasan_izin' => $validated['alasan_izin'],
            'user_id' => $request->user()->id,
            'izin_status' => 1,
        ]);

        return redirect()->route('user.attendance.index');
    }
}
