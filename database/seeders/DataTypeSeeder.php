<?php

namespace Database\Seeders;

use App\Models\DataType;
use Illuminate\Database\Seeder;

class DataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $d = [

            ["name" => "id", "most" => 1],

            ["name" => "integer", "most" => 1],
            ["name" => "boolean", "most" => 1],

            ["name" => "decimal", "most" => 1],
            ["name" => "double", "most" => 1],

            ["name" => "float", "most" => 1],

            ["name" => "foreignId", "most" => 1],
            ["name" => "softDeletes", "most" => 1],

            ["name" => "string", "most" => 1],
            ["name" => "longText", "most" => 1],
            ["name" => "text", "most" => 1],

            ["name" => "date", "most" => 1],
            ["name" => "dateTime", "most" => 1],
            ["name" => "time", "most" => 1],

            ["name" => "timestamp", "most" => 1],

//not
            ["name" => "enum", "most" => 0],
            ["name" => "increments", "most" => 0],

            ["name" => "bigIncrements", "most" => 0],
            ["name" => "bigInteger", "most" => 0],
            ["name" => "binary", "most" => 0],

            ["name" => "char", "most" => 0],
            ["name" => "dateTimeTz", "most" => 0],
            ["name" => "ipAddress", "most" => 0],
            ["name" => "json", "most" => 0],
            ["name" => "jsonb", "most" => 0],
            ["name" => "lineString", "most" => 0],
            ["name" => "foreignIdFor", "most" => 0],
            ["name" => "foreignUuid", "most" => 0],
            ["name" => "geometryCollection", "most" => 0],
            ["name" => "geometry", "most" => 0],
            ["name" => "macAddress", "most" => 0],
            ["name" => "mediumIncrements", "most" => 0],
            ["name" => "mediumInteger", "most" => 0],
            ["name" => "mediumText", "most" => 0],
            ["name" => "morphs", "most" => 0],
            ["name" => "multiLineString", "most" => 0],
            ["name" => "multiPoint", "most" => 0],
            ["name" => "multiPolygon", "most" => 0],
            ["name" => "nullableMorphs", "most" => 0],
            ["name" => "nullableTimestamps", "most" => 0],
            ["name" => "nullableUuidMorphs", "most" => 0],

            ["name" => "point", "most" => 0],
            ["name" => "polygon", "most" => 0],
            ["name" => "rememberToken", "most" => 0],
            ["name" => "set", "most" => 0],
            ["name" => "smallIncrements", "most" => 0],
            ["name" => "smallInteger", "most" => 0],
            ["name" => "softDeletesTz", "most" => 0],

            ["name" => "timeTz", "most" => 0],
            ["name" => "timestampTz", "most" => 0],
            ["name" => "timestampsTz", "most" => 0],
            ["name" => "timestamps", "most" => 0],
            ["name" => "tinyIncrements", "most" => 0],
            ["name" => "tinyInteger", "most" => 0],
            ["name" => "tinyText", "most" => 0],
            ["name" => "unsignedBigInteger", "most" => 0],
            ["name" => "unsignedDecimal", "most" => 0],
            ["name" => "unsignedInteger", "most" => 0],
            ["name" => "unsignedMediumInteger", "most" => 0],
            ["name" => "unsignedSmallInteger", "most" => 0],
            ["name" => "unsignedTinyInteger", "most" => 0],
            ["name" => "uuidMorphs", "most" => 0],
            ["name" => "uuid", "most" => 0],
            ["name" => "year", "most" => 0],

        ];

        foreach ($d as $key => $value) {
            DataType::create(
                [
                    "name" => $value['name'],
                    "most" => $value['most'],
                ]);
        }

    }
}
