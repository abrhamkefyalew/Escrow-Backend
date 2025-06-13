<?php

namespace App\Services\Api\V1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class FilteringService
{
    public static function addTrashed($request, Builder $builder)
    {
        // if (auth()->check()) {
        //     if (auth()->user()->is_system_user) {
        //         if (isset($request['with_trashed'])) {
        //             $builder = $builder->withTrashed();
        //         }

        //         if (isset($request['only_trashed'])) {
        //             $builder = $builder->onlyTrashed();
        //         }
        //     }
        // }

        // return $builder;


        if (auth()->guard()->check()) {
            if (auth()->guard()->user()->is_system_user) {
                if (isset($request['with_trashed'])) {
                    $builder = $builder->withTrashed();
                }

                if (isset($request['only_trashed'])) {
                    $builder = $builder->onlyTrashed();
                }
            }
        }

        return $builder;


    }

    public static function filterBy($request, Builder $builder, $columnName)
    {
        if (isset($request[$columnName])) {
            $filter = $request[$columnName];
            $builder = $builder->where($columnName, 'like', '%'.$filter.'%');
        }

        return $builder;
    }

    public static function filterByName($request, Builder $builder, $nameColumn = null)
    {
        if (isset($request['name'])) {
            $name = $request['name'];
            $builder = $builder->where($nameColumn ?: 'name', 'like', '%'.$name.'%');
        }

        return $builder;
    }

    public static function filterByType($request, Builder $builder, $typeColumn = null)
    {
        if (isset($request['type'])) {
            $type = $request['type'];
            $builder = $builder->where($typeColumn ?: 'type', 'like', '%'.$type.'%');
        }

        return $builder;
    }

    public static function filterByTitle($request, Builder $builder)
    {
        if (isset($request['title'])) {
            $builder = $builder->where('title', 'like', '%'.$request['title'].'%');
        }

        return $builder;
    }

    public static function filterByStatus($request, Builder $builder)
    {
        if (isset($request['status'])) {
            $status = $request['status'];
            $builder = $builder->where('status', 'like', '%'.$status.'%');
        }

        return $builder;
    }

    public static function filterByCreatedDateRange($request, Builder $builder)
    {
        if (isset($request['date'])) {
            if (isset($request['date']['from'])) {
                $builder = $builder->where('created_at', '>=', Carbon::parse($request['date']['from']));
            }

            if (isset($request['date']['until'])) {
                $builder = $builder->where('created_at', '<=', Carbon::parse($request['date']['until']));
            }
        }

        return $builder;
    }

    public static function filterByXCreatedTimeMinutes($request, Builder $builder)
    {
        if (isset($request['last_x_minutes'])) {
            if ($request['last_x_minutes']) {
                $builder = $builder->where('created_at', '>=', Carbon::parse(now())->subMinutes($request['last_x_minutes']));
            }
        }

        return $builder;
    }

    public static function filterByAllNames($request, Builder $builder)
    {
        if (isset($request['name'])) {
            $name = $request['name'];
            $names = explode(' ', $name);
            if (count($names) === 1) {
                $builder = $builder->where(fn (Builder $query) => $query
                    ->where('first_name', 'like', '%'.$name.'%')
                    ->orWhere('last_name', 'like', '%'.$name.'%')
                );
            }
            if (count($names) === 2) {
                $builder = $builder->where(fn (Builder $query) => $query
                    ->where('first_name', 'like', '%'.$names[0].'%')
                    ->where('last_name', 'like', '%'.$names[1].'%')
                );
            }
        }

        return $builder;
    }

    public static function filterByPhoneNumber($request, Builder $builder)
    {
        if (isset($request['phone_number'])) {
            $builder = $builder->where('phone_number', 'like', '%'.$request['phone_number'].'%');
        }

        return $builder;
    }

    public static function filterById($request, Builder $builder)
    {
        if (isset($request['id'])) {
            $id = $request['id'];
            $builder = $builder->where('id', 'like', '%'.$id.'%');
        }

        return $builder;
    }

    

    public static function filterByPriceRange($request, Builder $builder)
    {
        if (isset($request['price'])) {
            if (isset($request['price']['gte'])) {
                $builder = $builder->where('price', '>=', $request['price']['gte']);
            }

            if (isset($request['price']['lte'])) {
                $builder = $builder->where('price', '<=', $request['price']['lte']);
            }
        }

        return $builder;
    }

    

    public static function getPaginate($request = null)
    {
        if (isset($request['paginate']) && is_int((int) $request['paginate'])) {
            return (int) $request['paginate'];
        }
        //in the above if - The is_int function checks if a variable is of type integer, but when casting a string to an integer in PHP, if the string contains non-numeric characters, PHP will convert it to 0.


        

        // abrham check this code
        // if (!is_numeric($request->input('paginate'))) {
        //     // the code here is to check if the paginate variable is not numeric , i.e if alphabet is sent like paginate = "oeir".    it should return a corrective ERROR // , 
        //     return response()->json(['message' => 'The paginate variable should be an integer.'], 400);
        // }

        return 10;
    }
}
