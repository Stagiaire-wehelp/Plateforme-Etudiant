<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi|max:20000', // Vérifie que le fichier est un mp4, mov ou avi et fait moins de 20MB
        ]);

        if ($request->file('video')->isValid()) {
            $videoName = time().'.'.$request->video->extension(); // Génère un nom unique pour la vidéo
            $request->video->move(public_path('videos'), $videoName); // Déplace la vidéo vers le dossier public/videos

            return response()->json(['success' => 'Video uploaded successfully.']);
        }

        return response()->json(['error' => 'Invalid video file.'], 400);
    }
    
}
