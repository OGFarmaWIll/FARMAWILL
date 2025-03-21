<?php

namespace App\Servicio;

class ImagenServicio {


    public static function subirImagen($file, $path)
    {
        $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
        
        $file->storeAs($path, $filename, 'public');
        return $filename;
    }


    public static function eliminarImagen($filename, $path)
    {
        $fullPath = public_path('storage/' . $path . '/' . $filename);
        if ($filename && file_exists($fullPath)) {
            unlink($fullPath);
        }
    }


   

    
}






?>

