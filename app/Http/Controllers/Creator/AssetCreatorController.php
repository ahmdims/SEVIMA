<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Creator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class AssetCreatorController
 *
 * Controller ini mengelola proses CRUD untuk asset yang dibuat oleh creator,
 * termasuk pengunggahan gambar dengan watermark, penyimpanan file privat, dan pengelolaan keyword.
 *
 * @package App\Http\Controllers\Creator
 */
class AssetCreatorController extends Controller
{
    /**
     * Menampilkan daftar asset milik creator yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();

        $asset = Asset::whereHas('creator', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->orderBy('created_at', 'desc')->get();

        $category = Category::all();

        return view('creator.asset.index', compact('asset', 'category'));
    }

    /**
     * Menyimpan asset baru yang diunggah oleh creator.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $creator = Creator::where('user_id', $user->id)->firstOrFail();

        $decodedKeywords = json_decode($request->input('keyword', '[]'), true);
        if (!is_array($decodedKeywords)) {
            $decodedKeywords = [];
        }
        $request->merge(['keyword' => $decodedKeywords]);

        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'asset' => 'required|file|mimes:zip,rar|max:512000',
            'keyword' => 'required|array',
            'keyword.*' => 'string|max:50',
        ]);

        // Proses unggah gambar dengan watermark
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.webp';
            $imagePath = 'image/' . $imageName;

            $img = Image::make($image->getRealPath())
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

            // Tambahkan watermark jika tersedia
            $watermarkPath = public_path('assets/media/logos/default.png');
            if (file_exists($watermarkPath)) {
                $watermark = Image::make($watermarkPath)->resize(150, 34)->opacity(25);
                $rotatedWatermark = $watermark->rotate(-45);

                $width = $img->width();
                $height = $img->height();

                $stepX = 200;
                $stepY = 200;

                for ($x = -$width; $x < $width * 2; $x += $stepX) {
                    for ($y = -$height; $y < $height * 2; $y += $stepY) {
                        $img->insert($rotatedWatermark, 'top-left', $x, $y);
                    }
                }
            }

            Storage::disk('public')->put($imagePath, (string) $img->encode('webp', 75));
        }

        // Simpan file asset ke storage privat
        $assetPath = $request->file('asset')->store('asset', 'private');

        // Simpan ke database
        Asset::create([
            'id' => Str::uuid(),
            'creator_id' => $creator->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'asset' => $assetPath,
            'price' => $request->price ?? null,
            'keyword' => empty($request->keyword) ? json_encode([]) : json_encode($request->keyword),
            'status' => 0,
        ]);

        return redirect()->back()->with('success', 'Asset created successfully!');
    }

    /**
     * Mengunduh file asset yang sudah diupload oleh creator.
     *
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download($id)
    {
        $asset = Asset::findOrFail($id);

        if (!$asset->asset || !Storage::disk('private')->exists($asset->asset)) {
            abort(404, 'File not found');
        }

        $timestamp = Carbon::now()->format('Y-m-d-H-i-s-v');
        $title = preg_replace(['/[^A-Za-z0-9\s-]/', '/\s+/'], ['', '-'], trim($asset->title));
        $uuid = Str::uuid()->getHex();
        $extension = pathinfo($asset->asset, PATHINFO_EXTENSION);

        $fileName = "{$title}_{$timestamp}_{$uuid}.{$extension}";

        return Storage::disk('private')->download($asset->asset, $fileName);
    }

    /**
     * Memperbarui data asset milik creator.
     *
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $decodedKeywords = json_decode($request->input('keyword', '[]'), true);
        if (!is_array($decodedKeywords)) {
            $decodedKeywords = [];
        }
        $request->merge(['keyword' => $decodedKeywords]);

        $request->validate([
            'title' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'asset' => 'nullable|file|mimes:zip,rar|max:512000',
            'keyword' => 'nullable|array',
            'keyword.*' => 'string|max:50',
        ]);

        $asset = Asset::findOrFail($id);

        // Update gambar jika ada
        $imagePath = $asset->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '.webp';
            $imagePath = 'image/' . $imageName;

            $img = Image::make($image->getRealPath())
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

            $watermarkPath = public_path('assets/media/logos/default.png');
            if (file_exists($watermarkPath)) {
                $watermark = Image::make($watermarkPath)->resize(150, 34)->opacity(25);
                $rotatedWatermark = $watermark->rotate(-45);

                $width = $img->width();
                $height = $img->height();

                $stepX = 200;
                $stepY = 200;

                for ($x = -$width; $x < $width * 2; $x += $stepX) {
                    for ($y = -$height; $y < $height * 2; $y += $stepY) {
                        $img->insert($rotatedWatermark, 'top-left', $x, $y);
                    }
                }
            }

            Storage::disk('public')->put($imagePath, (string) $img->encode('webp', 75));
        }

        // Update file asset jika ada
        $assetPath = $asset->asset;
        if ($request->hasFile('asset')) {
            if ($assetPath) {
                Storage::disk('private')->delete($assetPath);
            }
            $assetPath = $request->file('asset')->store('asset', 'private');
        }

        // Update data di database
        $asset->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'asset' => $assetPath,
            'keyword' => empty($request->keyword) ? json_encode([]) : json_encode($request->keyword),
        ]);

        return redirect()->back()->with('success', 'Asset updated successfully!');
    }

    /**
     * Menghapus asset yang dipilih berdasarkan ID.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect()->route('creator.asset.index')->with('success', 'Asset deleted successfully!');
    }
}
