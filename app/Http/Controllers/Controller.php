<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function convertObjectsToArray($data): mixed
    {
        // Если данные - массив, рекурсивно обрабатываем каждый элемент
        if (is_array($data)) {
            return array_map(fn($item) => self::convertObjectsToArray($item), $data);
        }

        // Если данные - объект, преобразуем его в массив и рекурсивно обрабатываем
        if (is_object($data)) {
            return self::convertObjectsToArray(
                json_decode(
                    json_encode($data),
                    true
                )
            );
        }

        // Если данные не являются массивом или объектом, возвращаем их как есть
        return $data;
    }
}
