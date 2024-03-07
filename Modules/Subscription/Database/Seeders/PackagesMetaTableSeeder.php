<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesMetaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('packages_meta')->delete();

        \DB::table('packages_meta')->insert(array (
            0 =>
            array (
                'id' => 607,
                'package_id' => 8,
                'feature' => '',
                'key' => 'duration',
                'value' => NULL,
            ),
            1 =>
            array (
                'id' => 608,
                'package_id' => 8,
                'feature' => '',
                'key' => 'usecaseCategory',
                'value' => '["1"]',
            ),
            2 =>
            array (
                'id' => 609,
                'package_id' => 8,
                'feature' => '',
                'key' => 'usecaseTemplate',
                'value' => '["google-ad-copy","facebook-ad-copy","keyword-generator","keyword-extractor","seo-meta-title-details","marketing-copy-strategies"]',
            ),
            3 =>
            array (
                'id' => 610,
                'package_id' => 8,
                'feature' => 'word',
                'key' => 'type',
                'value' => 'number',
            ),
            4 =>
            array (
                'id' => 611,
                'package_id' => 8,
                'feature' => 'word',
                'key' => 'is_value_fixed',
                'value' => '0',
            ),
            5 =>
            array (
                'id' => 612,
                'package_id' => 8,
                'feature' => 'word',
                'key' => 'title',
                'value' => 'Word limit',
            ),
            6 =>
            array (
                'id' => 613,
                'package_id' => 8,
                'feature' => 'word',
                'key' => 'title_position',
                'value' => 'before',
            ),
            7 =>
            array (
                'id' => 614,
                'package_id' => 8,
                'feature' => 'word',
                'key' => 'value',
                'value' => '50000',
            ),
            8 =>
            array (
                'id' => 615,
                'package_id' => 8,
                'feature' => 'word',
                'key' => 'description',
                'value' => 'Word description will be here',
            ),
            9 =>
            array (
                'id' => 616,
                'package_id' => 8,
                'feature' => 'word',
                'key' => 'is_visible',
                'value' => '1',
            ),
            10 =>
            array (
                'id' => 617,
                'package_id' => 8,
                'feature' => 'word',
                'key' => 'status',
                'value' => 'Active',
            ),
            11 =>
            array (
                'id' => 618,
                'package_id' => 8,
                'feature' => 'image',
                'key' => 'type',
                'value' => 'number',
            ),
            12 =>
            array (
                'id' => 619,
                'package_id' => 8,
                'feature' => 'image',
                'key' => 'is_value_fixed',
                'value' => '0',
            ),
            13 =>
            array (
                'id' => 620,
                'package_id' => 8,
                'feature' => 'image',
                'key' => 'title',
                'value' => 'Image limit',
            ),
            14 =>
            array (
                'id' => 621,
                'package_id' => 8,
                'feature' => 'image',
                'key' => 'title_position',
                'value' => 'before',
            ),
            15 =>
            array (
                'id' => 622,
                'package_id' => 8,
                'feature' => 'image',
                'key' => 'value',
                'value' => '200',
            ),
            16 =>
            array (
                'id' => 623,
                'package_id' => 8,
                'feature' => 'image',
                'key' => 'description',
                'value' => 'Image description will be here',
            ),
            17 =>
            array (
                'id' => 624,
                'package_id' => 8,
                'feature' => 'image',
                'key' => 'is_visible',
                'value' => '1',
            ),
            18 =>
            array (
                'id' => 625,
                'package_id' => 8,
                'feature' => 'image',
                'key' => 'status',
                'value' => 'Active',
            ),
            19 =>
            array (
                'id' => 626,
                'package_id' => 8,
                'feature' => 'image-resolution',
                'key' => 'type',
                'value' => 'number',
            ),
            20 =>
            array (
                'id' => 627,
                'package_id' => 8,
                'feature' => 'image-resolution',
                'key' => 'is_value_fixed',
                'value' => '1',
            ),
            21 =>
            array (
                'id' => 628,
                'package_id' => 8,
                'feature' => 'image-resolution',
                'key' => 'title',
                'value' => 'Max Image Resolution',
            ),
            22 =>
            array (
                'id' => 629,
                'package_id' => 8,
                'feature' => 'image-resolution',
                'key' => 'title_position',
                'value' => 'before',
            ),
            23 =>
            array (
                'id' => 630,
                'package_id' => 8,
                'feature' => 'image-resolution',
                'key' => 'value',
                'value' => '256',
            ),
            24 =>
            array (
                'id' => 631,
                'package_id' => 8,
                'feature' => 'image-resolution',
                'key' => 'description',
                'value' => 'Image description will be here',
            ),
            25 =>
            array (
                'id' => 632,
                'package_id' => 8,
                'feature' => 'image-resolution',
                'key' => 'is_visible',
                'value' => '1',
            ),
            26 =>
            array (
                'id' => 633,
                'package_id' => 8,
                'feature' => 'image-resolution',
                'key' => 'status',
                'value' => 'Active',
            ),
            27 =>
            array (
                'id' => 634,
                'package_id' => 8,
                'feature' => 'custom1',
                'key' => 'type',
                'value' => 'string',
            ),
            28 =>
            array (
                'id' => 635,
                'package_id' => 8,
                'feature' => 'custom1',
                'key' => 'title',
                'value' => 'Al Templates',
            ),
            29 =>
            array (
                'id' => 636,
                'package_id' => 8,
                'feature' => 'custom1',
                'key' => 'description',
                'value' => NULL,
            ),
            30 =>
            array (
                'id' => 637,
                'package_id' => 8,
                'feature' => 'custom1',
                'key' => 'is_visible',
                'value' => '1',
            ),
            31 =>
            array (
                'id' => 638,
                'package_id' => 8,
                'feature' => 'custom1',
                'key' => 'status',
                'value' => 'Active',
            ),
            32 =>
            array (
                'id' => 639,
                'package_id' => 8,
                'feature' => 'custom2',
                'key' => 'type',
                'value' => 'string',
            ),
            33 =>
            array (
                'id' => 640,
                'package_id' => 8,
                'feature' => 'custom2',
                'key' => 'title',
                'value' => '10 Languages',
            ),
            34 =>
            array (
                'id' => 641,
                'package_id' => 8,
                'feature' => 'custom2',
                'key' => 'description',
                'value' => NULL,
            ),
            35 =>
            array (
                'id' => 642,
                'package_id' => 8,
                'feature' => 'custom2',
                'key' => 'is_visible',
                'value' => '1',
            ),
            36 =>
            array (
                'id' => 643,
                'package_id' => 8,
                'feature' => 'custom2',
                'key' => 'status',
                'value' => 'Active',
            ),
            37 =>
            array (
                'id' => 644,
                'package_id' => 8,
                'feature' => 'custom3',
                'key' => 'type',
                'value' => 'string',
            ),
            38 =>
            array (
                'id' => 645,
                'package_id' => 8,
                'feature' => 'custom3',
                'key' => 'title',
                'value' => 'Landing Page Generator',
            ),
            39 =>
            array (
                'id' => 646,
                'package_id' => 8,
                'feature' => 'custom3',
                'key' => 'description',
                'value' => NULL,
            ),
            40 =>
            array (
                'id' => 647,
                'package_id' => 8,
                'feature' => 'custom3',
                'key' => 'is_visible',
                'value' => '1',
            ),
            41 =>
            array (
                'id' => 648,
                'package_id' => 8,
                'feature' => 'custom3',
                'key' => 'status',
                'value' => 'Active',
            ),
            42 =>
            array (
                'id' => 649,
                'package_id' => 8,
                'feature' => 'custom4',
                'key' => 'type',
                'value' => 'string',
            ),
            43 =>
            array (
                'id' => 650,
                'package_id' => 8,
                'feature' => 'custom4',
                'key' => 'title',
                'value' => 'Al Article Writer',
            ),
            44 =>
            array (
                'id' => 651,
                'package_id' => 8,
                'feature' => 'custom4',
                'key' => 'description',
                'value' => NULL,
            ),
            45 =>
            array (
                'id' => 652,
                'package_id' => 8,
                'feature' => 'custom4',
                'key' => 'is_visible',
                'value' => '1',
            ),
            46 =>
            array (
                'id' => 653,
                'package_id' => 8,
                'feature' => 'custom4',
                'key' => 'status',
                'value' => 'Active',
            ),
            47 =>
            array (
                'id' => 654,
                'package_id' => 8,
                'feature' => 'custom5',
                'key' => 'type',
                'value' => 'string',
            ),
            48 =>
            array (
                'id' => 655,
                'package_id' => 8,
                'feature' => 'custom5',
                'key' => 'title',
                'value' => 'Bulk Processing',
            ),
            49 =>
            array (
                'id' => 656,
                'package_id' => 8,
                'feature' => 'custom5',
                'key' => 'description',
                'value' => NULL,
            ),
            50 =>
            array (
                'id' => 657,
                'package_id' => 8,
                'feature' => 'custom5',
                'key' => 'is_visible',
                'value' => '1',
            ),
            51 =>
            array (
                'id' => 658,
                'package_id' => 8,
                'feature' => 'custom5',
                'key' => 'status',
                'value' => 'Active',
            ),
            52 =>
            array (
                'id' => 659,
                'package_id' => 8,
                'feature' => 'custom6',
                'key' => 'type',
                'value' => 'string',
            ),
            53 =>
            array (
                'id' => 660,
                'package_id' => 8,
                'feature' => 'custom6',
                'key' => 'title',
                'value' => 'Priority access to new features',
            ),
            54 =>
            array (
                'id' => 661,
                'package_id' => 8,
                'feature' => 'custom6',
                'key' => 'description',
                'value' => NULL,
            ),
            55 =>
            array (
                'id' => 662,
                'package_id' => 8,
                'feature' => 'custom6',
                'key' => 'is_visible',
                'value' => '1',
            ),
            56 =>
            array (
                'id' => 663,
                'package_id' => 8,
                'feature' => 'custom6',
                'key' => 'status',
                'value' => 'Active',
            ),
            57 =>
            array (
                'id' => 664,
                'package_id' => 8,
                'feature' => 'custom7',
                'key' => 'type',
                'value' => 'string',
            ),
            58 =>
            array (
                'id' => 665,
                'package_id' => 8,
                'feature' => 'custom7',
                'key' => 'title',
                'value' => 'Basic support',
            ),
            59 =>
            array (
                'id' => 666,
                'package_id' => 8,
                'feature' => 'custom7',
                'key' => 'description',
                'value' => NULL,
            ),
            60 =>
            array (
                'id' => 667,
                'package_id' => 8,
                'feature' => 'custom7',
                'key' => 'is_visible',
                'value' => '1',
            ),
            61 =>
            array (
                'id' => 668,
                'package_id' => 8,
                'feature' => 'custom7',
                'key' => 'status',
                'value' => 'Active',
            ),
            62 =>
            array (
                'id' => 669,
                'package_id' => 9,
                'feature' => '',
                'key' => 'duration',
                'value' => NULL,
            ),
            63 =>
            array (
                'id' => 670,
                'package_id' => 9,
                'feature' => '',
                'key' => 'usecaseCategory',
                'value' => '["1","2","3"]',
            ),
            64 =>
            array (
                'id' => 671,
                'package_id' => 9,
                'feature' => '',
                'key' => 'usecaseTemplate',
                'value' => '["blog-ideas-outlines","blog-post-writing","story-writing","google-ad-copy","facebook-ad-copy","keyword-generator","keyword-extractor","seo-meta-title-details","marketing-copy-strategies","amazon-product-outlines","product-description","product-reviews-responders"]',
            ),
            65 =>
            array (
                'id' => 672,
                'package_id' => 9,
                'feature' => 'word',
                'key' => 'type',
                'value' => 'number',
            ),
            66 =>
            array (
                'id' => 673,
                'package_id' => 9,
                'feature' => 'word',
                'key' => 'is_value_fixed',
                'value' => '0',
            ),
            67 =>
            array (
                'id' => 674,
                'package_id' => 9,
                'feature' => 'word',
                'key' => 'title',
                'value' => 'Word limit',
            ),
            68 =>
            array (
                'id' => 675,
                'package_id' => 9,
                'feature' => 'word',
                'key' => 'title_position',
                'value' => 'before',
            ),
            69 =>
            array (
                'id' => 676,
                'package_id' => 9,
                'feature' => 'word',
                'key' => 'value',
                'value' => '100000',
            ),
            70 =>
            array (
                'id' => 677,
                'package_id' => 9,
                'feature' => 'word',
                'key' => 'description',
                'value' => 'Word description will be here',
            ),
            71 =>
            array (
                'id' => 678,
                'package_id' => 9,
                'feature' => 'word',
                'key' => 'is_visible',
                'value' => '1',
            ),
            72 =>
            array (
                'id' => 679,
                'package_id' => 9,
                'feature' => 'word',
                'key' => 'status',
                'value' => 'Active',
            ),
            73 =>
            array (
                'id' => 680,
                'package_id' => 9,
                'feature' => 'image',
                'key' => 'type',
                'value' => 'number',
            ),
            74 =>
            array (
                'id' => 681,
                'package_id' => 9,
                'feature' => 'image',
                'key' => 'is_value_fixed',
                'value' => '0',
            ),
            75 =>
            array (
                'id' => 682,
                'package_id' => 9,
                'feature' => 'image',
                'key' => 'title',
                'value' => 'Image limit',
            ),
            76 =>
            array (
                'id' => 683,
                'package_id' => 9,
                'feature' => 'image',
                'key' => 'title_position',
                'value' => 'before',
            ),
            77 =>
            array (
                'id' => 684,
                'package_id' => 9,
                'feature' => 'image',
                'key' => 'value',
                'value' => '500',
            ),
            78 =>
            array (
                'id' => 685,
                'package_id' => 9,
                'feature' => 'image',
                'key' => 'description',
                'value' => 'Image description will be here',
            ),
            79 =>
            array (
                'id' => 686,
                'package_id' => 9,
                'feature' => 'image',
                'key' => 'is_visible',
                'value' => '1',
            ),
            80 =>
            array (
                'id' => 687,
                'package_id' => 9,
                'feature' => 'image',
                'key' => 'status',
                'value' => 'Active',
            ),
            81 =>
            array (
                'id' => 688,
                'package_id' => 9,
                'feature' => 'image-resolution',
                'key' => 'type',
                'value' => 'number',
            ),
            82 =>
            array (
                'id' => 689,
                'package_id' => 9,
                'feature' => 'image-resolution',
                'key' => 'is_value_fixed',
                'value' => '1',
            ),
            83 =>
            array (
                'id' => 690,
                'package_id' => 9,
                'feature' => 'image-resolution',
                'key' => 'title',
                'value' => 'Max Image Resolution',
            ),
            84 =>
            array (
                'id' => 691,
                'package_id' => 9,
                'feature' => 'image-resolution',
                'key' => 'title_position',
                'value' => 'before',
            ),
            85 =>
            array (
                'id' => 692,
                'package_id' => 9,
                'feature' => 'image-resolution',
                'key' => 'value',
                'value' => '512',
            ),
            86 =>
            array (
                'id' => 693,
                'package_id' => 9,
                'feature' => 'image-resolution',
                'key' => 'description',
                'value' => 'Image description will be here',
            ),
            87 =>
            array (
                'id' => 694,
                'package_id' => 9,
                'feature' => 'image-resolution',
                'key' => 'is_visible',
                'value' => '1',
            ),
            88 =>
            array (
                'id' => 695,
                'package_id' => 9,
                'feature' => 'image-resolution',
                'key' => 'status',
                'value' => 'Active',
            ),
            89 =>
            array (
                'id' => 696,
                'package_id' => 9,
                'feature' => 'custom1',
                'key' => 'type',
                'value' => 'string',
            ),
            90 =>
            array (
                'id' => 697,
                'package_id' => 9,
                'feature' => 'custom1',
                'key' => 'title',
                'value' => 'Everything in Free-trial, plus',
            ),
            91 =>
            array (
                'id' => 698,
                'package_id' => 9,
                'feature' => 'custom1',
                'key' => 'description',
                'value' => NULL,
            ),
            92 =>
            array (
                'id' => 699,
                'package_id' => 9,
                'feature' => 'custom1',
                'key' => 'is_visible',
                'value' => '1',
            ),
            93 =>
            array (
                'id' => 700,
                'package_id' => 9,
                'feature' => 'custom1',
                'key' => 'status',
                'value' => 'Active',
            ),
            94 =>
            array (
                'id' => 701,
                'package_id' => 9,
                'feature' => 'custom2',
                'key' => 'type',
                'value' => 'string',
            ),
            95 =>
            array (
                'id' => 702,
                'package_id' => 9,
                'feature' => 'custom2',
                'key' => 'title',
                'value' => 'Complete Article Rewriter',
            ),
            96 =>
            array (
                'id' => 703,
                'package_id' => 9,
                'feature' => 'custom2',
                'key' => 'description',
                'value' => NULL,
            ),
            97 =>
            array (
                'id' => 704,
                'package_id' => 9,
                'feature' => 'custom2',
                'key' => 'is_visible',
                'value' => '1',
            ),
            98 =>
            array (
                'id' => 705,
                'package_id' => 9,
                'feature' => 'custom2',
                'key' => 'status',
                'value' => 'Active',
            ),
            99 =>
            array (
                'id' => 706,
                'package_id' => 9,
                'feature' => 'custom3',
                'key' => 'type',
                'value' => 'string',
            ),
            100 =>
            array (
                'id' => 707,
                'package_id' => 9,
                'feature' => 'custom3',
                'key' => 'title',
            'value' => 'Research Mode (Coming soon)',
            ),
            101 =>
            array (
                'id' => 708,
                'package_id' => 9,
                'feature' => 'custom3',
                'key' => 'description',
                'value' => NULL,
            ),
            102 =>
            array (
                'id' => 709,
                'package_id' => 9,
                'feature' => 'custom3',
                'key' => 'is_visible',
                'value' => '1',
            ),
            103 =>
            array (
                'id' => 710,
                'package_id' => 9,
                'feature' => 'custom3',
                'key' => 'status',
                'value' => 'Active',
            ),
            104 =>
            array (
                'id' => 711,
                'package_id' => 9,
                'feature' => 'custom4',
                'key' => 'type',
                'value' => 'string',
            ),
            105 =>
            array (
                'id' => 712,
                'package_id' => 9,
                'feature' => 'custom4',
                'key' => 'title',
            'value' => 'Workflows (Coming soon)',
            ),
            106 =>
            array (
                'id' => 713,
                'package_id' => 9,
                'feature' => 'custom4',
                'key' => 'description',
                'value' => NULL,
            ),
            107 =>
            array (
                'id' => 714,
                'package_id' => 9,
                'feature' => 'custom4',
                'key' => 'is_visible',
                'value' => '1',
            ),
            108 =>
            array (
                'id' => 715,
                'package_id' => 9,
                'feature' => 'custom4',
                'key' => 'status',
                'value' => 'Active',
            ),
            109 =>
            array (
                'id' => 716,
                'package_id' => 9,
                'feature' => 'custom5',
                'key' => 'type',
                'value' => 'string',
            ),
            110 =>
            array (
                'id' => 717,
                'package_id' => 9,
                'feature' => 'custom5',
                'key' => 'title',
                'value' => 'API Access',
            ),
            111 =>
            array (
                'id' => 718,
                'package_id' => 9,
                'feature' => 'custom5',
                'key' => 'description',
                'value' => NULL,
            ),
            112 =>
            array (
                'id' => 719,
                'package_id' => 9,
                'feature' => 'custom5',
                'key' => 'is_visible',
                'value' => '1',
            ),
            113 =>
            array (
                'id' => 720,
                'package_id' => 9,
                'feature' => 'custom5',
                'key' => 'status',
                'value' => 'Active',
            ),
            114 =>
            array (
                'id' => 721,
                'package_id' => 9,
                'feature' => 'custom6',
                'key' => 'type',
                'value' => 'string',
            ),
            115 =>
            array (
                'id' => 722,
                'package_id' => 9,
                'feature' => 'custom6',
                'key' => 'title',
                'value' => 'Bulk Processing',
            ),
            116 =>
            array (
                'id' => 723,
                'package_id' => 9,
                'feature' => 'custom6',
                'key' => 'description',
                'value' => NULL,
            ),
            117 =>
            array (
                'id' => 724,
                'package_id' => 9,
                'feature' => 'custom6',
                'key' => 'is_visible',
                'value' => '1',
            ),
            118 =>
            array (
                'id' => 725,
                'package_id' => 9,
                'feature' => 'custom6',
                'key' => 'status',
                'value' => 'Active',
            ),
            119 =>
            array (
                'id' => 726,
                'package_id' => 9,
                'feature' => 'custom7',
                'key' => 'type',
                'value' => 'string',
            ),
            120 =>
            array (
                'id' => 727,
                'package_id' => 9,
                'feature' => 'custom7',
                'key' => 'title',
                'value' => 'Surfer Integration',
            ),
            121 =>
            array (
                'id' => 728,
                'package_id' => 9,
                'feature' => 'custom7',
                'key' => 'description',
                'value' => NULL,
            ),
            122 =>
            array (
                'id' => 729,
                'package_id' => 9,
                'feature' => 'custom7',
                'key' => 'is_visible',
                'value' => '1',
            ),
            123 =>
            array (
                'id' => 730,
                'package_id' => 9,
                'feature' => 'custom7',
                'key' => 'status',
                'value' => 'Active',
            ),
            124 =>
            array (
                'id' => 731,
                'package_id' => 9,
                'feature' => 'custom8',
                'key' => 'type',
                'value' => 'string',
            ),
            125 =>
            array (
                'id' => 732,
                'package_id' => 9,
                'feature' => 'custom8',
                'key' => 'title',
                'value' => 'Priority access to new features',
            ),
            126 =>
            array (
                'id' => 733,
                'package_id' => 9,
                'feature' => 'custom8',
                'key' => 'description',
                'value' => NULL,
            ),
            127 =>
            array (
                'id' => 734,
                'package_id' => 9,
                'feature' => 'custom8',
                'key' => 'is_visible',
                'value' => '1',
            ),
            128 =>
            array (
                'id' => 735,
                'package_id' => 9,
                'feature' => 'custom8',
                'key' => 'status',
                'value' => 'Active',
            ),
            129 =>
            array (
                'id' => 736,
                'package_id' => 9,
                'feature' => 'custom9',
                'key' => 'type',
                'value' => 'string',
            ),
            130 =>
            array (
                'id' => 737,
                'package_id' => 9,
                'feature' => 'custom9',
                'key' => 'title',
                'value' => 'Premium support',
            ),
            131 =>
            array (
                'id' => 738,
                'package_id' => 9,
                'feature' => 'custom9',
                'key' => 'description',
                'value' => NULL,
            ),
            132 =>
            array (
                'id' => 739,
                'package_id' => 9,
                'feature' => 'custom9',
                'key' => 'is_visible',
                'value' => '1',
            ),
            133 =>
            array (
                'id' => 740,
                'package_id' => 9,
                'feature' => 'custom9',
                'key' => 'status',
                'value' => 'Active',
            ),
            134 =>
            array (
                'id' => 741,
                'package_id' => 10,
                'feature' => '',
                'key' => 'duration',
                'value' => NULL,
            ),
            135 =>
            array (
                'id' => 742,
                'package_id' => 10,
                'feature' => '',
                'key' => 'usecaseCategory',
                'value' => '["1","2","3","4","5","6","8","7","9"]',
            ),
            136 =>
            array (
                'id' => 743,
                'package_id' => 10,
                'feature' => '',
                'key' => 'usecaseTemplate',
                'value' => '["blog-ideas-outlines","blog-post-writing","story-writing","google-ad-copy","facebook-ad-copy","keyword-generator","keyword-extractor","seo-meta-title-details","marketing-copy-strategies","landing-page-website-copy","amazon-product-outlines","product-description","product-reviews-responders","linkedin-profile-copy","personal-bio","email-writing","call-to-action","business-ideas-strategies","brand-name","tagline-headline","content-improver","content-rephrase","text-summarizer","cv-resume-cover-letter","job-description","company-description","questions-answers","interview-questions","aida-framework","pas-framework","explain-it-to-a-child","sms-notifications","tweet-generator","video-scripts","youtube-descriptions","youtube-ideas-outlines","poetry"]',
            ),
            137 =>
            array (
                'id' => 744,
                'package_id' => 10,
                'feature' => 'word',
                'key' => 'type',
                'value' => 'number',
            ),
            138 =>
            array (
                'id' => 745,
                'package_id' => 10,
                'feature' => 'word',
                'key' => 'is_value_fixed',
                'value' => '0',
            ),
            139 =>
            array (
                'id' => 746,
                'package_id' => 10,
                'feature' => 'word',
                'key' => 'title',
                'value' => 'Word limit',
            ),
            140 =>
            array (
                'id' => 747,
                'package_id' => 10,
                'feature' => 'word',
                'key' => 'title_position',
                'value' => 'before',
            ),
            141 =>
            array (
                'id' => 748,
                'package_id' => 10,
                'feature' => 'word',
                'key' => 'value',
                'value' => '200000',
            ),
            142 =>
            array (
                'id' => 749,
                'package_id' => 10,
                'feature' => 'word',
                'key' => 'description',
                'value' => 'Word description will be here',
            ),
            143 =>
            array (
                'id' => 750,
                'package_id' => 10,
                'feature' => 'word',
                'key' => 'is_visible',
                'value' => '1',
            ),
            144 =>
            array (
                'id' => 751,
                'package_id' => 10,
                'feature' => 'word',
                'key' => 'status',
                'value' => 'Active',
            ),
            145 =>
            array (
                'id' => 752,
                'package_id' => 10,
                'feature' => 'image',
                'key' => 'type',
                'value' => 'number',
            ),
            146 =>
            array (
                'id' => 753,
                'package_id' => 10,
                'feature' => 'image',
                'key' => 'is_value_fixed',
                'value' => '0',
            ),
            147 =>
            array (
                'id' => 754,
                'package_id' => 10,
                'feature' => 'image',
                'key' => 'title',
                'value' => 'Image limit',
            ),
            148 =>
            array (
                'id' => 755,
                'package_id' => 10,
                'feature' => 'image',
                'key' => 'title_position',
                'value' => 'before',
            ),
            149 =>
            array (
                'id' => 756,
                'package_id' => 10,
                'feature' => 'image',
                'key' => 'value',
                'value' => '1000',
            ),
            150 =>
            array (
                'id' => 757,
                'package_id' => 10,
                'feature' => 'image',
                'key' => 'description',
                'value' => 'Image description will be here',
            ),
            151 =>
            array (
                'id' => 758,
                'package_id' => 10,
                'feature' => 'image',
                'key' => 'is_visible',
                'value' => '1',
            ),
            152 =>
            array (
                'id' => 759,
                'package_id' => 10,
                'feature' => 'image',
                'key' => 'status',
                'value' => 'Active',
            ),
            153 =>
            array (
                'id' => 760,
                'package_id' => 10,
                'feature' => 'image-resolution',
                'key' => 'type',
                'value' => 'number',
            ),
            154 =>
            array (
                'id' => 761,
                'package_id' => 10,
                'feature' => 'image-resolution',
                'key' => 'is_value_fixed',
                'value' => '1',
            ),
            155 =>
            array (
                'id' => 762,
                'package_id' => 10,
                'feature' => 'image-resolution',
                'key' => 'title',
                'value' => 'Max Image Resolution',
            ),
            156 =>
            array (
                'id' => 763,
                'package_id' => 10,
                'feature' => 'image-resolution',
                'key' => 'title_position',
                'value' => 'before',
            ),
            157 =>
            array (
                'id' => 764,
                'package_id' => 10,
                'feature' => 'image-resolution',
                'key' => 'value',
                'value' => '1024',
            ),
            158 =>
            array (
                'id' => 765,
                'package_id' => 10,
                'feature' => 'image-resolution',
                'key' => 'description',
                'value' => 'Image description will be here',
            ),
            159 =>
            array (
                'id' => 766,
                'package_id' => 10,
                'feature' => 'image-resolution',
                'key' => 'is_visible',
                'value' => '1',
            ),
            160 =>
            array (
                'id' => 767,
                'package_id' => 10,
                'feature' => 'image-resolution',
                'key' => 'status',
                'value' => 'Active',
            ),
            161 =>
            array (
                'id' => 768,
                'package_id' => 10,
                'feature' => 'custom1',
                'key' => 'type',
                'value' => 'string',
            ),
            162 =>
            array (
                'id' => 769,
                'package_id' => 10,
                'feature' => 'custom1',
                'key' => 'title',
            'value' => 'Artifism Bot (ChatGPT-like chatbot)',
            ),
            163 =>
            array (
                'id' => 770,
                'package_id' => 10,
                'feature' => 'custom1',
                'key' => 'description',
                'value' => NULL,
            ),
            164 =>
            array (
                'id' => 771,
                'package_id' => 10,
                'feature' => 'custom1',
                'key' => 'is_visible',
                'value' => '1',
            ),
            165 =>
            array (
                'id' => 772,
                'package_id' => 10,
                'feature' => 'custom1',
                'key' => 'status',
                'value' => 'Active',
            ),
            166 =>
            array (
                'id' => 773,
                'package_id' => 10,
                'feature' => 'custom2',
                'key' => 'type',
                'value' => 'string',
            ),
            167 =>
            array (
                'id' => 774,
                'package_id' => 10,
                'feature' => 'custom2',
                'key' => 'title',
                'value' => '100+ AI Templates',
            ),
            168 =>
            array (
                'id' => 775,
                'package_id' => 10,
                'feature' => 'custom2',
                'key' => 'description',
                'value' => NULL,
            ),
            169 =>
            array (
                'id' => 776,
                'package_id' => 10,
                'feature' => 'custom2',
                'key' => 'is_visible',
                'value' => '1',
            ),
            170 =>
            array (
                'id' => 777,
                'package_id' => 10,
                'feature' => 'custom2',
                'key' => 'status',
                'value' => 'Active',
            ),
            171 =>
            array (
                'id' => 778,
                'package_id' => 10,
                'feature' => 'custom3',
                'key' => 'type',
                'value' => 'string',
            ),
            172 =>
            array (
                'id' => 779,
                'package_id' => 10,
                'feature' => 'custom3',
                'key' => 'title',
                'value' => '25+ Languages',
            ),
            173 =>
            array (
                'id' => 780,
                'package_id' => 10,
                'feature' => 'custom3',
                'key' => 'description',
                'value' => NULL,
            ),
            174 =>
            array (
                'id' => 781,
                'package_id' => 10,
                'feature' => 'custom3',
                'key' => 'is_visible',
                'value' => '1',
            ),
            175 =>
            array (
                'id' => 782,
                'package_id' => 10,
                'feature' => 'custom3',
                'key' => 'status',
                'value' => 'Active',
            ),
            176 =>
            array (
                'id' => 783,
                'package_id' => 10,
                'feature' => 'custom4',
                'key' => 'type',
                'value' => 'string',
            ),
            177 =>
            array (
                'id' => 784,
                'package_id' => 10,
                'feature' => 'custom4',
                'key' => 'title',
                'value' => 'Landing Page Generator',
            ),
            178 =>
            array (
                'id' => 785,
                'package_id' => 10,
                'feature' => 'custom4',
                'key' => 'description',
                'value' => NULL,
            ),
            179 =>
            array (
                'id' => 786,
                'package_id' => 10,
                'feature' => 'custom4',
                'key' => 'is_visible',
                'value' => '1',
            ),
            180 =>
            array (
                'id' => 787,
                'package_id' => 10,
                'feature' => 'custom4',
                'key' => 'status',
                'value' => 'Active',
            ),
            181 =>
            array (
                'id' => 788,
                'package_id' => 10,
                'feature' => 'custom5',
                'key' => 'type',
                'value' => 'string',
            ),
            182 =>
            array (
                'id' => 789,
                'package_id' => 10,
                'feature' => 'custom5',
                'key' => 'title',
                'value' => '1-Click WordPress Export',
            ),
            183 =>
            array (
                'id' => 790,
                'package_id' => 10,
                'feature' => 'custom5',
                'key' => 'description',
                'value' => NULL,
            ),
            184 =>
            array (
                'id' => 791,
                'package_id' => 10,
                'feature' => 'custom5',
                'key' => 'is_visible',
                'value' => '1',
            ),
            185 =>
            array (
                'id' => 792,
                'package_id' => 10,
                'feature' => 'custom5',
                'key' => 'status',
                'value' => 'Active',
            ),
            186 =>
            array (
                'id' => 793,
                'package_id' => 10,
                'feature' => 'custom6',
                'key' => 'type',
                'value' => 'string',
            ),
            187 =>
            array (
                'id' => 794,
                'package_id' => 10,
                'feature' => 'custom6',
                'key' => 'title',
                'value' => 'Zapier Integration',
            ),
            188 =>
            array (
                'id' => 795,
                'package_id' => 10,
                'feature' => 'custom6',
                'key' => 'description',
                'value' => NULL,
            ),
            189 =>
            array (
                'id' => 796,
                'package_id' => 10,
                'feature' => 'custom6',
                'key' => 'is_visible',
                'value' => '1',
            ),
            190 =>
            array (
                'id' => 797,
                'package_id' => 10,
                'feature' => 'custom6',
                'key' => 'status',
                'value' => 'Active',
            ),
            191 =>
            array (
                'id' => 798,
                'package_id' => 10,
                'feature' => 'custom7',
                'key' => 'type',
                'value' => 'string',
            ),
            192 =>
            array (
                'id' => 799,
                'package_id' => 10,
                'feature' => 'custom7',
                'key' => 'title',
                'value' => 'Browser extensions',
            ),
            193 =>
            array (
                'id' => 800,
                'package_id' => 10,
                'feature' => 'custom7',
                'key' => 'description',
                'value' => NULL,
            ),
            194 =>
            array (
                'id' => 801,
                'package_id' => 10,
                'feature' => 'custom7',
                'key' => 'is_visible',
                'value' => '1',
            ),
            195 =>
            array (
                'id' => 802,
                'package_id' => 10,
                'feature' => 'custom7',
                'key' => 'status',
                'value' => 'Active',
            ),
            196 =>
            array (
                'id' => 803,
                'package_id' => 10,
                'feature' => 'custom8',
                'key' => 'type',
                'value' => 'string',
            ),
            197 =>
            array (
                'id' => 804,
                'package_id' => 10,
                'feature' => 'custom8',
                'key' => 'title',
                'value' => 'AI Article Writer',
            ),
            198 =>
            array (
                'id' => 805,
                'package_id' => 10,
                'feature' => 'custom8',
                'key' => 'description',
                'value' => NULL,
            ),
            199 =>
            array (
                'id' => 806,
                'package_id' => 10,
                'feature' => 'custom8',
                'key' => 'is_visible',
                'value' => '1',
            ),
            200 =>
            array (
                'id' => 807,
                'package_id' => 10,
                'feature' => 'custom8',
                'key' => 'status',
                'value' => 'Active',
            ),
            201 =>
            array (
                'id' => 808,
                'package_id' => 10,
                'feature' => 'custom9',
                'key' => 'type',
                'value' => 'string',
            ),
            202 =>
            array (
                'id' => 809,
                'package_id' => 10,
                'feature' => 'custom9',
                'key' => 'title',
            'value' => 'Sonic Editor (Google Docs like Editor)',
            ),
            203 =>
            array (
                'id' => 810,
                'package_id' => 10,
                'feature' => 'custom9',
                'key' => 'description',
                'value' => NULL,
            ),
            204 =>
            array (
                'id' => 811,
                'package_id' => 10,
                'feature' => 'custom9',
                'key' => 'is_visible',
                'value' => '1',
            ),
            205 =>
            array (
                'id' => 812,
                'package_id' => 10,
                'feature' => 'custom9',
                'key' => 'status',
                'value' => 'Active',
            ),
            206 =>
            array (
                'id' => 813,
                'package_id' => 10,
                'feature' => 'custom10',
                'key' => 'type',
                'value' => 'string',
            ),
            207 =>
            array (
                'id' => 814,
                'package_id' => 10,
                'feature' => 'custom10',
                'key' => 'title',
                'value' => 'API Access',
            ),
            208 =>
            array (
                'id' => 815,
                'package_id' => 10,
                'feature' => 'custom10',
                'key' => 'description',
                'value' => NULL,
            ),
            209 =>
            array (
                'id' => 816,
                'package_id' => 10,
                'feature' => 'custom10',
                'key' => 'is_visible',
                'value' => '1',
            ),
            210 =>
            array (
                'id' => 817,
                'package_id' => 10,
                'feature' => 'custom10',
                'key' => 'status',
                'value' => 'Active',
            ),
        ));


    }
}
