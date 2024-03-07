<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ObjectFilesTableWithoutDummyDataSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('object_files')->delete();

        \DB::table('object_files')->insert(array(
            array(
                "id" => 2,
                "object_type" => "theme_options",
                "object_id" => 1,
                "file_id" => 1167,
            ),
            array(
                "id" => 6,
                "object_type" => "theme_options",
                "object_id" => 11,
                "file_id" => 1168,
            ),
           
            array(
                "id" => 42,
                "object_type" => "users",
                "object_id" => 1,
                "file_id" => 667,
            ),
           
            array(
                "id" => 154,
                "object_type" => "preferences",
                "object_id" => 48,
                "file_id" => 1168,
            ),
            array(
                "id" => 155,
                "object_type" => "preferences",
                "object_id" => 47,
                "file_id" => 1169,
            ),
           
            array(
                "id" => 235,
                "object_type" => "blogs",
                "object_id" => 31,
                "file_id" => 1113,
            ),
            array(
                "id" => 236,
                "object_type" => "blogs",
                "object_id" => 32,
                "file_id" => 1114,
            ),
            array(
                "id" => 251,
                "object_type" => "use_cases",
                "object_id" => 1,
                "file_id" => 1143,
            ),
            array(
                "id" => 252,
                "object_type" => "use_cases",
                "object_id" => 2,
                "file_id" => 1144,
            ),
            array(
                "id" => 253,
                "object_type" => "use_cases",
                "object_id" => 3,
                "file_id" => 1159,
            ),
            array(
                "id" => 254,
                "object_type" => "use_cases",
                "object_id" => 4,
                "file_id" => 1148,
            ),
            array(
                "id" => 255,
                "object_type" => "use_cases",
                "object_id" => 5,
                "file_id" => 1164,
            ),
            array(
                "id" => 256,
                "object_type" => "use_cases",
                "object_id" => 6,
                "file_id" => 1158,
            ),
            array(
                "id" => 257,
                "object_type" => "use_cases",
                "object_id" => 7,
                "file_id" => 1158,
            ),
            array(
                "id" => 258,
                "object_type" => "use_cases",
                "object_id" => 8,
                "file_id" => 1165,
            ),
            array(
                "id" => 259,
                "object_type" => "use_cases",
                "object_id" => 9,
                "file_id" => 1162,
            ),
            array(
                "id" => 260,
                "object_type" => "use_cases",
                "object_id" => 10,
                "file_id" => 1166,
            ),
            array(
                "id" => 261,
                "object_type" => "use_cases",
                "object_id" => 11,
                "file_id" => 1163,
            ),
            array(
                "id" => 262,
                "object_type" => "use_cases",
                "object_id" => 12,
                "file_id" => 1157,
            ),
            array(
                "id" => 263,
                "object_type" => "use_cases",
                "object_id" => 13,
                "file_id" => 1160,
            ),
            array(
                "id" => 264,
                "object_type" => "use_cases",
                "object_id" => 14,
                "file_id" => 1147,
            ),
            array(
                "id" => 265,
                "object_type" => "use_cases",
                "object_id" => 15,
                "file_id" => 1159,
            ),
            array(
                "id" => 266,
                "object_type" => "use_cases",
                "object_id" => 16,
                "file_id" => 1145,
            ),
            array(
                "id" => 267,
                "object_type" => "use_cases",
                "object_id" => 17,
                "file_id" => 1155,
            ),
            array(
                "id" => 268,
                "object_type" => "use_cases",
                "object_id" => 18,
                "file_id" => 1161,
            ),
            array(
                "id" => 269,
                "object_type" => "use_cases",
                "object_id" => 19,
                "file_id" => 1146,
            ),
            array(
                "id" => 270,
                "object_type" => "use_cases",
                "object_id" => 20,
                "file_id" => 1159,
            ),
            array(
                "id" => 271,
                "object_type" => "use_cases",
                "object_id" => 21,
                "file_id" => 1159,
            ),
            array(
                "id" => 272,
                "object_type" => "use_cases",
                "object_id" => 22,
                "file_id" => 1159,
            ),
            array(
                "id" => 273,
                "object_type" => "use_cases",
                "object_id" => 23,
                "file_id" => 1159,
            ),
            array(
                "id" => 274,
                "object_type" => "use_cases",
                "object_id" => 24,
                "file_id" => 1157,
            ),
            array(
                "id" => 275,
                "object_type" => "use_cases",
                "object_id" => 25,
                "file_id" => 1157,
            ),
            array(
                "id" => 276,
                "object_type" => "use_cases",
                "object_id" => 26,
                "file_id" => 1157,
            ),
            array(
                "id" => 277,
                "object_type" => "use_cases",
                "object_id" => 27,
                "file_id" => 1157,
            ),
            array(
                "id" => 278,
                "object_type" => "use_cases",
                "object_id" => 28,
                "file_id" => 1157,
            ),
            array(
                "id" => 279,
                "object_type" => "use_cases",
                "object_id" => 29,
                "file_id" => 1150,
            ),
            array(
                "id" => 280,
                "object_type" => "use_cases",
                "object_id" => 30,
                "file_id" => 1149,
            ),
            array(
                "id" => 281,
                "object_type" => "use_cases",
                "object_id" => 31,
                "file_id" => 1156,
            ),
            array(
                "id" => 282,
                "object_type" => "use_cases",
                "object_id" => 32,
                "file_id" => 1151,
            ),
            array(
                "id" => 283,
                "object_type" => "use_cases",
                "object_id" => 33,
                "file_id" => 1152,
            ),
            array(
                "id" => 284,
                "object_type" => "use_cases",
                "object_id" => 34,
                "file_id" => 1153,
            ),
            array(
                "id" => 285,
                "object_type" => "use_cases",
                "object_id" => 35,
                "file_id" => 1154,
            ),
            array(
                "id" => 286,
                "object_type" => "use_cases",
                "object_id" => 36,
                "file_id" => 1154,
            ),
            array(
                "id" => 287,
                "object_type" => "use_cases",
                "object_id" => 37,
                "file_id" => 1159,
            ),
            array(
                "id" => 288,
                "object_type" => "preferences",
                "object_id" => 114,
                "file_id" => 1167,
            ),
            array(
                "id" => 289,
                "object_type" => "preferences",
                "object_id" => 115,
                "file_id" => 1168,
            ),
            array(
                "id" => 290,
                "object_type" => "theme_options",
                "object_id" => 91,
                "file_id" => 1168,
            ),
            array(
                "id" => 291,
                "object_type" => "theme_options",
                "object_id" => 93,
                "file_id" => 1168,
            ),
            array(
                "id" => 292,
                "object_type" => "use_cases",
                "object_id" => 38,
                "file_id" => 1170,
            ),
            array(
                "id" => 294,
                "object_type" => "blogs",
                "object_id" => 35,
                "file_id" => 1185,
            ),
            array(
                "id" => 295,
                "object_type" => "blogs",
                "object_id" => 36,
                "file_id" => 1184,
            ),
            array(
                "id" => 296,
                "object_type" => "blogs",
                "object_id" => 38,
                "file_id" => 1183,
            ),
            array(
                "id" => 297,
                "object_type" => "blogs",
                "object_id" => 39,
                "file_id" => 1182,
            ),
            array (
                'file_id' => 1186,
                'id' => 298,
                'object_id' => 1,
                'object_type' => 'chat_bots',
            ),
        ));


    }
}
